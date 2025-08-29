<?php

namespace App\Livewire\Berita;

use App\Models\News;
use Livewire\Component;
use App\Enums\StatusEnum;
use Livewire\WithFileUploads;
use Illuminate\Validation\Rules\Enum;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\File;

class Edit extends Component
{
    public $berita_id;
    public $user_id;
    public $judul;
    public $keterangan;
    public $foto;
    public $status;
    public $tanggal;

    use WithFileUploads;

    public function mount($id)
    {
        $berita = News::findOrFail($id);
        $this->berita_id = $berita->id;
        $this->user_id = $berita->user_id;
        $this->judul = $berita->judul;
        $this->keterangan = $berita->keterangan;
        $this->status = $berita->status;
        $this->tanggal = $berita->tanggal;
    }

    public function updateberita()
    {
        $rules = [
            'judul' => 'required|min:2|max:200|string',
            'keterangan' => 'nullable|string|min:10',
            'status' => ['required', new Enum(StatusEnum::class)],
            'tanggal' => 'required|date',
            'foto' => 'nullable|image|max:4048',
        ];
        $messages = [
            'judul.required' => 'Judul harus diisi',
            'judul.min' => 'Judul minimal 2 karakter',
            'judul.max' => 'Judul maksimal 200 karakter',
            'keterangan.string' => 'Keterangan harus berupa teks',
            'keterangan.min' => 'Keterangan minimal 10 karakter',
            'status.required' => 'Status harus diisi',
            'status.enum' => 'Status harus berupa pilihan yang valid',
            'tanggal.required' => 'Tanggal harus diisi',
            'tanggal.date' => 'Tanggal tidak valid',
            'foto.image' => 'Foto harus berupa gambar',
            'foto.max' => 'Foto maksimal 4MB',
        ];
        $validated = $this->validate($rules, $messages);

        $berita = News::findOrFail($this->berita_id);

        if ($this->foto instanceof UploadedFile) {
            // Hapus foto lama jika ada
            if ($berita->foto) {
                File::delete(public_path($berita->foto));
            }

            // Simpan foto baru
            $filename = $this->foto->store('', 'public');
            $validated['foto'] = '/uploads/' . $filename;
        } else {
            unset($validated['foto']);
        }

        try {
            $berita->update($validated);
            flash()->success('Data berita berhasil diupdate!');
        } catch (\Exception $e) {
            flash()->error('Data berita gagal diupdate!');
            return;
        }
        return redirect()->route('berita.index');
    }

    public function render()
    {
        return view('livewire.berita.edit');
    }
}
