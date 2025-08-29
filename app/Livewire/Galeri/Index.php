<?php

namespace App\Livewire\Galeri;

use App\Models\Galery;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    public $perPage = 50;
    public $search = '';
    public $galeri_id;
    public $judul;
    public $keterangan;
    public $status;
    public $tanggal;

    use WithPagination;

    public function updatingSearch()
    {
        $this->resetPage(); // reset ke halaman 1 saat search berubah
    }

    public function delete()
    {
        if ($this->galeri_id != '') {
            $id = $this->galeri_id;
            Galery::findOrFail($id)->delete();
            flash()->success('foto berhasil dihapus');
        }
    }

    public function delete_confirmation($id)
    {
        if ($id != '') {
            $this->galeri_id = $id;
        }
    }
    public function render()
    {
        $query = Galery::where(function ($query) {
            $query->where('judul', 'like', '%' . $this->search . '%')
                ->orWhere('keterangan', 'like', '%' . $this->search . '%')
                ->orWhere('status', 'like', '%' . $this->search . '%')
                ->orWhere('tanggal', 'like', '%' . $this->search . '%');
        })->orderBy('status', 'asc'); // urutkan berdasarkan tanggal

        $total = $query->count(); // jumlah total hasil pencarian

        $items = $query->simplePaginate($this->perPage);

        // hitung current page, start dan end
        $currentPage = $items->currentPage();
        $count = $items->count(); // jumlah item di halaman ini
        // $count = count($items);
        $start = ($currentPage - 1) * $this->perPage + 1;
        $end = $start + $count - 1;

        return view('livewire.galeri.index', [
            'items' => $items,
            'start' => $start,
            'end' => $end,
            'total' => $total,
        ]);
    }
}
