<?php

namespace App\Livewire\Anggota;

use App\Models\User;
use Livewire\Component;
use App\Enums\StatusEnum;
use App\Enums\JabatanEnum;
use App\Enums\JenisKelamin;
use Livewire\WithFileUploads;
use App\Enums\StatusAnggotaEnum;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\File;
use Illuminate\Validation\Rules\Enum;

class Edit extends Component
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

    public $currentFoto; // preview gambar lama

    public $id;

    use WithFileUploads;

    public function mount($id)
    {
        $user = User::findOrFail($id);
        $this->id = $id;
        $this->nama = $user->nama;
        $this->email = $user->email;
        $this->umur = $user->umur;
        $this->pekerjaan = $user->pekerjaan;
        $this->alamat = $user->alamat;
        $this->no_telepon = $user->no_telepon;
        $this->jabatan = $user->jabatan;
        $this->status = $user->status;
        $this->jenis_kelamin = $user->jenis_kelamin;
        // $this->foto = $user->foto;
    }

    public function updateanggota()
    {
        $rules = [
            'nama' => 'required|min:5|max:200|string',
            'email' => 'required|email|unique:users,email,' . $this->id,
            'umur' => 'required|integer|min:1|max:100',
            'pekerjaan' => 'required|string|max:100',
            'alamat' => 'required|string|max:255',
            'no_telepon' => 'required|string|max:14|min:8',
            'jabatan' => ['required', new Enum(JabatanEnum::class)],
            'status' => ['required', new Enum(StatusAnggotaEnum::class)],
            'jenis_kelamin' => ['required', new Enum(JenisKelamin::class)],
            'foto' => 'nullable|image|mimes:png,jpg,jpeg|max:4048',
        ];
        $messages = [
            'nama.required' => 'Nama lengkap harus diisi',
            'nama.min' => 'Nama lengkap minimal 5 karakter',
            'email.required' => 'Email harus diisi',
            'email.email' => 'Email tidak valid',
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
            // Add other validation messages as needed
        ];
        $validated = $this->validate($rules, $messages);

        $user = User::findOrFail($this->id);

        if ($this->foto instanceof UploadedFile) {
            // Hapus foto lama jika ada
            if ($user->foto) {
                File::delete(public_path($user->foto));
            }

            // Simpan foto baru
            $filename = $this->foto->store('', 'public');
            $validated['foto'] = '/uploads/' . $filename;
        } else {
            unset($validated['foto']);
        }

        try {
            $user->update($validated);
            flash()->success('Data anggota berhasil diupdate!');
        } catch (\Throwable $th) {
            flash()->error('Data anggota gagal diupdate!');
            return;
        }

        return redirect()->route('anggota.index');
    }
    public function render()
    {
        return view('livewire.anggota.edit');
    }
}
