<?php

namespace App\Enums;

enum statusAbsensi: string
{
    case Hadir  = 'hadir';
    case TidakHadir = 'tidak hadir';

    public function label(): string
    {
        return ucwords($this->value); // atau custom label
    }
}
