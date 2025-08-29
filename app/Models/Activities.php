<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Activities extends Model
{
    use HasFactory;

    protected $fillable = [
        'judul',
        'foto',
        'keterangan',
        'tanggal',
        'status',
    ];

    public function cash(): BelongsTo
    {
        return $this->belongsTo(Cash::class);
    }
}
