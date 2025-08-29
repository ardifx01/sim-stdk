<?php

namespace App\Livewire\Galeri;

use App\Models\Galery;
use Livewire\Component;

class Show extends Component
{
    public $id;
    public function render()
    {
        $galeri = Galery::with('user')->findOrFail($this->id);
        return view('livewire.galeri.show', [
            'galeri' => $galeri,
        ]);
    }
}
