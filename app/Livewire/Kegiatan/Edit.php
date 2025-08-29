<?php

namespace App\Livewire\Kegiatan;

use Livewire\Component;
use App\Models\Activities;
use Livewire\WithFileUploads;
use App\Enums\StatusKegiatanEnum;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\File;
use Illuminate\Validation\Rules\Enum;

class Edit extends Component
{

    public $judul;
    public $status;
    public $tanggal;
    public $keterangan;
    public $foto;

    public $id;

    use WithFileUploads;
    public function mount($id)
    {
        $activity = Activities::find($id);
        $this->judul = $activity->judul;
        $this->status = $activity->status;
        $this->tanggal = $activity->tanggal;
        $this->keterangan = $activity->keterangan;
    }

    public function updatekegiatan()
    {
        $rules = [
            'judul' => 'required|min:6|max:200|string',
            'tanggal' => 'required|date',
            'keterangan' => 'nullable|required|min:10|max:100000',
            'status' => ['required', new Enum(StatusKegiatanEnum::class)],
            'foto' => 'nullable|image|max:4048',
        ];
        $messages = [
            'judul.required' => 'Judul harus diisi',
            'judul.min' => 'Judul minimal 6 karakter',
            'judul.max' => 'Judul maksimal 200 karakter',
            'tanggal.required' => 'Tanggal harus diisi',
            'tanggal.date' => 'Tanggal tidak valid',
            'keterangan.required' => 'Keterangan harus diisi',
            'keterangan.min' => 'Keterangan minimal 10 karakter',
            'keterangan.max' => 'Keterangan maksimal 100000 karakter',
            'status.required' => 'Status harus diisi',
            'status.enum' => 'Status tidak valid',
            'foto.image' => 'Foto profil harus berupa gambar',
            'foto.max' => 'Foto profil maksimal 4MB',
        ];
        $validated = $this->validate($rules, $messages);

        $activity = Activities::findOrFail($this->id);

        if ($this->foto instanceof UploadedFile) {
            // Hapus foto lama jika ada
            if ($activity->foto) {
                File::delete(public_path($activity->foto));
            }

            // Simpan foto baru
            $filename = $this->foto->store('', 'public');
            $validated['foto'] = '/uploads/' . $filename;
        } else {
            unset($validated['foto']);
        }

        try {
            $activity->update($validated);
            flash()->success('Data kegiatan berhasil diupdate!');
        } catch (\Exception $e) {
            flash()->error('Data kegiatan gagal diupdate!');
            return;
        }
        return redirect()->route('kegiatan.index');
    }
    public function render()
    {
        return view('livewire.kegiatan.edit');
    }
}
