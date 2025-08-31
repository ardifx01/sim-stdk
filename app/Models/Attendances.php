<?php

namespace App\Models;

use App\Enums\statusAbsensi;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Attendances extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'activity_id',
        'status',
    ];

    protected $casts = [
        'statusAbsensi' =>  statusAbsensi::class,
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function activity()
    {
        return $this->belongsTo(Activities::class);
    }
}
