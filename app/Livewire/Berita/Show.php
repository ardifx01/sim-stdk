<?php

namespace App\Livewire\Berita;

use App\Models\News;
use Livewire\Component;

class Show extends Component
{
    public $id;

    public function render()
    {
        $berita = News::with('user')->findOrFail($this->id);
        return view('livewire.berita.show', [
            'berita' => $berita,
        ]);
    }
}
