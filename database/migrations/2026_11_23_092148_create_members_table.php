
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('members', function (Blueprint $table) {
            $table->id();

            // Hubungan dengan divisi
            $table->foreignId('division_id')
                ->constrained('divisions')
                ->cascadeOnDelete();

            // Data anggota
            $table->string('nama_lengkap');
            $table->string('foto')->nullable();

            // Jabatan dalam divisi
            $table->enum('jabatan', [
                'ketua',
                'wakil',
                'anggota',
            ]);

            // Urutan tampilan
            $table->unsignedInteger('urutan')->default(0);

            $table->timestamps();

            // Satu divisi hanya boleh memiliki satu Ketua
            $table->unique(
                ['division_id', 'jabatan'],
                'members_division_jabatan_unique'
            );
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('members');
    }
};
