<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SiteSetting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SiteSettingController extends Controller
{
    /**
     * Menampilkan seluruh pengaturan website.
     */
    public function index()
    {
        $settings = SiteSetting::orderBy('id')->get()
            ->groupBy('group');

        return view('admin.content.settings', compact('settings'));
    }

    /**
     * Menyimpan perubahan pengaturan website.
     */
    public function update(Request $request)
    {
        $allSettings = SiteSetting::all();

        $rules = [
            'settings' => ['required', 'array'],
        ];

        foreach ($allSettings as $setting) {
            $field = 'settings.' . $setting->key;

            if ($setting->type === 'image') {
                $rules[$field] = [
                    'nullable',
                    'image',
                    'mimes:jpg,jpeg,png,webp',
                    'max:5120',
                ];
            } else {
                $rules[$field] = [
                    'nullable',
                    'string',
                    'max:10000',
                ];
            }
        }

        $request->validate($rules, [
            'settings.*.image' => 'File harus berupa gambar.',
            'settings.*.mimes' => 'Format gambar harus JPG, JPEG, PNG, atau WEBP.',
            'settings.*.max' => 'Ukuran gambar maksimal 5 MB.',
        ]);

        foreach ($allSettings as $setting) {
            $key = $setting->key;

            // Proses unggah gambar
            if ($setting->type === 'image') {
                if ($request->hasFile("settings.$key")) {
                    $oldValue = $setting->value;

                    $newPath = $request->file("settings.$key")
                        ->store('site-settings', 'public');

                    $setting->update([
                        'value' => $newPath,
                    ]);

                    // Hapus gambar lama jika berasal dari folder CMS
                    if (
                        $oldValue &&
                        str_starts_with($oldValue, 'site-settings/')
                    ) {
                        Storage::disk('public')->delete($oldValue);
                    }
                }

                continue;
            }

            // Proses teks
            $setting->update([
                'value' => $request->input("settings.$key"),
            ]);
        }

        return redirect()
            ->route('admin.content.index')
            ->with('success', 'Pengaturan website berhasil disimpan.');
    }
}
