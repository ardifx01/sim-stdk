<?php

namespace App\Livewire\Berita;

use Livewire\Component;
use App\Enums\StatusEnum;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rules\Enum;

class Create extends Component
{
    public $berita_id;
    public $user_id;
    public $judul;
    public $keterangan;
    public $foto;
    public $status;
    public $tanggal;


    use WithFileUploads;


    public function save()
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

        if ($this->foto) {
            $filename = $this->foto->store('', 'public');
            $validated['foto'] = '/uploads/' . $filename; // key harus cocok dengan nama field database
        }


        try {
            $berita = Auth::user()->news()->create($validated);
            $this->dispatch('postCreated', $berita->id);
            flash()->success('Berita berhasil disimpan!');
        } catch (\Exception $e) {
            flash()->error('Berita gagal disimpan!');
            return;
        }

        return redirect()->route('galeri.index');
    }

    public function render()
    {
        return view('livewire.berita.create');
    }
}
