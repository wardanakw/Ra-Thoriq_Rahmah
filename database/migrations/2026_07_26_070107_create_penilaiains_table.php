<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        if (!Schema::hasTable('penilaians')) {
            Schema::create('penilaians', function (Blueprint $table) {
                $table->id();
                $table->foreignId('murid_id')->constrained('murid')->onDelete('cascade');
                $table->foreignId('guru_id')->constrained('users')->onDelete('cascade');
                $table->date('tanggal');
                $table->decimal('agama', 5, 2)->nullable();
                $table->decimal('jati_diri', 5, 2)->nullable();
                $table->decimal('steam', 5, 2)->nullable();
                $table->string('hasil_fuzzy', 50)->nullable();
                $table->string('kategori', 100)->nullable();
                $table->timestamps();
            });
        }
    }

    public function down(): void
    {
        Schema::dropIfExists('penilaians');
    }
};