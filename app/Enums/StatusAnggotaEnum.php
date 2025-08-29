<?php

namespace App\Enums;

enum StatusAnggotaEnum: string

{
    case Aktif = 'aktif';
    case TidakAktif = 'tidak aktif';
    case Menikah = 'menikah';

    public function label(): string
    {
        return ucwords($this->value); // atau custom label
    }
}
