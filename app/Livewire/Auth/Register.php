<?php

namespace App\Livewire\Auth;

use App\Models\User;
use Livewire\Component;
use App\Enums\JabatanEnum;
use App\Enums\JenisKelamin;
use Livewire\Attributes\Layout;
use App\Enums\StatusAnggotaEnum;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Enum;

class Register extends Component
{
    #[Layout('layouts.guest')]
    // Property untuk form input


    public $nama;
    public $email;
    public $umur;
    public $pekerjaan;
    public $alamat;
    public $no_telepon;
    public $jenis_kelamin;

    public $password;
    public $password_confirmation;


    // Method untuk register
    public function register()
    {

        $rules = [
            'nama' => 'required|min:5|max:200|string',
            'email' => 'required|email|unique:users,email',
            'umur' => 'required|integer|min:1|max:100',
            'pekerjaan' => 'required|string|max:100',
            'alamat' => 'required|string|max:255',
            'no_telepon' => 'required|string|max:14|min:8',
            'jenis_kelamin' => ['required', new Enum(JenisKelamin::class)],
            'password' => 'required|min:6|confirmed',

        ];
        $messages = [
            'nama.required' => 'Nama lengkap harus diisi',
            'nama.min' => 'Nama lengkap minimal 5 karakter',
            'email.required' => 'Email harus diisi',
            'email.email' => 'Email tidak valid',
            'email.unique' => 'Email sudah terdaftar',
            'umur.required' => 'Umur harus diisi',
            'umur.integer' => 'Umur harus berupa angka',
            'umur.min' => 'Umur minimal 1 tahun',
            'umur.max' => 'Umur maksimal 100 tahun',
            'pekerjaan.required' => 'Pekerjaan harus diisi',
            'pekerjaan.string' => 'Pekerjaan harus berupa string',
            'pekerjaan.max' => 'Pekerjaan maksimal 100 karakter',
            'alamat.required' => 'Alamat harus diisi',
            'alamat.string' => 'Alamat harus berupa string',
            'alamat.max' => 'Alamat maksimal 255 karakter',
            'no_telepon.required' => 'No telepon harus diisi',
            'no_telepon.string' => 'No telepon harus berupa string',
            'no_telepon.max' => 'No telepon maksimal 14 karakter',
            'no_telepon.min' => 'No telepon minimal 8 karakter',
            'password.required' => 'Password wajib diisi.',
            'password.min' => 'Password minimal 6 karakter.',
            'password.confirmed' => 'Konfirmasi password tidak cocok.',
            // Add other validation messages as needed
        ];
        $validated = $this->validate($rules, $messages);

        // Simpan user baru
        $user = User::create([
            'nama' => $validated['nama'],
            'email' => $validated['email'],
            'umur' => $validated['umur'],
            'pekerjaan' => $validated['pekerjaan'],
            'alamat' => $validated['alamat'],
            'no_telepon' => $validated['no_telepon'],
            'jenis_kelamin' => $validated['jenis_kelamin'],
            'password' => Hash::make($validated['password']),
        ]);

        Auth::login($user);
        // Bisa langsung login user atau redirect ke halaman login
        session()->flash('success', 'Registrasi berhasil! Selamat Datang.');

        return redirect()->route('users.beranda'); // pastikan route login ada
    }

    public function render()
    {
        return view('livewire.auth.register');
    }
}
