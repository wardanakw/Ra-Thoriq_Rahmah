<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('penilaians', function (Blueprint $table) {
            $table->string('hasil_fuzzy', 50)->nullable()->change();
            $table->string('kategori', 100)->nullable()->change();
        });
    }

    public function down(): void
    {
        Schema::table('penilaians', function (Blueprint $table) {
            $table->string('hasil_fuzzy', 10)->nullable()->change();
            $table->string('kategori', 50)->nullable()->change();
        });
    }
};
