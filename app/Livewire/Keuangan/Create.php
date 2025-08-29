<?php

namespace App\Livewire\Keuangan;

use App\Models\Activities;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class Create extends Component
{
    public $activity_id;
    public $kegiatanList;
    public $user_id;
    public $pemasukan;
    public $pengeluaran;
    public $tanggal;
    public $search = '';
    public $perPage = 50;
    public $cash_id;

    public function mount()
    {
        $this->kegiatanList = Activities::select('id', 'judul')
            ->where('status', 'belum selesai')
            ->orderBy('created_at', 'desc')
            ->get();
    }

    public function save()
    {
        $rules = [
            'activity_id' => 'required|exists:activities,id',
            'pemasukan' => 'required|numeric',
            'pengeluaran' => 'required|numeric',
            'tanggal' => 'required|date',
        ];

        $messages = [
            'activity_id.required' => 'activity harus diisi',
            'activity_id.exists' => 'Kegiatan tidak ditemukan',
            'pemasukan.required' => 'Pemasukan harus diisi',
            'pemasukan.numeric' => 'Pemasukan harus berupa angka',
            'pengeluaran.required' => 'Pengeluaran harus diisi',
            'pengeluaran.numeric' => 'Pengeluaran harus berupa angka',
            'tanggal.required' => 'Tanggal harus diisi',
            'tanggal.date' => 'Tanggal tidak valid',
        ];

        $validated = $this->validate($rules, $messages);

        // if ($this->foto) {
        //     $filename = $this->foto->store('', 'public');
        //     $validated['foto'] = '/uploads/' . $filename; // key harus cocok dengan nama field database
        // }

        try {
            $cash = Auth::user()->cashes()->create($validated);
            $this->dispatch('postCreated', $cash->id);
            flash()->success('Data berhasil disimpan!');
        } catch (\Exception $e) {
            flash()->error('Data gagal disimpan!');
            return;
        }

        return redirect()->route('keuangan.index');
    }

    public function render()
    {
        return view('livewire.keuangan.create');
    }
}
