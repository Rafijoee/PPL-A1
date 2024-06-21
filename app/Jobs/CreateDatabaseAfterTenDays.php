<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\DB;

class CreateDatabaseAfterTenDays implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $complaintId;

    public function __construct($complaintId)
    {
        $this->complaintId = $complaintId;
    }

    public function handle()
    {
        $dbName = 'database_' . $this->complaintId;
        
        // Buat database baru
        DB::statement("CREATE DATABASE {$dbName}");
    }
}
