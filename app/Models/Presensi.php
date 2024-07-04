<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Presensi extends Model
{
    protected $table = 'presensi';
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'id_Karyawan',
        'tanggal',
        'jam_masuk',
        'jam_keluar',
    ];
    protected $primaryKey = 'id_Presensi';

    protected $dates = ['created_at', 'updated_at'];

    public function karyawan(){
        return $this->belongsTo('\App\Models\Karyawan');
    }
}
