<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function create(): void
    {
            DB::statement("
            CREATE VIEW userSelect AS
            SELECT * FROM `users` WHERE role=1;
        ");
            
    }

    /**
     * Reverse the migrations.
     */
    public function drop(): void
    {
        DB::statement("DROP VIEW userSelect");
    }
};
