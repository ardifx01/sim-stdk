<?php

namespace App\Enums;

enum JabatanEnum: string
{
    case Ketua = 'ketua';
    case WakilKetua = 'wakil ketua';
    case Sekretaris = 'sekretaris';
    case Bendahara = 'bendahara';
    case Anggota = 'anggota';
    case Tamu = 'tamu';

    public function label(): string
    {
        return ucwords($this->value); // atau custom label
    }
}
