<?php

namespace App\Http\Controllers;

use App\Models\Reported;
use App\Models\User;
// use Illuminate\Http\Request;

class ReportController extends Controller
{
    public function userReport()
    {
        $user = User::all();
        return view('Admin.report.user', compact('user'));
    }

    public function earningReport()
    {
        $data = [5.2,8.0,9.5,3.9,7.8,4.0,4.5,2.1,6.3,6.2,5.9,9.2];
        return view('Admin.report.earning', compact('data'));
    }


    public function lapor()
    {
        // Logika untuk mengambil data laporan dan menampilkan halaman laporan
        return view('Admin.report.lapor');
    }

    public function report(){
        $reported = Reported::with(['order', 'user', 'produk'])->orderBy('created_at', 'asc')->get();

        return view('Admin.report', compact('reported'));
    }

    public function reportDetail($id)
    {
        $report = Reported::with(['order', 'user', 'produk'])->findOrFail($id);

        return view('Admin.report.lapor', compact('report'));
    }
}
