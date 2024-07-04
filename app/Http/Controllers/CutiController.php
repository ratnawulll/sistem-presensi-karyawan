<?php

namespace App\Http\Controllers;

use DB;
use Auth;
use Alert;
use App\Models\Cuti;
use App\Models\Karyawan;
use App\Models\Peraturan;
use App\Models\Presensi;
use App\Models\User;
use App\Models\VCutiKaryawan;
use Illuminate\Http\Request;

class CutiController extends Controller
{
	public function __construct()
    {
        
    }

    public function index()
    {
		$cutis = VCutiKaryawan::all();
        $karyawans = Karyawan::orderBy('nama')->get();
    	return view('cuti.view',compact('cutis', 'karyawans'));
 
    }


    // method untuk insert data ke table cuti
	public function store(Request $request)
	{
        $karyawan_id = $request->input('karyawan');

        if (!$karyawan_id) {
            Alert::error('Error Data tidak lengkap');
            return redirect()->back();
        }
		$mulai_cuti = \Carbon\Carbon::createFromFormat('Y-m-d', $request->input('mulai_cuti'));
        $selesai_cuti = \Carbon\Carbon::createFromFormat('Y-m-d', $request->input('selesai_cuti'));

		// insert data ke table cuti
        Cuti::create([
            'id_Karyawan' => $karyawan_id,
            'mulai_cuti' => $mulai_cuti,
            'selesai_cuti' => $selesai_cuti,
            'jenis_cuti' => $request->input('jenis_cuti'),
            'keterangan' => $request->input('keterangan')
        ]);
		
		Alert::success('Success', 'Data Telah Terinput');
		return redirect()->route('cuti.index');
		// return redirect('/cuti');
	 
	}

}
