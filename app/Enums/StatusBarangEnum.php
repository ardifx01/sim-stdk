<?php

namespace App\Enums;

enum StatusBarangEnum: string

{
    case Tersedia = 'tersedia';
    case TidakTersedia = 'tidak tersedia';

    public function label(): string
    {
        return ucwords($this->value); // atau custom label
    }
}
