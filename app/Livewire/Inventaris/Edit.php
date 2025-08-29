<?php

namespace App\Livewire\Inventaris;

use Livewire\Component;
use App\Enums\KondisiEnum;
use App\Models\Inventories;
use Livewire\WithFileUploads;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Validation\Rules\Enum;

class Edit extends Component
{
    public $id;
    public $barang;
    public $harga;

    public $jumlah; // Assuming you want to validate quantity
    public $kondisi;
    public $foto;

    use WithFileUploads;
    public function mount($id)
    {
        $inventory = Inventories::findOrFail($id);
        $this->id = $id;
        $this->barang = $inventory->barang;
        $this->harga = $inventory->harga;
        $this->jumlah = $inventory->jumlah;
        $this->kondisi = $inventory->kondisi;
    }

    public function updateinventory()
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

        $inventory = Inventories::findOrFail($this->id);

        if ($this->foto instanceof UploadedFile) {
            // Hapus foto lama jika ada
            if ($inventory->foto) {
                File::delete(public_path($inventory->foto));
            }

            // Simpan foto baru
            $filename = $this->foto->store('', 'public');
            $validated['foto'] = '/uploads/' . $filename;
        } else {
            unset($validated['foto']);
        }

        try {
            $inventory->update($validated);
            // Inventories::create($validated);
            flash()->success('Data barang berhasil disimpan!');
        } catch (\Exception $e) {
            flash()->error('Data barang gagal disimpan!');
            return;
        }
        return redirect()->route('inventaris.index');

        // $inventory->save();
    }


    public function render()
    {
        return view('livewire.inventaris.edit');
    }
}
