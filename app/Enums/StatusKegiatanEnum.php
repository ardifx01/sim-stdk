<?php

namespace App\Enums;

enum StatusKegiatanEnum: string
{
    case Selesai = 'selesai';
    case BelumSelesai = 'belum selesai';

    public function label(): string
    {
        return ucwords($this->value); // atau custom label
    }
}
