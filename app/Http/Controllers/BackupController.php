<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\Process\Process;
use Illuminate\Support\Facades\Config;

class BackupController extends Controller
{
    public function show()
    {
        return view('Admin.backup');
    }

    public function backup()
    {
        $dir = storage_path('app/backups');
        if (!is_dir($dir)) {
            mkdir($dir, 0755, true);
        }

        $file = 'backup_' . date('Y-m-d_H-i-s') . '.sql';
        $path = $dir . DIRECTORY_SEPARATOR . $file;

        // Ambil dari config database langsung (lebih aman daripada env())
        $host = Config::get('database.connections.mysql.host');
        $port = Config::get('database.connections.mysql.port');
        $user = Config::get('database.connections.mysql.username');
        $pass = Config::get('database.connections.mysql.password');
        $db   = Config::get('database.connections.mysql.database');

        if (empty($user) || empty($db)) {
            return back()->with('error', 'Konfigurasi DB tidak ditemukan.');
        }

        // Perbaikan: Password tidak boleh ada spasi setelah -p
        $passPart = ($pass !== null && $pass !== '') ? '-p' . escapeshellarg($pass) : '';

        // Tambahkan --no-tablespaces untuk menghindari masalah permission di beberapa server
        $cmd = "mysqldump --no-tablespaces -h " . escapeshellarg($host) .
               " -P " . escapeshellarg($port) .
               " -u " . escapeshellarg($user) . " {$passPart} " .
               escapeshellarg($db) . " > " . escapeshellarg($path);

        try {
            $process = Process::fromShellCommandline($cmd);
            $process->setTimeout(600); // Naikkan ke 10 menit untuk DB besar
            $process->run();

            if (!$process->isSuccessful()) {
                Log::error('DB backup failed: ' . $process->getErrorOutput());
                return back()->with('error', 'Backup gagal. Cek log.');
            }

            return response()->download($path)->deleteFileAfterSend(true);
        } catch (\Throwable $e) {
            Log::error('Backup exception: ' . $e->getMessage());
            return back()->with('error', 'Backup error: ' . $e->getMessage());
        }
    }

    public function restore(Request $request)
    {
        $request->validate([
            'backup_file' => 'required|file|max:51200', // mimes sql terkadang gagal dideteksi di linux, cukup cek size
        ]);

        try {
            $uploaded = $request->file('backup_file');

            // 1. Simpan file
            $fileName = 'restore_' . now()->format('Y-m-d_H-i-s') . '.sql';
            $path = $uploaded->storeAs('backups', $fileName, 'local');

            // 2. Ambil Absolute Path yang BENAR
            $fullPath = \Illuminate\Support\Facades\Storage::disk('local')->path($path);

            // 3. Pastikan file benar-benar ada di storage sebelum eksekusi
            if (!file_exists($fullPath)) {
                return back()->with('error', 'File tidak ditemukan di server: ' . $fullPath);
            }

            $host = config('database.connections.mysql.host');
            $user = config('database.connections.mysql.username');
            $pass = config('database.connections.mysql.password');
            $db   = config('database.connections.mysql.database');

            $passPart = $pass ? "-p" . escapeshellarg($pass) : "";

            // 4. Jalankan Command
            $cmd = sprintf(
                'mysql -h %s -u %s %s %s < %s',
                escapeshellarg($host),
                escapeshellarg($user),
                $passPart,
                escapeshellarg($db),
                escapeshellarg($fullPath)
            );

            $process = \Symfony\Component\Process\Process::fromShellCommandline($cmd);
            $process->setTimeout(300);
            $process->run();

            // 5. Hapus file sementara setelah selesai
            \Illuminate\Support\Facades\Storage::disk('local')->delete($path);

            if (!$process->isSuccessful()) {
                \Log::error('DB restore failed: ' . $process->getErrorOutput());
                return back()->with('error', 'Restore gagal: ' . $process->getErrorOutput());
            }

            return redirect()->back()->with('success', 'Database berhasil di-restore!');

        } catch (\Exception $e) {
            \Log::error('Restore Exception: ' . $e->getMessage());
            return back()->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }
}
