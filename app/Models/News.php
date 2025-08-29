<?php

namespace App\Models;

use App\Enums\StatusEnum;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class News extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'judul',
        'users_id',
        'keterangan',
        'tampilkan',
        'tanggal',
        'foto',
    ];

    protected $casts = [
        'status' => StatusEnum::class,
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
