<?php

namespace Database\Seeders;

use App\Models\SiteSetting;
use Illuminate\Database\Seeder;

class SiteSettingSeeder extends Seeder
{
    public function run(): void
    {
        $settings = [

            // IDENTITAS WEBSITE
            [
                'key' => 'site_name',
                'group' => 'identitas',
                'label' => 'Nama Karang Taruna',
                'value' => 'Karang Taruna',
                'type' => 'text',
            ],
            [
                'key' => 'site_logo',
                'group' => 'identitas',
                'label' => 'Logo Website',
                'value' => null,
                'type' => 'image',
            ],
            [
                'key' => 'site_description',
                'group' => 'identitas',
                'label' => 'Deskripsi Website',
                'value' => 'Website resmi Karang Taruna',
                'type' => 'textarea',
            ],

            // HERO
            [
                'key' => 'hero_image',
                'group' => 'hero',
                'label' => 'Foto Utama Beranda',
                'value' => 'images/hero-karang-taruna.jpg',
                'type' => 'image',
            ],
            [
                'key' => 'hero_badge',
                'group' => 'hero',
                'label' => 'Label Hero',
                'value' => 'ORGANISASI KEPEMUDAAN',
                'type' => 'text',
            ],
            [
                'key' => 'hero_title',
                'group' => 'hero',
                'label' => 'Judul Hero',
                'value' => 'Berkolaborasi Bersama, Berkarya untuk Sesama.',
                'type' => 'textarea',
            ],
            [
                'key' => 'hero_description',
                'group' => 'hero',
                'label' => 'Deskripsi Hero',
                'value' => 'Ruang bagi generasi muda untuk tumbuh, berkolaborasi, dan memberikan kontribusi positif bagi lingkungan masyarakat.',
                'type' => 'textarea',
            ],

            // STATISTIK HERO
            [
                'key' => 'hero_stat_1_number',
                'group' => 'hero',
                'label' => 'Nomor Statistik 1',
                'value' => '01',
                'type' => 'text',
            ],
            [
                'key' => 'hero_stat_1_label',
                'group' => 'hero',
                'label' => 'Keterangan Statistik 1',
                'value' => 'Kebersamaan',
                'type' => 'text',
            ],
            [
                'key' => 'hero_stat_2_number',
                'group' => 'hero',
                'label' => 'Nomor Statistik 2',
                'value' => '02',
                'type' => 'text',
            ],
            [
                'key' => 'hero_stat_2_label',
                'group' => 'hero',
                'label' => 'Keterangan Statistik 2',
                'value' => 'Kreativitas',
                'type' => 'text',
            ],
            [
                'key' => 'hero_stat_3_number',
                'group' => 'hero',
                'label' => 'Nomor Statistik 3',
                'value' => '03',
                'type' => 'text',
            ],
            [
                'key' => 'hero_stat_3_label',
                'group' => 'hero',
                'label' => 'Keterangan Statistik 3',
                'value' => 'Kontribusi',
                'type' => 'text',
            ],

            // KARTU HERO
            [
                'key' => 'hero_card_label',
                'group' => 'hero',
                'label' => 'Tulisan Atas Kartu Hero',
                'value' => 'KARANG TARUNA',
                'type' => 'text',
            ],
            [
                'key' => 'hero_card_title',
                'group' => 'hero',
                'label' => 'Judul Kartu Hero',
                'value' => 'Satu Gerakan, Banyak Perubahan.',
                'type' => 'textarea',
            ],
            [
                'key' => 'hero_card_description',
                'group' => 'hero',
                'label' => 'Deskripsi Kartu Hero',
                'value' => 'Bersama menciptakan lingkungan yang aktif, kreatif, dan penuh kepedulian.',
                'type' => 'textarea',
            ],
            [
                'key' => 'hero_card_footer_label',
                'group' => 'hero',
                'label' => 'Label Bawah Kartu Hero',
                'value' => 'TUMBUH BERSAMA',
                'type' => 'text',
            ],
            [
                'key' => 'hero_card_footer_text',
                'group' => 'hero',
                'label' => 'Tulisan Bawah Kartu Hero',
                'value' => 'Untuk masa depan',
                'type' => 'text',
            ],

            // PROFIL
            [
                'key' => 'profile_label',
                'group' => 'profil',
                'label' => 'Label Profil',
                'value' => 'TENTANG KAMI',
                'type' => 'text',
            ],
            [
                'key' => 'profile_title',
                'group' => 'profil',
                'label' => 'Judul Profil Beranda',
                'value' => 'Anak muda punya peran dalam perubahan.',
                'type' => 'textarea',
            ],
            [
                'key' => 'profile_description',
                'group' => 'profil',
                'label' => 'Deskripsi Profil Beranda',
                'value' => 'Karang Taruna merupakan wadah bagi generasi muda untuk mengembangkan potensi, membangun kepedulian sosial, serta berpartisipasi dalam kegiatan positif di lingkungan masyarakat.',
                'type' => 'textarea',
            ],

            // DIVISI
            [
                'key' => 'division_label',
                'group' => 'divisi',
                'label' => 'Label Divisi',
                'value' => 'BIDANG ORGANISASI',
                'type' => 'text',
            ],
            [
                'key' => 'division_title',
                'group' => 'divisi',
                'label' => 'Judul Divisi Beranda',
                'value' => 'Bergerak dalam divisi.',
                'type' => 'text',
            ],

            // ANGGOTA
            [
                'key' => 'member_label',
                'group' => 'anggota',
                'label' => 'Label Anggota',
                'value' => 'SUMBER KEKUATAN KAMI',
                'type' => 'text',
            ],
            [
                'key' => 'member_title',
                'group' => 'anggota',
                'label' => 'Judul Anggota',
                'value' => 'Setiap anggota punya cerita dan kontribusi.',
                'type' => 'textarea',
            ],
            [
                'key' => 'member_description',
                'group' => 'anggota',
                'label' => 'Deskripsi Anggota',
                'value' => 'Kenali orang-orang yang menjadi bagian dari perjalanan dan kegiatan Karang Taruna.',
                'type' => 'textarea',
            ],
            [
                'key' => 'member_button',
                'group' => 'anggota',
                'label' => 'Tulisan Tombol Anggota',
                'value' => 'Kenali Anggota',
                'type' => 'text',
            ],

            // BERITA
            [
                'key' => 'news_label',
                'group' => 'berita',
                'label' => 'Label Berita',
                'value' => 'INFORMASI TERBARU',
                'type' => 'text',
            ],
            [
                'key' => 'news_title',
                'group' => 'berita',
                'label' => 'Judul Berita Beranda',
                'value' => 'Cerita dan kabar.',
                'type' => 'text',
            ],
            [
                'key' => 'news_empty_title',
                'group' => 'berita',
                'label' => 'Judul Saat Belum Ada Berita',
                'value' => 'Informasi akan segera hadir',
                'type' => 'text',
            ],
            [
                'key' => 'news_empty_description',
                'group' => 'berita',
                'label' => 'Deskripsi Saat Belum Ada Berita',
                'value' => 'Berita dan informasi terbaru akan ditampilkan di sini.',
                'type' => 'textarea',
            ],

            // KEGIATAN
            [
                'key' => 'activity_label',
                'group' => 'kegiatan',
                'label' => 'Label Kegiatan',
                'value' => 'AKTIVITAS KAMI',
                'type' => 'text',
            ],
            [
                'key' => 'activity_title',
                'group' => 'kegiatan',
                'label' => 'Judul Kegiatan',
                'value' => 'Dari rencana menjadi aksi.',
                'type' => 'text',
            ],
            [
                'key' => 'activity_description',
                'group' => 'kegiatan',
                'label' => 'Deskripsi Kegiatan',
                'value' => 'Berbagai kegiatan menjadi ruang untuk belajar, berkolaborasi, dan memberikan dampak nyata.',
                'type' => 'textarea',
            ],
            [
                'key' => 'activity_card_label',
                'group' => 'kegiatan',
                'label' => 'Label Kartu Kegiatan',
                'value' => 'JELAJAHI AKTIVITAS',
                'type' => 'text',
            ],
            [
                'key' => 'activity_card_title',
                'group' => 'kegiatan',
                'label' => 'Judul Kartu Kegiatan',
                'value' => 'Lihat perjalanan kegiatan kami.',
                'type' => 'text',
            ],
            [
                'key' => 'activity_button',
                'group' => 'kegiatan',
                'label' => 'Tulisan Tombol Kegiatan',
                'value' => 'Lihat Kegiatan',
                'type' => 'text',
            ],

            // GALERI
            [
                'key' => 'gallery_label',
                'group' => 'galeri',
                'label' => 'Label Galeri',
                'value' => 'DOKUMENTASI',
                'type' => 'text',
            ],
            [
                'key' => 'gallery_title',
                'group' => 'galeri',
                'label' => 'Judul Galeri',
                'value' => 'Momen kebersamaan.',
                'type' => 'text',
            ],

            // STRUKTUR ORGANISASI
            [
                'key' => 'structure_label',
                'group' => 'struktur',
                'label' => 'Label Struktur',
                'value' => 'STRUKTUR ORGANISASI',
                'type' => 'text',
            ],
            [
                'key' => 'structure_title',
                'group' => 'struktur',
                'label' => 'Judul Struktur',
                'value' => 'Kenali susunan kepengurusan kami.',
                'type' => 'textarea',
            ],
            [
                'key' => 'structure_description',
                'group' => 'struktur',
                'label' => 'Deskripsi Struktur',
                'value' => 'Lihat susunan pengurus dan pembagian peran dalam organisasi Karang Taruna.',
                'type' => 'textarea',
            ],
            [
                'key' => 'structure_button',
                'group' => 'struktur',
                'label' => 'Tulisan Tombol Struktur',
                'value' => 'Lihat Struktur',
                'type' => 'text',
            ],
        ];

        foreach ($settings as $setting) {
            SiteSetting::firstOrCreate(
                ['key' => $setting['key']],
                $setting
            );
        }
    }
}
