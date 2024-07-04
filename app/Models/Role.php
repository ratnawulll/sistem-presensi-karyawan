<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $table = 'roles';
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name'
    ];

    protected $dates = ['created_at', 'updated_at'];

    public function permissions(){
        return $this->belongsToMany('\App\Models\Permission');
    }
}
