<?php

namespace Database\Seeders;

use App\Models\verification_status;
use App\Models\VerificationStatus;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class VerivicationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        VerificationStatus::create([
            'name' => 'Belum diverifikasi'
        ]);
        VerificationStatus::create([
            'name' => 'Sedang diverifikasi'
        ]);
        VerificationStatus::create([
            'name' => 'Sudah diverifikasi'
        ]);
        VerificationStatus::create([
            'name' => 'Aduan ditolak'
        ]);
    }
}
