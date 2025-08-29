<?php

namespace App\Enums;

enum StatusEnum: string
{
    case Show = 'show';
    case Hide = 'hide';

    public function label(): string
    {
        return ucwords($this->value); // atau custom label
    }
}
