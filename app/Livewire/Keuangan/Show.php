<?php

namespace App\Livewire\Keuangan;

use App\Models\Cash;
use Livewire\Component;

class Show extends Component
{
    public $id;

    public function render()
    {
        $cash = Cash::with('user')->findOrFail($this->id);
        return view('livewire.keuangan.show', compact('cash'));
    }
}
