<?php

namespace Database\Seeders;

use App\Models\Profile;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    { {
            $admin =User::create([
                'name' => 'Admin Maha Raja',
                'email' => 'admin@example.com',
                'password' => bcrypt('password'),
                'roles_id'=> '1'
            ]);
            $pemerintah = User::create([
                'name' => 'Pemerintah',
                'email' => 'pemerintah@example.com',
                'password' => bcrypt('password'), 
                'roles_id'=> '4'
            ]);
            $patrang = User::create([
                'name' => 'Penyuluh Kecamatan Patrang',
                'email' => 'penyuluhpatrang@example.com',
                'password' => bcrypt('password'),
                'roles_id'=> '3'
            ]);

            $sumbersari = User::create([
                'name' => 'Penyuluh Kecamatan Sumbersari',
                'email' => 'penyuluhsumbersari@example.com',
                'password' => bcrypt('password'),
                'roles_id'=> '3'
            ]);
            
        }
    }
}
