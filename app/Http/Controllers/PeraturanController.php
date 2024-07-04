<?php

namespace App\Http\Controllers;

use DB;
use auth;
use Alert;
use App\Models\Karyawan;
use App\Models\Peraturan;
use Illuminate\Http\Request;

class PeraturanController extends Controller
{
	public function __construct()
    {
        $this->middleware(['auth','Admin']);
    }

    public function index()
    {
		$peraturan = Peraturan::all();
    	return view('peraturan.view',compact('peraturan'));
 
    }

    // method untuk insert data ke table jenis
	public function store(Request $request)
	{
        $jam = $request->input('jam');
        $menit = $request->input('menit');
        $jam_batas = $request->input('jam_batas');
        $menit_batas = $request->input('menit_batas');
        $jam_pulang = $request->input('jam_pulang');
        $menit_pulang = $request->input('menit_pulang');
        $jam_pulang_batas = $request->input('jam_pulang_batas');
        $menit_pulang_batas = $request->input('menit_pulang_batas');

        if (!$jam || !$jam_batas || !$jam_pulang || !$jam_pulang_batas) {
            Alert::error('Error');
            return redirect()->back();
        }

        $jam_masuk = \Carbon\Carbon::createFromTime(intval($jam), intval($menit??0));
        $batas_jam_masuk = \Carbon\Carbon::createFromTime(intval($jam_batas), intval($menit_batas??0));
        $jam_pulang_db = \Carbon\Carbon::createFromTime(intval($jam_pulang), intval($menit_pulang??0));
        $batas_jam_pulang = \Carbon\Carbon::createFromTime(intval($jam_pulang_batas), intval($menit_pulang_batas??0));

		// insert data ke table peraturan
        Peraturan::create([
            'nama' => $request->input('nama'),
            'description' => $request->input('deskripsi')??'',
            'jam_masuk' => $jam_masuk,
            'batas_jam_masuk' => $batas_jam_masuk,
            'jam_pulang' => $jam_pulang_db,
            'batas_jam_pulang' => $batas_jam_pulang
        ]);
		
		Alert::success('Success', 'Data Telah Terinput');
		return redirect('/peraturan');
	 
	}

	// method untuk edit data pegawai
	public function edit($id)
	{
		$peraturan = Peraturan::where('id_Peraturan',$id)->first();
		// passing data jenis yang didapat ke view edit.blade.php
		return view('peraturan.edit', compact('peraturan'));
	 
	}

	// update data jenis
	public function update(Request $request)
	{
        $peraturan = Peraturan::where('id_Peraturan', $request->input('id_Peraturan'))->first();
        if (!$peraturan) {
            Alert::error('Error');
            return redirect()->back();
        }

        $jam = $request->input('jam');
        $menit = $request->input('menit');
        $jam_batas = $request->input('jam_batas');
        $menit_batas = $request->input('menit_batas');
        $jam_pulang = $request->input('jam_pulang');
        $menit_pulang = $request->input('menit_pulang');
        $jam_pulang_batas = $request->input('jam_pulang_batas');
        $menit_pulang_batas = $request->input('menit_pulang_batas');

        if (!$jam || !$jam_batas || !$jam_pulang || !$jam_pulang_batas) {
            Alert::error('Error');
            return redirect()->back();
        }

        $jam_masuk = \Carbon\Carbon::createFromTime(intval($jam), intval($menit??0));
        $batas_jam_masuk = \Carbon\Carbon::createFromTime(intval($jam_batas), intval($menit_batas??0));
        $jam_pulang_db = \Carbon\Carbon::createFromTime(intval($jam_pulang), intval($menit_pulang??0));
        $batas_jam_pulang = \Carbon\Carbon::createFromTime(intval($jam_pulang_batas), intval($menit_pulang_batas??0));

		$peraturan->update([
            'nama' => $request->input('nama'),
            'description' => $request->input('deskripsi')??'',
            'jam_masuk' => $jam_masuk,
            'batas_jam_masuk' => $batas_jam_masuk,
            'jam_pulang' => $jam_pulang_db,
            'batas_jam_pulang' => $batas_jam_pulang
        ]);
		// alihkan halaman ke halaman jenis
		Alert::success('Success', 'Data Telah Terupdate');
		return redirect('/peraturan');
	}

	public function hapus($id)
	{
		// menghapus data jenis berdasarkan id yang dipilih
		$peraturan = Peraturan::find($id);
		$peraturan->karyawans()->detach();

		$peraturan->delete();

		// alihkan halaman ke halaman karyawan
		Alert::success('Success', 'Data Telah Terhapus');
		return redirect()->route('peraturan.index');
	}
}
