<?php

namespace Database\Seeders;

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
            User::create([
                'name' => 'Penyuluh Kecamatan Sumbersari',
                'email' => 'penyuluhsumbersari@example.com',
                'password' => bcrypt('password'),
            ]);

            User::create([
                'name' => 'Penyuluh Kecamatan Patrang',
                'email' => 'penyuluhpatrang@example.com',
                'password' => bcrypt('password'),
            ]);
        }
    }
}
