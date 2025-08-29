<?php

namespace App\Livewire\Kegiatan;

use App\Models\Activities;
use Livewire\Component;
use App\Enums\StatusKegiatanEnum;
use Illuminate\Validation\Rules\Enum;
use Livewire\WithFileUploads;

class Create extends Component
{
    public $judul;
    public $status;
    public $tanggal;
    public $keterangan;
    public $foto;

    use WithFileUploads;

    public function save()
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
            'foto.image' => 'Foto profil harus berupa gambar',
            'foto.max' => 'Foto profil maksimal 4MB',
        ];
        $validated = $this->validate($rules, $messages);

        if ($this->foto) {
            $filename = $this->foto->store('', 'public');
            $validated['foto'] = '/uploads/' . $filename; // key harus cocok dengan nama field database
        }

        try {
            $activity = Activities::create($validated);
            // Inventories::create($validated);
            $this->dispatch('postCreated', $activity->id);
            flash()->success('Data kegiatan berhasil disimpan!');
        } catch (\Exception $e) {
            flash()->error('Data kegiatan gagal disimpan!');
            return;
        }

        redirect()->route('kegiatan.index');
    }



    public function render()
    {
        return view('livewire.kegiatan.create');
    }
}
