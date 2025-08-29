<?php

namespace App\Livewire\Inventaris;

use Livewire\Component;
use App\Enums\KondisiEnum;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rules\Enum;


class Create extends Component
{
    public $barang;
    public $harga;
    public $kondisi;
    public $jumlah; // Assuming you want to add a quantity field
    public $foto;

    use WithFileUploads;


    public function save()
    {

        $rules = [
            'barang' => 'required|min:2|max:200|string',
            'harga' => 'required|integer',
            'jumlah' => 'required|integer|min:1', // Assuming you want to validate quantity
            'kondisi' => ['required', new Enum(KondisiEnum::class)],
            'foto' => 'nullable|image|max:4048',
        ];
        $messages = [
            'barang.required' => 'Nama barang harus diisi',
            'barang.min' => 'Nama barang minimal 2 karakter',
            'harga.required' => 'Harga barang harus diisi',
            'harga.integer' => 'Harga barang harus berupa angka',
            'jumlah.required' => 'Jumlah barang harus diisi',
            'jumlah.integer' => 'Jumlah barang harus berupa angka',
            'jumlah.min' => 'Jumlah barang minimal 1',
            'foto.image' => 'Foto profil harus berupa gambar',
            'foto.max' => 'Foto profil maksimal 4MB',
        ];

        $validated = $this->validate($rules, $messages);

        if ($this->foto) {
            $filename = $this->foto->store('', 'public');
            $validated['foto'] = '/uploads/' . $filename; // key harus cocok dengan nama field database
        }

        try {
            $inventory = Auth::user()->inventories()->create($validated);
            // Inventories::create($validated);
            $this->dispatch('postCreated', $inventory->id);
            flash()->success('Data barang berhasil disimpan!');
        } catch (\Exception $e) {
            flash()->error('Data barang gagal disimpan!');
            return;
        }

        return redirect()->route('inventaris.index');
    }

    public function render()
    {
        return view('livewire.inventaris.create');
    }
}
