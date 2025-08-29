<?php

namespace App\Livewire\Anggota;

use App\Models\User;
use Livewire\Component;

class Show extends Component
{
    public $id;
    public function render()
    {
        $user = User::findOrFail($this->id);
        return view('livewire.anggota.show', [
            'user' => $user,
        ]);
    }
}
