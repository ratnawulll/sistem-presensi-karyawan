<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Karyawan extends Model
{
    protected $table = 'karyawan';
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'nik',
        'nama',
        'alamat',
        'status',
        'jenis_kelamin',
        'no_telp',
        'user_id',
        'photo'
    ];

    protected $primaryKey = 'id_Karyawan';

    protected $dates = ['created_at', 'updated_at'];

    public function user() {
        return $this->belongsTo('\App\Models\User');
    }

    public function presensi() {
        return $this->hasMany('\App\Models\Presensi');
    }

    public function peraturans(){
        return $this->belongsToMany('\App\Models\Peraturan');
    }
}
