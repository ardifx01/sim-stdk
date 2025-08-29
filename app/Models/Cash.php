<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Cash extends Model
{
    use HasFactory;


    protected $fillable = [
        'user_id',
        'activity_id',
        'pemasukan',
        'pengeluaran',
        'tanggal',
    ];

    public function getPemasukanFormattedAttribute()
    {
        return 'Rp ' . number_format($this->pemasukan, 0, ',', '.');
    }

    public function getPengeluaranFormattedAttribute()
    {
        return 'Rp ' . number_format($this->pengeluaran, 0, ',', '.');
    }

    public function getTotalFormattedAttribute()
    {
        $total = $this->pemasukan - $this->pengeluaran;
        return 'Rp ' . number_format($total, 0, ',', '.');
    }




    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function activity(): BelongsTo
    {
        return $this->belongsTo(Activities::class);
    }
}
