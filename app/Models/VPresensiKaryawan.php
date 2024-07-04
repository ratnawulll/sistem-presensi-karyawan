<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class VPresensiKaryawan extends Model
{
    protected $table = 'vpresensikaryawan';

    public function karyawan(){
        return $this->belongsTo('\App\Models\Karyawan', 'id_Karyawan', 'id_Karyawan');
    }
}
