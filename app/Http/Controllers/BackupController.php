<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Symfony\Component\Process\Process;

class BackupController extends Controller
{
    public function backup()
    {
        $dir = storage_path('app/backups');
        if (!is_dir($dir)) {
            mkdir($dir, 0755, true);
        }

        $file = 'backup_' . date('Y-m-d_H-i-s') . '.sql';
        $path = $dir . DIRECTORY_SEPARATOR . $file;
        $host = env('DB_HOST', '127.0.0.1');
        $port = env('DB_PORT', '3306');
        $user = env('DB_USERNAME');
        $pass = env('DB_PASSWORD');
        $db = env('DB_DATABASE');

        if (empty($user) || empty($db)) {
            return back()->with('error', 'DB credentials not configured.');
        }

        // Build command safely (use shell because of redirection)
        $passPart = ($pass !== null && $pass !== '') ? '-p' . escapeshellarg($pass) : '';
        $cmd = "mysqldump -h " . escapeshellarg($host) .
               " -P " . escapeshellarg($port) .
               " -u " . escapeshellarg($user) . " {$passPart} " .
               escapeshellarg($db) . " > " . escapeshellarg($path);

        try {
            $process = Process::fromShellCommandline($cmd);
            $process->setTimeout(300);
            $process->run();

            if (!$process->isSuccessful() || !file_exists($path)) {
                Log::error('DB backup failed: ' . $process->getErrorOutput() . ' / ' . $process->getOutput());
                return back()->with('error', 'Backup failed. Check logs.');
            }

            return response()->download($path)->deleteFileAfterSend(true);
        } catch (\Throwable $e) {
            Log::error('Backup exception: ' . $e->getMessage());
            return back()->with('error', 'Backup failed: ' . $e->getMessage());
        }
    }

    public function restore(Request $request)
    {
        $request->validate([
            'backup_file' => 'required|file|mimes:sql,txt',
        ]);

        $uploaded = $request->file('backup_file');
        $path = $uploaded->storeAs('backups', 'restore_' . date('Y-m-d_H-i-s') . '.sql');
        $fullPath = storage_path('app/' . $path);

        $host = env('DB_HOST', '127.0.0.1');
        $port = env('DB_PORT', '3306');
        $user = env('DB_USERNAME');
        $pass = env('DB_PASSWORD');
        $db = env('DB_DATABASE');

        if (empty($user) || empty($db)) {
            return back()->with('error', 'DB credentials not configured.');
        }

        $passPart = ($pass !== null && $pass !== '') ? '-p' . escapeshellarg($pass) : '';
        $cmd = "mysql -h " . escapeshellarg($host) .
               " -P " . escapeshellarg($port) .
               " -u " . escapeshellarg($user) . " {$passPart} " .
               escapeshellarg($db) . " < " . escapeshellarg($fullPath);

        try {
            $process = Process::fromShellCommandline($cmd);
            $process->setTimeout(300);
            $process->run();

            if (!$process->isSuccessful()) {
                Log::error('DB restore failed: ' . $process->getErrorOutput());
                return back()->with('error', 'Restore failed. Check logs.');
            }

            return redirect()->back()->with('success', 'Database restored successfully.');
        } catch (\Throwable $e) {
            Log::error('Restore exception: ' . $e->getMessage());
            return back()->with('error', 'Restore failed: ' . $e->getMessage());
        }
    }
}
