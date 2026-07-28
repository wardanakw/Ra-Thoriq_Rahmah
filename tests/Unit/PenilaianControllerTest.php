<?php

namespace Tests\Unit;

use App\Http\Controllers\PenilaianController;
use App\Models\Penilaian;
use Tests\TestCase;

class PenilaianControllerTest extends TestCase
{
    public function test_sync_fuzzy_data_populates_hasil_fuzzy_and_kategori(): void
    {
        $penilaian = new class extends Penilaian {
            public array $updates = [];

            public function update(array $attributes = [], array $options = []): bool
            {
                $this->updates = array_merge($this->updates, $attributes);

                foreach ($attributes as $key => $value) {
                    $this->{$key} = $value;
                }

                return true;
            }
        };

        $penilaian->agama = 80;
        $penilaian->jati_diri = 70;
        $penilaian->literasi = 60;

        $controller = new PenilaianController();
        $result = $controller->syncFuzzyData($penilaian);

        $this->assertNotNull($result->hasil_fuzzy);
        $this->assertNotNull($result->kategori);
        $this->assertArrayHasKey('hasil_fuzzy', $result->updates);
        $this->assertArrayHasKey('kategori', $result->updates);
    }
}
