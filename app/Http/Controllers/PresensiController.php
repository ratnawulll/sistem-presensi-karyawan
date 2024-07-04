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
use Illuminate\Http\Request;

class PresensiController extends Controller
{
	public function __construct()
    {
        
    }

    public function index()
    {
		$presensi = Presensi::all();
    	return view('presensi.view',compact('presensi'));
 
    }

    public function index_user()
    {
        $now = \Carbon\Carbon::now();
        $now->setTimezone('Asia/Jakarta');
        $user = User::with('karyawan')->where('id', Auth::user()->id)->first();
        
        if (!$user || !$user->karyawan) {
            // Handle the case where the user does not have a karyawan
            return view('presensi.view_user', [
                'presensi' => null,
                'presensi_registered' => false,
                'is_cuti' => false,
                'is_peraturan' => false,
                'id_peraturan' => null,
                'id_karyawan' => null
            ])->withErrors('No karyawan associated with the user.');
        }
        
        $id_karyawan = $user->karyawan->id_Karyawan;

        $presensi = Presensi::where('id_Karyawan', $id_karyawan )->whereDate('tanggal', $now)->orderBy('id_Presensi', 'desc')->first();
        $presensi_registered = false;
        if (isset($presensi->jam_masuk) && !isset($presensi->jam_keluar)) {
            $presensi_registered = true;
        }
        $cuti = Cuti::where('id_Karyawan', $id_karyawan)->orderBy('selesai_cuti', 'desc')->get();
        $is_cuti = false;
        if (count($cuti)) {
            # code...
            $cuti = $cuti[0];
            if ($now->greaterThanOrEqualTo($cuti->mulai_cuti) && $now->lessThanOrEqualTo($cuti->selesai_cuti)) {
                $isCuti = true;
            }
        }
        $is_peraturan = false;
        $id_peraturan = null;
        if (!$is_cuti) {
            $peraturan = Peraturan::whereHas('karyawans', function ($query) use($id_karyawan){
                return $query->where('id_Karyawan', $id_karyawan);
            })->get();
            if (count($peraturan)) {
                $peraturan = $peraturan[0];
                $id_peraturan = $peraturan->id_Peraturan;

                $jam_pulang = $peraturan->jam_pulang;
                //apabila jam pulang pada keesokan paginya
                if ($now->greaterThan($jam_pulang)) {
                    $jam_pulang = \Carbon\Carbon::createFromTimeString($jam_pulang)->addDay();
                }

                if ($now->greaterThan($peraturan->jam_masuk) && $now->lessThan($jam_pulang)) {
                    $is_peraturan = true;   
                }
            }

        }

    	return view('presensi.view_user', compact('presensi', 'presensi_registered' ,'is_cuti' , 'is_peraturan', 'id_peraturan', 'id_karyawan'));
 
    }

    // method untuk insert data ke table jenis
	public function store(Request $request)
	{
        $jam = $request->input('jam');
        $karyawan_id = $request->input('karyawan');

        if (!$karyawan_id || !$jam) {
            Alert::error('Error Data tidak lengkap');
            return redirect()->back();
        }

        $now = \Carbon\Carbon::now()->setTimezone('Asia/Jakarta');
		$jam = \Carbon\Carbon::createFromTimeString($jam);

		// insert data ke table presensi
        Presensi::create([
            'id_Karyawan' => $karyawan_id,
            'tanggal' => $now,
            'jam_masuk' => $jam
        ]);
		
		Alert::success('Success', 'Data Telah Terinput');
		return redirect()->route('presensi.index_user');
		// return redirect('/presensi');
	 
	}

	// method untuk edit data pegawai
	public function edit($id)
	{
		$presensi = Presensi::where('id_Presensi',$id)->first();
		// passing data jenis yang didapat ke view edit.blade.php
		return view('presensi.edit', compact('presensi'));
	 
	}

	// update data jenis
	public function update(Request $request)
	{
        $presensi = Presensi::where('id_Presensi', $request->input('id_presensi'))->first();
        if (!$presensi) {
            Alert::error('Error Data Tidak Ditemukan');
            return redirect()->back();
        }

        $jam = $request->input('jam');
        $karyawan_id = $request->input('karyawan');

        if (!$karyawan_id || !$jam) {
            Alert::error('Error Data tidak lengkap');
            return redirect()->back();
        }

		$jam = \Carbon\Carbon::createFromTimeString($jam);

		$presensi->update([
            'jam_keluar' => $jam
        ]);
		// alihkan halaman ke halaman jenis
		Alert::success('Success', 'Data Telah Terupdate');
		return redirect()->route('presensi.index_user');
	}

	public function hapus($id)
	{
		// menghapus data jenis berdasarkan id yang dipilih
		DB::table('presensi')->where('id_presensi',$id)->delete();

		// alihkan halaman ke halaman presensi
		Alert::success('Success', 'Data Telah Terhapus');
		return redirect('/presensi');
	}
}
