<?php

namespace App\Http\Controllers;

use App\Models\Murid;
use Illuminate\Http\Request;

class MuridController extends Controller
{
    public function index()
    {
        $murid = Murid::latest()->paginate(10);

        return view('murid.index', compact('murid'));
    }

    public function create()
    {
        return view('murid.create');
    }

    public function store(Request $request)
    {
        try {
            $request->validate([
                'nis' => 'required|unique:murid,nis',
                'nama' => 'required',
                'jenis_kelamin' => 'required',
                'tempat_lahir' => 'required',
                'tanggal_lahir' => 'required',
                'kelas' => 'required',
                'nama_orangtua' => 'required',
                'alamat' => 'required',
                'foto' => 'nullable|image'
            ]);

            $foto = null;

            if ($request->hasFile('foto')) {
                $foto = $request->file('foto')->store('murid', 'public');
            }

            $jenisKelamin = $request->jenis_kelamin;

            if (in_array(strtolower($jenisKelamin), ['perempuan', 'wanita', 'female'])) {
                $jenisKelamin = 'P';
            } elseif (in_array(strtolower($jenisKelamin), [
                'laki-laki',
                'laki laki',
                'lakilaki',
                'male',
                'pria'
            ])) {
                $jenisKelamin = 'L';
            }

            Murid::create([
                'foto' => $foto,
                'nis' => $request->nis,
                'nama' => $request->nama,
                'jenis_kelamin' => $jenisKelamin,
                'tempat_lahir' => $request->tempat_lahir,
                'tanggal_lahir' => $request->tanggal_lahir,
                'kelas' => $request->kelas,
                'nama_orangtua' => $request->nama_orangtua,
                'alamat' => $request->alamat,
            ]);

            return redirect()
                ->route('murid.index')
                ->with('success', 'Data murid berhasil ditambahkan!');

        } catch (\Exception $e) {
            return redirect()
                ->back()
                ->with('error', 'Terjadi kesalahan: ' . $e->getMessage())
                ->withInput();
        }
    }

    public function edit(Murid $murid)
    {
        return view('murid.edit', compact('murid'));
    }

    public function update(Request $request, Murid $murid)
    {
        $request->validate([
            'nis' => 'required|unique:murid,nis,' . $murid->id,
            'nama' => 'required',
            'jenis_kelamin' => 'required',
            'tempat_lahir' => 'required',
            'tanggal_lahir' => 'required',
            'kelas' => 'required',
            'nama_orangtua' => 'required',
            'alamat' => 'required'
        ]);

        $data = $request->except('foto');

        if (isset($data['jenis_kelamin'])) {
            $jenisKelamin = $data['jenis_kelamin'];

            if (in_array(strtolower($jenisKelamin), [
                'perempuan',
                'wanita',
                'female'
            ])) {
                $data['jenis_kelamin'] = 'P';

            } elseif (in_array(strtolower($jenisKelamin), [
                'laki-laki',
                'laki laki',
                'lakilaki',
                'male',
                'pria'
            ])) {
                $data['jenis_kelamin'] = 'L';
            }
        }

        if ($request->hasFile('foto')) {
            $data['foto'] = $request
                ->file('foto')
                ->store('murid', 'public');
        }

        $murid->update($data);

        return redirect()
            ->route('murid.index')
            ->with('success', 'Data murid berhasil diperbarui.');
    }

    public function destroy(Murid $murid)
    {
        $murid->delete();

        return redirect()
            ->route('murid.index')
            ->with('success', 'Data murid berhasil dihapus.');
    }

    public function show(Murid $murid)
    {
        return view('murid.show', compact('murid'));
    }
}