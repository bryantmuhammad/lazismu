<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Str;
use App\Models\Kategori;
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
        Kategori::create(
            [
                'nama_kategori' => 'Zakat'
            ],
            [
                'nama_kategori' => 'Infaq'
            ]
        );

        $faker  = Faker::create('id_ID');
        // \App\Models\User::factory(10)->create();

        $permissions = [
            'Admin' => [
                'crud data master',
                'lihat laporan'
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
