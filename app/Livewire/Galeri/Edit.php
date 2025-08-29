<?php

namespace App\Livewire\Galeri;

use App\Models\Galery;
use Livewire\Component;
use App\Enums\StatusEnum;
use App\Enums\TampilkanEnum;
use Livewire\WithFileUploads;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\File;
use Illuminate\Validation\Rules\Enum;

class Edit extends Component
{

    public $galeri_id;
    public $judul;
    public $keterangan;
    public $status;
    public $tanggal;
    public $foto;

    use WithFileUploads;
    public function mount($id)
    {
        $galeri = Galery::findOrFail($id);
        $this->galeri_id = $galeri->id;
        $this->judul = $galeri->judul;
        $this->keterangan = $galeri->keterangan;
        $this->status = $galeri->status;
        $this->tanggal = $galeri->tanggal;
    }


    public function updategaleri()
    {
        $rules = [
            'judul' => 'required|min:2|max:200|string',
            'keterangan' => 'nullable|string|max:500',
            'status' => ['required', new Enum(StatusEnum::class)],
            'tanggal' => 'required|date',
            'foto' => 'nullable|image|max:4048',
        ];
        $messages = [
            'judul.required' => 'Judul harus diisi',
            'judul.min' => 'Judul minimal 2 karakter',
            'judul.max' => 'Judul maksimal 200 karakter',
            'keterangan.string' => 'Keterangan harus berupa teks',
            'keterangan.max' => 'Keterangan maksimal 500 karakter',
            'status.required' => 'status harus diisi',
            'status.enum' => 'status harus berupa pilihan yang valid',
            'tanggal.required' => 'Tanggal harus diisi',
            'tanggal.date' => 'Tanggal tidak valid',
            'foto.image' => 'Foto harus berupa gambar',
            'foto.max' => 'Foto maksimal 4MB',
        ];

        $validated = $this->validate($rules, $messages);

        $galeri = Galery::findOrFail($this->galeri_id);

        if ($this->foto instanceof UploadedFile) {
            // Hapus foto lama jika ada
            if ($galeri->foto) {
                File::delete(public_path($galeri->foto));
            }

            // Simpan foto baru
            $filename = $this->foto->store('', 'public');
            $validated['foto'] = '/uploads/' . $filename;
        } else {
            unset($validated['foto']);
        }

        try {
            $galeri->update($validated);
            flash()->success('Data foto berhasil diupdate!');
        } catch (\Exception $e) {
            flash()->error('Data foto gagal diupdate!');
            return;
        }
        return redirect()->route('galeri.index');
    }

    public function render()
    {
        return view('livewire.galeri.edit');
    }
}
