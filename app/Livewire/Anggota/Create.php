<?php

namespace App\Livewire\Anggota;

use App\Models\User;

use Livewire\Component;
use App\Enums\StatusEnum;
use App\Enums\JabatanEnum;
use App\Enums\JenisKelamin;
use Livewire\WithFileUploads;
use App\Enums\StatusAnggotaEnum;
use Illuminate\Validation\Rules\Enum;


class Create extends Component
{
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

    use WithFileUploads;
    public function save()
    {
        $rules = [
            'nama' => 'required|min:5|max:200|string',
            'email' => 'required|email|unique:users,email',
            'umur' => 'required|integer|min:1|max:100',
            'pekerjaan' => 'required|string|max:100',
            'alamat' => 'required|string|max:255',
            'no_telepon' => 'required|string|max:14|min:8',
            'jabatan' => ['required', new Enum(JabatanEnum::class)],
            'status' => ['required', new Enum(StatusAnggotaEnum::class)],
            'jenis_kelamin' => ['required', new Enum(JenisKelamin::class)],
            'foto' => 'nullable|image|max:4048',
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
            'foto.image' => 'Foto profil harus berupa gambar',
            'foto.max' => 'Foto profil maksimal 4MB',
            // Add other validation messages as needed
        ];
        $validated = $this->validate($rules, $messages);

        // Simpan file jika ada
        if ($this->foto) {
            $filename = $this->foto->store('', 'public');
            $validated['foto'] = '/uploads/' . $filename; // key harus cocok dengan nama field database
        }


        try {
            User::create($validated);

            flash()->success('Data anggota berhasil disimpan!');
        } catch (\Exception $e) {
            flash()->error('Data anggota gagal disimpan!');
            return;
        }

        // Alert::success('Data Tersimpan', 'Data anggota berhasil ditambahkan!');
        return redirect()->route('anggota.index');
    }
    public function render()
    {
        return view('livewire.anggota.create');
    }
}
