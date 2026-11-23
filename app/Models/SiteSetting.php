<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SiteSetting extends Model
{
    protected $table = 'site_settings';

    protected $fillable = [
        'key',
        'group',
        'label',
        'value',
        'type',
    ];

    /**
     * Mengambil satu pengaturan berdasarkan key.
     */
    public static function getValue(string $key, mixed $default = null): mixed
    {
        return static::where('key', $key)->value('value') ?? $default;
    }

    /**
     * Mengambil seluruh pengaturan dalam satu kelompok.
     */
    public static function getGroup(string $group)
    {
        return static::where('group', $group)
            ->pluck('value', 'key');
    }
}
