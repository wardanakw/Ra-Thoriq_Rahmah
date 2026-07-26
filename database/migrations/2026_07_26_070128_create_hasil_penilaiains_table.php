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
    Schema::create('hasil_penilaian', function (Blueprint $table) {

        $table->id();

        $table->foreignId('penilaian_id')
              ->constrained('penilaians')
              ->cascadeOnDelete();

        $table->double('nilai_fuzzy');

        $table->string('kategori');

        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('hasil_penilaian');
    }
};
