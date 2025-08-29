<?php

namespace App\Enums;

enum JenisKelamin: string
{
    case LakiLaki = 'laki laki';
    case Perempuan = 'perempuan';

    public function label(): string
    {
        return ucwords($this->value); // atau custom label
    }
}
