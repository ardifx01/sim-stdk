<?php

namespace App\Livewire\Kegiatan;

use App\Models\Activities;
use Livewire\Component;

class Index extends Component
{
    public $judul;
    public $tanggal;
    public $keterangan;
    public $status;
    public $perPage = 50;
    public $search = '';
    public $kegiatan_id;

    public function delete()
    {
        if ($this->kegiatan_id != '') {
            $id = $this->kegiatan_id;
            Activities::findOrFail($id)->delete();
            flash()->success('Data kegiatan berhasil dihapus');
        }
    }

    public function delete_confirmation($id)
    {
        if ($id != '') {
            $this->kegiatan_id = $id;
        }
    }

    public function render()
    {
        $query = Activities::where(function ($query) {
            $query->where('judul', 'like', '%' . $this->search . '%')
                ->orWhere('tanggal', 'like', '%' . $this->search . '%')
                ->orWhere('status', 'like', '%' . $this->search . '%');
        });

        $total = $query->count(); // jumlah total hasil pencarian

        $activities = $query->simplePaginate($this->perPage);

        // hitung current page, start dan end
        $currentPage = $activities->currentPage();
        $count = $activities->count(); // jumlah item di halaman ini
        // $count = count($activities);
        $start = ($currentPage - 1) * $this->perPage + 1;
        $end = $start + $count - 1;
        return view('livewire.kegiatan.index', [
            'activities' => $activities,
            'start' => $start,
            'end' => $end,
            'total' => $total,
        ]);
    }
}
