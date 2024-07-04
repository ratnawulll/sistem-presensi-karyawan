<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    protected $table = 'permissions';
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name', 'display_name', 'description'
    ];

    protected $dates = ['created_at', 'updated_at'];

    public function roles() {
        return $this->belongsToMany('\App\Models\Role');
    }
}
