<?php

namespace App\Http\Controllers;

use DB;
use Alert;
use App\Models\Karyawan;
use Auth;
use App\Models\VPresensiKaryawan;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;


class LaporanController extends Controller
{
    public function __construct()
    {
        // $this->middleware(['auth','Admin']);
    }

    public function lap_presensi(Request $request)
    {
        $presensi_histories = VPresensiKaryawan::with('karyawan')->get();
        return view('laporan.view_presensi', compact('presensi_histories'));
    }

    public function lap_presensi_user(Request $request)
    { 
        $id_karyawan = Karyawan::where('user_id', Auth::user()->id)->first();
        $presensi_histories = VPresensiKaryawan::where('id_Karyawan', $id_karyawan->id_Karyawan)->with('karyawan')->get();
        return view('laporan.view_presensi', compact('presensi_histories'));
    }

    
    public function export_presensi(Request $request)
    {
        $data = [];
        return Excel::download($data, 'lap_presensi.xlsx');
    }
}
