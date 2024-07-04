<?php

namespace App\Http\Controllers;

use DB;
use auth;
use Alert;
use App\Models\Karyawan;
use App\Models\Peraturan;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class KaryawanController extends Controller
{
	public function __construct()
    {
        $this->middleware(['auth','Admin']);
    }

    public function index()
    {
		$karyawan = Karyawan::all();
		$peraturans = Peraturan::all();
    	return view('karyawan.view',compact('karyawan', 'peraturans'));
 
    }

    // method untuk insert data ke table jenis
	public function store(Request $request)
	{
		$user = User::create([
            'name' => $request->input('nama'),
            'username'=> $request->input('nama'),
			'email' => $request->input('email'),
            'password' => Hash::make('password')
        ]);
		// insert data ke table jenis
		$karyawan = Karyawan::create([
			'nik' => $request->input('nik'),
            'nama' => $request->input('nama'),
            'alamat' => $request->input('alamat'),
			"status" => $request->input('status'),
			"jenis_kelamin" => $request->input('jenis_kelamin'),
			'no_telp' => $request->input('no_telp'),
			"user_id" => $user->id
        ]);

		$peraturan_id = $request->input('peraturan');

		$karyawan->peraturans()->attach($peraturan_id);

		Alert::success('Success', 'Data Telah Terinput');
		return redirect('/karyawan');
	 
	}

	// method untuk edit data pegawai
	public function edit($id)
	{
		$karyawan = Karyawan::where('id_Karyawan',$id)->with(['user','peraturans'])->first();
		$peraturans = Peraturan::all();
		// passing data jenis yang didapat ke view edit.blade.php
		return view('karyawan.edit', compact('karyawan', 'peraturans'));
	 
	}

	// update data jenis
	public function update(Request $request)
	{
		$karyawan = Karyawan::where('id_Karyawan',$request->input('id_Karyawan'))->with(['user','peraturans'])->first();

		User::where('id', $karyawan->user->id)->update([
            'name' => $request->input('name'),
            'username'=> $request->input('name'),
			'email' => $request->input('email'),
        ]);

		// insert data ke table jenis
		$karyawan->update([
			'nik' => $request->input('nik'),
            'nama' => $request->input('name'),
            'alamat' => $request->input('alamat'),
			"status" => $request->input('status'),
			"jenis_kelamin" => $request->input('jenis_kelamin'),
			'no_telp' => $request->input('no_telp')
        ]);

		$peraturan_id = $request->input('peraturan');
		if (count($karyawan->peraturans) < 1) {
			$karyawan->peraturans()->attach($peraturan_id);
		}
		else {
			if ($peraturan_id != $karyawan->peraturans[0]->id_Peraturan) {
				$karyawan->peraturans()->detach($karyawan->peraturans[0]->id_Peraturan);
		
				$karyawan->peraturans()->attach($peraturan_id);
			}
		}

		// alihkan halaman ke halaman jenis
		Alert::success('Success', 'Data Telah Terupdate');
		return redirect('/karyawan');
	}

	public function hapus($id)
	{
		// menghapus data jenis berdasarkan id yang dipilih
		$karyawan = Karyawan::find($id);
		// dd($karyawan);
		$user_id = $karyawan->user->id;
		$karyawan->delete();
		User::find($user_id)->delete();

		// alihkan halaman ke halaman karyawan
		Alert::success('Success', 'Data Telah Terhapus');
		return redirect()->route('karyawan.index');
	}
}
