
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('site_settings', function (Blueprint $table) {
            $table->id();

            // Identitas pengaturan
            $table->string('key')->unique();
            $table->string('group')->default('umum');
            $table->string('label');

            // Isi pengaturan
            $table->longText('value')->nullable();
            $table->string('type')->default('text');

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('site_settings');
    }
};
