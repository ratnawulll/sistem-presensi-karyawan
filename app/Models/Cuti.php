<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Cuti extends Model
{
    protected $table = 'cuti';
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'id_cuti',
        'id_Karyawan',
        'mulai_cuti',
        'selesai_cuti',
        'jenis_cuti',
        'keterangan'
    ];
    protected $primaryKey = 'id_cuti';

    protected $dates = ['created_at', 'updated_at'];

    public function karyawan(){
        return $this->belongsTo('\App\Models\Karyawan');
    }
}
