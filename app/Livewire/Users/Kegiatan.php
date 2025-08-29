<?php

namespace App\Livewire\Users;

use Livewire\Component;
use Livewire\Attributes\Layout;

class Kegiatan extends Component
{
    #[Layout('layouts.userspage')]
    public function render()
    {
        return view('livewire.users.kegiatan');
    }
}
