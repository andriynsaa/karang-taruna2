<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Division;
use App\Models\Member;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;
use Illuminate\Validation\ValidationException;

class MemberController extends Controller
{
    /**
     * Menampilkan daftar anggota.
     */
    public function index()
    {
        $members = Member::with('division')
            ->orderBy('division_id')
            ->orderByRaw("
                CASE jabatan
                    WHEN 'ketua' THEN 1
                    WHEN 'wakil' THEN 2
                    ELSE 3
                END
            ")
            ->orderBy('urutan')
            ->get();

        return view('admin.members.index', compact('members'));
    }

    /**
     * Form tambah anggota.
     */
    public function create()
    {
        $divisions = Division::orderBy('urutan')
            ->orderBy('nama_divisi')
            ->get();

        return view('admin.members.create', compact('divisions'));
    }

    /**
     * Menyimpan anggota baru.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'division_id' => [
                'required',
                'exists:divisions,id',
            ],
            'nama_lengkap' => [
                'required',
                'string',
                'max:255',
            ],
            'foto' => [
                'nullable',
                'image',
                'mimes:jpg,jpeg,png,webp',
                'max:5120',
            ],
            'jabatan' => [
                'required',
                Rule::in(['ketua', 'wakil', 'anggota']),
            ],
            'urutan' => [
                'required',
                'integer',
                'min:0',
            ],
        ], [
            'division_id.required' => 'Silakan pilih divisi.',
            'division_id.exists' => 'Divisi yang dipilih tidak ditemukan.',
            'nama_lengkap.required' => 'Nama anggota wajib diisi.',
            'nama_lengkap.max' => 'Nama maksimal 255 karakter.',
            'foto.image' => 'File harus berupa gambar.',
            'foto.mimes' => 'Foto harus berformat JPG, JPEG, PNG, atau WEBP.',
            'foto.max' => 'Ukuran foto maksimal 5 MB.',
            'jabatan.required' => 'Silakan pilih jabatan.',
            'jabatan.in' => 'Jabatan yang dipilih tidak valid.',
            'urutan.required' => 'Urutan tampil wajib diisi.',
            'urutan.integer' => 'Urutan tampil harus berupa angka.',
            'urutan.min' => 'Urutan tampil tidak boleh kurang dari 0.',
        ]);

        $this->ensureJabatanAvailable(
            $validated['division_id'],
            $validated['jabatan']
        );

        if ($request->hasFile('foto')) {
            $validated['foto'] = $request->file('foto')
                ->store('members', 'public');
        }

        Member::create($validated);

        return redirect()
            ->route('admin.members.index')
            ->with('success', 'Anggota berhasil ditambahkan.');
    }

    /**
     * Form edit anggota.
     */
    public function edit(Member $member)
    {
        $divisions = Division::orderBy('urutan')
            ->orderBy('nama_divisi')
            ->get();

        return view('admin.members.edit', compact(
            'member',
            'divisions'
        ));
    }

    /**
     * Memperbarui anggota.
     */
    public function update(Request $request, Member $member)
    {
        $validated = $request->validate([
            'division_id' => [
                'required',
                'exists:divisions,id',
            ],
            'nama_lengkap' => [
                'required',
                'string',
                'max:255',
            ],
            'foto' => [
                'nullable',
                'image',
                'mimes:jpg,jpeg,png,webp',
                'max:5120',
            ],
            'jabatan' => [
                'required',
                Rule::in(['ketua', 'wakil', 'anggota']),
            ],
            'urutan' => [
                'required',
                'integer',
                'min:0',
            ],
        ]);

        $this->ensureJabatanAvailable(
            $validated['division_id'],
            $validated['jabatan'],
            $member->id
        );

        if ($request->hasFile('foto')) {
            $newPath = $request->file('foto')
                ->store('members', 'public');

            if ($member->foto) {
                Storage::disk('public')->delete($member->foto);
            }

            $validated['foto'] = $newPath;
        }

        $member->update($validated);

        return redirect()
            ->route('admin.members.index')
            ->with('success', 'Data anggota berhasil diperbarui.');
    }

    /**
     * Menghapus anggota.
     */
    public function destroy(Member $member)
    {
        if ($member->foto) {
            Storage::disk('public')->delete($member->foto);
        }

        $member->delete();

        return redirect()
            ->route('admin.members.index')
            ->with('success', 'Anggota berhasil dihapus.');
    }

    /**
     * Memastikan satu divisi hanya memiliki satu Ketua dan satu Wakil.
     * Jabatan Anggota boleh lebih dari satu.
     */
    private function ensureJabatanAvailable(
        int $divisionId,
        string $jabatan,
        ?int $ignoreMemberId = null
    ): void {
        if ($jabatan === 'anggota') {
            return;
        }

        $query = Member::where('division_id', $divisionId)
            ->where('jabatan', $jabatan);

        if ($ignoreMemberId) {
            $query->where('id', '!=', $ignoreMemberId);
        }

        if ($query->exists()) {
            $namaJabatan = $jabatan === 'ketua'
                ? 'Ketua'
                : 'Wakil Ketua';

            throw ValidationException::withMessages([
                'jabatan' => "Divisi ini sudah memiliki {$namaJabatan}.",
            ]);
        }
    }
}
