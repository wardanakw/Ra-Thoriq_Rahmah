<?php

namespace Tests\Feature;

use App\Models\Indikator;
use App\Models\Murid;
use App\Models\Penilaian;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class PenilaianStoreTest extends TestCase
{
    use RefreshDatabase;

    public function test_can_store_new_penilaian(): void
    {
        $user = User::factory()->create([
            'role' => 'guru',
        ]);

        $murid = Murid::create([
            'nis' => '001',
            'nama' => 'Budi',
            'jenis_kelamin' => 'L',
            'tempat_lahir' => 'Bandung',
            'tanggal_lahir' => '2020-01-01',
            'kelas' => 'A',
            'nama_orangtua' => 'Ari',
            'alamat' => 'Jl. Test',
        ]);

        Indikator::create(['kode' => 'A1', 'elemen' => 'Agama', 'indikator' => 'Indikator A1', 'urutan' => 1]);
        Indikator::create(['kode' => 'J1', 'elemen' => 'Jati Diri', 'indikator' => 'Indikator J1', 'urutan' => 2]);
        Indikator::create(['kode' => 'L1', 'elemen' => 'Literasi', 'indikator' => 'Indikator L1', 'urutan' => 3]);

        $response = $this->actingAs($user)->post(route('penilaian.store'), [
            'murid_id' => $murid->id,
            'indikator' => [
                1 => 4,
                2 => 3,
                3 => 2,
            ],
        ]);

        $response->assertRedirect(route('penilaian.index'));
        $this->assertDatabaseHas('penilaians', ['murid_id' => $murid->id, 'guru_id' => $user->id]);
        $this->assertDatabaseHas('detail_penilaians', ['indikator_id' => 1, 'nilai' => 4]);
        $this->assertCount(1, Penilaian::all());
    }
}
