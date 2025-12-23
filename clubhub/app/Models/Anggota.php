<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Anggota extends Model
{
    protected $fillable = [
        'name',
        'email',
        'phone',
        'alamat',
        'tanggal_lahir',
        'posisi',
        'status',
        'created_by',
    ];

    protected $casts = [
        'tanggal_lahir' => 'date',
    ];

    public function creator(): BelongsTo
    {
        return $this->belongsTo(User::class, 'created_by');
    }
}
