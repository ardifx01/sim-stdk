<?php

namespace App\Livewire\Users;

use Livewire\Component;
use Livewire\Attributes\Layout;

class Berita extends Component
{
    #[Layout('layouts.userspage')]

    public function render()
    {
        return view('livewire.users.berita');
    }
}
