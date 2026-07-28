<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        if (!Schema::hasTable('indikators')) {
            Schema::create('indikators', function (Blueprint $table) {
                $table->id();
                $table->string('kode', 10);
                $table->string('elemen');
                $table->text('indikator');
                $table->integer('urutan');
                $table->timestamps();
            });
        }
    }

    public function down(): void
    {
        Schema::dropIfExists('indikators');
    }
};