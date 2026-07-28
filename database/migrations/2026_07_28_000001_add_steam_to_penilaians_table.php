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
        if (!Schema::hasColumn('penilaians', 'steam')) {
            Schema::table('penilaians', function (Blueprint $table) {
                $table->decimal('steam', 5, 2)->nullable()->after('jati_diri');
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        if (Schema::hasColumn('penilaians', 'steam')) {
            Schema::table('penilaians', function (Blueprint $table) {
                $table->dropColumn('steam');
            });
        }
    }
};
