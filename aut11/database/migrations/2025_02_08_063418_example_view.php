<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Validation\Rules\Exists;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        $viewName = 'userSelect';

        $exists = DB::select("SELECT TABLE_NAME FROM information_schema.views WHERE TABLE_SCHEMA = DATABASE() AND TABLE_NAME = ?", [$viewName]);

        if (!empty($exists)) {
            DB::statement("DROP VIEW userSelect");
        }
        
        DB::statement("
            CREATE VIEW userSelect AS
            SELECT * FROM `users` WHERE role=1;
        ");
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        /* DB::statement("DROP VIEW IF EXISTS userSelect"); */
    }
};
