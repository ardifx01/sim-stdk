<?php

namespace App\Livewire\Keuangan;

use App\Models\Cash;
use Livewire\Component;
use App\Models\Activities;


class Edit extends Component
{
    public $activity_id;
    public $kegiatanList = [];
    public $user_id;
    public $pemasukan;
    public $pengeluaran;
    public $tanggal;
    public $search = '';
    public $perPage = 50;
    public $cash_id;

    public function mount($id)
    {
        $cash = Cash::findOrFail($id);
        $this->activity_id = $cash->activity_id;
        $this->kegiatanList = $cash->kegiatanList;
        $this->user_id = $cash->user_id;
        $this->pemasukan = $cash->pemasukan;
        $this->pengeluaran = $cash->pengeluaran;
        $this->tanggal = $cash->tanggal;
        $this->cash_id = $cash->id;

        $this->kegiatanList = Activities::select('id', 'judul')->get();
    }

    public function updatekeuangan()
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
        $cash = Cash::findOrFail($this->cash_id);
        try {
            $cash->update($validated);
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
        return view('livewire.keuangan.edit');
    }
}
