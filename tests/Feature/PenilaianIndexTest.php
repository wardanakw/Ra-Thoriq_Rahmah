<?php

namespace Tests\Feature;

use App\Models\Murid;
use App\Models\Penilaian;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class PenilaianIndexTest extends TestCase
{
    use RefreshDatabase;

    public function test_index_displays_membership_details_for_each_assessment(): void
    {
        $user = User::create([
            'nama' => 'Guru Test',
            'username' => 'guru-test',
            'email' => 'guru@test.com',
            'password' => bcrypt('password'),
            'role' => 'guru',
        ]);

        $murid = Murid::create([
            'nis' => '002',
            'nama' => 'Siti',
            'jenis_kelamin' => 'P',
            'tempat_lahir' => 'Bandung',
            'tanggal_lahir' => '2021-02-01',
            'kelas' => 'B',
            'nama_orangtua' => 'Dedi',
            'alamat' => 'Jl. Test 2',
        ]);

        Penilaian::create([
            'murid_id' => $murid->id,
            'guru_id' => $user->id,
            'tanggal' => '2026-07-31',
            'agama' => 71.875,
            'jati_diri' => 81.250,
            'steam' => 57.143,
            'hasil_fuzzy' => 65.000,
            'kategori' => 'BSH',
        ]);

        $response = $this->actingAs($user)->get(route('penilaian.index'));

        $response->assertOk();
        $response->assertSee('71,875');
        $response->assertSee('81,250');
        $response->assertSee('57,143');
        $response->assertSee('BSH');
        $response->assertSee('0,875');
    }
}
