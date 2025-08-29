<?php

namespace App\Livewire\Inventaris;

use App\Models\Inventories;
use Livewire\Component;

class Show extends Component
{
    public $id;
    public function render()
    {
        $inventory = Inventories::with('user')->findOrFail($this->id);
        return view('livewire.inventaris.show', [
            'item' => $inventory,
        ]);
    }
}
