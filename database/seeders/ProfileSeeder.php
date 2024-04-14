<?php

namespace Database\Seeders;

use App\Models\Profile;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProfileSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $patrang = Profile::create([
            'user_id' => '3',
            'kecamatan_id' => '8',
        ]);

        $sumbersari = Profile::create([
            'user_id' => '5',
            'kecamatan_id' => '1',
        ]);
    }
}
