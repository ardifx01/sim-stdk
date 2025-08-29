<?php

namespace App\Enums;

enum KondisiEnum: string
{
    case Baik  = 'baik';
    case Rusak = 'rusak';

    public function label(): string
    {
        return ucwords($this->value); // atau custom label
    }
}
