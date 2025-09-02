<?php

namespace App\Livewire\Profil;

use Livewire\Component;
use Livewire\Attributes\Layout;

use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Http\UploadedFile;
use App\Models\User;
use App\Enums\JabatanEnum;
use App\Enums\StatusAnggotaEnum;
use App\Enums\JenisKelamin;

class Update extends Component
{
    use WithFileUploads;

    public $nama;
    public $email;
    public $umur;
    public $pekerjaan;
    public $alamat;
    public $no_telepon;
    public $jabatan;
    public $status;
    public $jenis_kelamin;
    public $foto;

    public $currentFoto; // untuk preview foto lama

    public function mount()
    {
        $user = Auth::user();

        $this->nama          = $user->nama;
        $this->email         = $user->email;
        $this->umur          = $user->umur;
        $this->pekerjaan     = $user->pekerjaan;
        $this->alamat        = $user->alamat;
        $this->no_telepon    = $user->no_telepon;
        $this->jabatan       = $user->jabatan;
        $this->status        = $user->status;
        $this->jenis_kelamin = $user->jenis_kelamin;
        $this->currentFoto   = $user->foto;
    }

    public function updateProfil()
    {
        $rules = [
            'nama'          => 'required|min:5|max:200|string',
            'email'         => 'required|email|unique:users,email,' . Auth::id(),
            'umur'          => 'required|integer|min:1|max:100',
            'pekerjaan'     => 'required|string|max:100',
            'alamat'        => 'required|string|max:255',
            'no_telepon'    => 'required|string|max:14|min:8',
            'jabatan'       => ['required', new \Illuminate\Validation\Rules\Enum(JabatanEnum::class)],
            'status'        => ['required', new \Illuminate\Validation\Rules\Enum(StatusAnggotaEnum::class)],
            'jenis_kelamin' => ['required', new \Illuminate\Validation\Rules\Enum(JenisKelamin::class)],
            'foto'          => 'nullable|image|mimes:png,jpg,jpeg|max:4048',
        ];

        $messages = [
            'nama.required'       => 'Nama lengkap harus diisi',
            'nama.min'            => 'Nama lengkap minimal 5 karakter',
            'email.required'      => 'Email harus diisi',
            'email.email'         => 'Email tidak valid',
            'umur.required'       => 'Umur harus diisi',
            'umur.integer'        => 'Umur harus berupa angka',
            'umur.min'            => 'Umur minimal 1 tahun',
            'umur.max'            => 'Umur maksimal 100 tahun',
            'pekerjaan.required'  => 'Pekerjaan harus diisi',
            'alamat.required'     => 'Alamat harus diisi',
            'no_telepon.required' => 'No telepon harus diisi',
        ];

        $validated = $this->validate($rules, $messages);

        $user = Auth::user();

        // jika upload foto baru
        if ($this->foto instanceof UploadedFile) {
            if ($user->foto) {
                File::delete(public_path($user->foto));
            }

            $filename = $this->foto->store('', 'public');
            $validated['foto'] = '/uploads/' . $filename;
        } else {
            unset($validated['foto']);
        }

        try {
            $user->update($validated);
            flash()->success('Profil berhasil diperbarui!');
        } catch (\Throwable $th) {
            flash()->error('Profil gagal diperbarui!');
            return;
        }

        return redirect()->route('profil.index');
    }
    #[Layout('layouts.userspage')]
    public function render()
    {
        return view('livewire.profil.update');
    }
}
