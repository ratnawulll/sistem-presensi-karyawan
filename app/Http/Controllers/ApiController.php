<?php

namespace App\Http\Controllers;

use DB;
use auth;
use Alert;
use App\Models\Karyawan;
use App\Models\Peraturan;
use Illuminate\Http\Request;

class ApiController extends Controller
{

    public function getPeraturan()
    {
		$peraturan = Peraturan::all();
        return response()->json(['data' => $peraturan]);
 
    }
}
