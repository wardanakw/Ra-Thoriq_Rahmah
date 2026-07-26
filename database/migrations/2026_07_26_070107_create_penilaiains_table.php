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
    Schema::create('penilaians', function (Blueprint $table) {

        $table->id();

        $table->foreignId('murid_id')
            ->constrained('murid')
            ->cascadeOnDelete();

        $table->foreignId('guru_id')
            ->constrained('users')
            ->cascadeOnDelete();

        $table->date('tanggal');

        $table->double('agama')->default(0);

        $table->double('jati_diri')->default(0);

        $table->double('literasi')->default(0);

        $table->double('hasil_fuzzy')->nullable();

        $table->string('kategori')->nullable();

        $table->timestamps();

    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('penilaiains');
    }
};
