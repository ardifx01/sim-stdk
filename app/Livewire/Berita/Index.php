<?php

namespace App\Livewire\Berita;

use App\Models\News;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{

    public $id;
    public $user_id;
    public $berita_id;
    public $judul;
    public $keterangan;
    public $foto;
    public $search = '';
    public $perPage = 50; // jumlah item per halaman
    public $status;

    use WithPagination;

    public function updatingSearch()
    {
        $this->resetPage(); // reset ke halaman 1 saat search berubah
    }

    public function delete()
    {
        if ($this->berita_id != '') {
            $id = $this->berita_id;
            News::findOrFail($id)->delete();
            flash()->success('Berita berhasil dihapus');
        }
    }

    public function delete_confirmation($id)
    {
        if ($id != '') {
            $this->berita_id = $id;
        }
    }

    public function render()
    {

        $query = News::where(function ($query) {
            $query->where('judul', 'like', '%' . $this->search . '%')
                ->orWhere('keterangan', 'like', '%' . $this->search . '%')
                ->orWhere('status', 'like', '%' . $this->search . '%')
                ->orWhere('tanggal', 'like', '%' . $this->search . '%');
        })->orderBy('status', 'asc'); // urutkan status

        $total = $query->count(); // jumlah total hasil pencarian

        $items = $query->simplePaginate($this->perPage);

        // hitung current page, start dan end
        $currentPage = $items->currentPage();
        $count = $items->count(); // jumlah item di halaman ini
        // $count = count($items);
        $start = ($currentPage - 1) * $this->perPage + 1;
        $end = $start + $count - 1;

        return view('livewire.berita.index', [
            'items' => $items,
            'start' => $start,
            'end' => $end,
            'total' => $total,
        ]);
    }
}
