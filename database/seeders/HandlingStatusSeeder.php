<?php

namespace Database\Seeders;

use App\Models\Handling_Status;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class HandlingStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Handling_Status::create([
            'name' => 'Belum ditindaklanjuti',
        ]);
        Handling_Status::create([
            'name' => 'Sedang ditindaklanjuti',
        ]);
        Handling_Status::create([
            'name' => 'Sudah ditindaklanjuti',
        ]);
    }
}
