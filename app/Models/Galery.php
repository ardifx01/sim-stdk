<?php

namespace App\Models;

use App\Enums\StatusEnum;
use App\Enums\TampilkanEnum;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Galery extends Model
{
    use \Illuminate\Database\Eloquent\Factories\HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'users_id',
        'foto',
        'judul',
        'keterangan',
        'tampilkan',
        'tanggal',
    ];

    protected $casts = [
        'status' => StatusEnum::class,
    ];
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
