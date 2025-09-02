<?php

namespace App\Livewire\Profil;

use Livewire\Component;
use Livewire\Attributes\Layout;
use Illuminate\Support\Facades\Auth;

class Index extends Component
{
    #[Layout('layouts.userspage')]
    public function render()
    {
        $user = Auth::user(); // ambil user yang sedang login

        return view('livewire.profil.index', [
            'user' => $user
        ]);
    }
}
