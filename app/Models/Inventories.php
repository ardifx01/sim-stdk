<?php

namespace App\Models;

use App\Enums\KondisiEnum;
use Illuminate\Database\Eloquent\Model;
use \Illuminate\Database\Eloquent\Factories\HasFactory;

class Inventories extends Model
{

    use HasFactory;
    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'user_id',
        'barang',
        'harga',
        'jumlah',
        'kondisi',
        'foto',
    ];

    protected $casts = [
        'kondisi' => KondisiEnum::class,
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
