<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Peraturan extends Model
{
    protected $table = 'peraturan';
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'nama',
        'description',
        'jam_masuk',
        'batas_jam_masuk',
        'jam_pulang',
        'batas_jam_pulang',
    ];
    protected $primaryKey = 'id_Peraturan';

    protected $dates = ['created_at', 'updated_at'];

    public function karyawans(){
        return $this->belongsToMany('\App\Models\Karyawan');
    }
}
