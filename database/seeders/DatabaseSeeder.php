<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Permission;
use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        $admin = User::create([
            'name' => 'Admin User',
            'email' => 'admin@gmail.com',
            'username'=> 'admin',
            'password' => Hash::make('admin')
        ]);

        $hrd = User::create([
            'name' => 'hrd',
            'email' => 'hrd@gmail.com',
            'username'=> 'hrd',
            'password' => Hash::make('password')
        ]);

        $karyawan = User::create([
            'name' => 'karyawan1',
            'username'=> 'karyawan',
            'email' => 'karyawan1@gmail.com',
            'password' => Hash::make('123456')
        ]);

        $permissions = Permission::create([
			'name' => 'data-cuti',
			'display_name' => 'Akses data cuti',
			'description' => 'Mengakses data cuti'
		]);

        $permissions_karyawan = Permission::create([
			'name' => 'data-karyawan',
			'display_name' => 'Akses data karyawan',
			'description' => 'Mengakses data karyawan'
		]);

		$role_admin = Role::create([
			'name' => 'admin'
        ]);

		$role_admin->permissions()->attach($permissions);
        $role_admin->permissions()->attach($permissions_karyawan);

        $role_hrd = Role::create([
			'name' => 'hrd'
		]);

        $role_hrd->permissions()->attach($permissions_karyawan);

		$admin->roles()->attach($role_admin->id);
		$hrd->roles()->attach($role_hrd->id);

    }
}
