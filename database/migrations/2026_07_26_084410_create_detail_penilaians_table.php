<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('detail_penilaians', function (Blueprint $table) {

            $table->id();

            $table->foreignId('penilaian_id')
                ->constrained('penilaians')
                ->cascadeOnDelete();

            $table->foreignId('indikator_id')
                ->constrained('indikators')
                ->cascadeOnDelete();

            $table->tinyInteger('nilai');

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('detail_penilaians');
    }
};