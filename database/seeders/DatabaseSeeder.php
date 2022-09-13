<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Str;
use App\Models\Kategori;
use App\Models\Program;
use Faker\Factory as Faker;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */


    public function run()
    {
        $kategoris = ['Zakat', 'Infaq'];
        foreach ($kategoris as $kategori) {
            Kategori::factory()->has(Program::factory()->count(3))->create([
                'nama_kategori' => $kategori
            ]);
        }

        $this->permission_seeder();
    }

    public function permission_seeder()
    {
        $faker  = Faker::create('id_ID');
        $permissions = [
            'Admin' => [
                'crud data master',
                'lihat laporan',
                'transaksi'
            ],
            'Pemilik' => [
                'lihat laporan'
            ]
        ];

        foreach ($permissions['Admin'] as $permission) {
            Permission::create(['name' => $permission]);
        }

        $roles = [
            'Admin',
            'Super Admin',
            'Pemilik'
        ];

        foreach ($roles as $key => $value) {
            $role = Role::create(['name' => $value]);
            if (isset($permissions[$role->name])) $role->givePermissionTo($permissions[$role->name]);
        }

        $user = User::create([
            'name'              => $faker->name(),
            'email'             => 'admin@gmail.com',
            'email_verified_at' => now(),
            'password'          => Hash::make('admin'),
            'remember_token'    => Str::random(10),
        ]);
        $user->assignRole('Admin');

        $user = User::create([
            'name'              => $faker->name(),
            'email'             => 'superadmin@gmail.com',
            'email_verified_at' => now(),
            'password'          => Hash::make('admin'),
            'remember_token'    => Str::random(10),
        ]);

        $user->assignRole('Super Admin');

        $user = User::create([
            'name'              => $faker->name(),
            'email'             => 'pemilik@gmail.com',
            'email_verified_at' => now(),
            'password'          => Hash::make('pemilik'),
            'remember_token'    => Str::random(10),
        ]);

        $user->assignRole('Pemilik');
    }
}
