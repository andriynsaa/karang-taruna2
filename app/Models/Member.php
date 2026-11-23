<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Member extends Model
{
    protected $table = 'members';

    protected $fillable = [
        'division_id',
        'nama_lengkap',
        'foto',
        'jabatan',
        'urutan',
    ];

    public function division(): BelongsTo
    {
        return $this->belongsTo(Division::class);
    }
}
