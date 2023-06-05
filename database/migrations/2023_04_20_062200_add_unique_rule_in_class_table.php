<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('class', function (Blueprint $table) {
            // membuat colom name yang ada di tabel class tidak boleh sama ( unique )
            $table->string('name')->unique()->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('class', function (Blueprint $table) {
            // untuk rollback unique yang ada di atas
            $table->dropUnique('class_name_unique');
        });
    }
};
