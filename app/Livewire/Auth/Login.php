<?php

namespace App\Livewire\Auth;

use Livewire\Component;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Rule;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

#[Layout('layouts.guest')]
class Login extends Component
{
    #[Rule('required', 'email')]
    public string $email = '';
    #[Rule('required',)]
    public string $password = '';

    public function login()
    {
        if (Auth::attempt($this->validate())) {
            return redirect()->route('users.beranda');
        }

        throw ValidationException::withMessages([
            'email' => 'The provide credencials do not match our records',
        ]);
    }

    public function render()
    {
        return view('livewire.auth.login');
    }
}
