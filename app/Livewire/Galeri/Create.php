<?php

namespace App\Livewire\Galeri;

use Livewire\Component;
use App\Enums\StatusEnum;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rules\Enum;

class Create extends Component
{
    public $galeri_id;
    public $judul;
    public $keterangan;
    public $status;
    public $tanggal;
    public $foto;

    use WithFileUploads;

    public function save()
    {
        $rules = [
            'judul' => 'required|min:2|max:200|string',
            'keterangan' => 'nullable|string|max:500',
            'status' => ['required', new Enum(StatusEnum::class)],
            'tanggal' => 'required|date',
            'foto' => 'required|image|max:4048',
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
            'foto.required' => 'Foto harus diisi',
            'foto.image' => 'Foto harus berupa gambar',
            'foto.max' => 'Foto maksimal 4MB',
        ];
        $validated = $this->validate($rules, $messages);

        if ($this->foto) {
            $filename = $this->foto->store('', 'public');
            $validated['foto'] = '/uploads/' . $filename; // key harus cocok dengan nama field database
        }

        try {
            $galeri = Auth::user()->galeries()->create($validated);
            $this->dispatch('postCreated', $galeri->id);
            flash()->success('Foto berhasil disimpan!');
        } catch (\Exception $e) {
            flash()->error('Foto gagal disimpan!');
            return;
        }

        return redirect()->route('galeri.index');
    }
    public function render()
    {
        return view('livewire.galeri.create');
    }
}
