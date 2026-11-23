<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Division extends Model
{
    protected $table = 'divisions';

    protected $fillable = [
        'nama_divisi',
        'deskripsi',
        'foto',
        'urutan',
    ];

    public function members(): HasMany
    {
        return $this->hasMany(Member::class);
    }
}
