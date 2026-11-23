<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Division;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DivisionController extends Controller
{
    /**
     * Menampilkan daftar divisi.
     */
    public function index()
    {
        $divisions = Division::orderBy('urutan')
            ->orderBy('id')
            ->get();

        return view('admin.divisions.index', compact('divisions'));
    }

    /**
     * Menampilkan formulir tambah divisi.
     */
    public function create()
    {
        $nextOrder = (Division::max('urutan') ?? 0) + 1;

        return view('admin.divisions.create', compact('nextOrder'));
    }

    /**
     * Menyimpan divisi baru.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama_divisi' => ['required', 'string', 'max:255'],
            'deskripsi' => ['nullable', 'string', 'max:5000'],
            'foto' => ['nullable', 'image', 'mimes:jpg,jpeg,png,webp', 'max:5120'],
            'urutan' => ['required', 'integer', 'min:0'],
        ], [
            'nama_divisi.required' => 'Nama divisi wajib diisi.',
            'nama_divisi.max' => 'Nama divisi maksimal 255 karakter.',
            'deskripsi.max' => 'Deskripsi maksimal 5000 karakter.',
            'foto.image' => 'File harus berupa gambar.',
            'foto.mimes' => 'Foto harus berformat JPG, JPEG, PNG, atau WEBP.',
            'foto.max' => 'Ukuran foto maksimal 5 MB.',
            'urutan.required' => 'Urutan tampil wajib diisi.',
            'urutan.integer' => 'Urutan tampil harus berupa angka.',
            'urutan.min' => 'Urutan tampil tidak boleh kurang dari 0.',
        ]);

        if ($request->hasFile('foto')) {
            $validated['foto'] = $request->file('foto')
                ->store('divisions', 'public');
        }

        Division::create($validated);

        return redirect()
            ->route('admin.divisions.index')
            ->with('success', 'Divisi berhasil ditambahkan.');
    }

    /**
     * Menampilkan formulir edit divisi.
     */
    public function edit(Division $division)
    {
        return view('admin.divisions.edit', compact('division'));
    }

    /**
     * Memperbarui data divisi.
     */
    public function update(Request $request, Division $division)
    {
        $validated = $request->validate([
            'nama_divisi' => ['required', 'string', 'max:255'],
            'deskripsi' => ['nullable', 'string', 'max:5000'],
            'foto' => ['nullable', 'image', 'mimes:jpg,jpeg,png,webp', 'max:5120'],
            'urutan' => ['required', 'integer', 'min:0'],
        ], [
            'nama_divisi.required' => 'Nama divisi wajib diisi.',
            'nama_divisi.max' => 'Nama divisi maksimal 255 karakter.',
            'deskripsi.max' => 'Deskripsi maksimal 5000 karakter.',
            'foto.image' => 'File harus berupa gambar.',
            'foto.mimes' => 'Foto harus berformat JPG, JPEG, PNG, atau WEBP.',
            'foto.max' => 'Ukuran foto maksimal 5 MB.',
            'urutan.required' => 'Urutan tampil wajib diisi.',
            'urutan.integer' => 'Urutan tampil harus berupa angka.',
            'urutan.min' => 'Urutan tampil tidak boleh kurang dari 0.',
        ]);

        if ($request->hasFile('foto')) {
            $newPath = $request->file('foto')
                ->store('divisions', 'public');

            if ($division->foto) {
                Storage::disk('public')->delete($division->foto);
            }

            $validated['foto'] = $newPath;
        }

        $division->update($validated);

        return redirect()
            ->route('admin.divisions.index')
            ->with('success', 'Divisi berhasil diperbarui.');
    }

    /**
     * Menghapus divisi.
     */
    public function destroy(Division $division)
    {
        if ($division->foto) {
            Storage::disk('public')->delete($division->foto);
        }

        $division->delete();

        return redirect()
            ->route('admin.divisions.index')
            ->with('success', 'Divisi berhasil dihapus.');
    }
}
