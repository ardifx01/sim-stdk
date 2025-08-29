<?php

namespace App\Livewire\Inventaris;

use App\Models\Inventories;
use Livewire\Component;


class Index extends Component
{
    public $barang;
    public $harga;
    public $jumlah;
    public $kondisi;
    public $perPage = 50;
    public $search = '';

    public $inventaris_id;

    public function delete()
    {
        if ($this->inventaris_id != '') {
            $id = $this->inventaris_id;
            Inventories::findOrFail($id)->delete();
            flash()->success('Data inventaris berhasil dihapus');
        }
    }



    public function delete_confirmation($id)
    {
        if ($id != '') {
            $this->inventaris_id = $id;
        }
    }


    public function render()
    {
        $query = Inventories::where(function ($query) {
            $query->where('barang', 'like', '%' . $this->search . '%')
                ->orWhere('harga', 'like', '%' . $this->search . '%')
                ->orWhere('jumlah', 'like', '%' . $this->search . '%')
                ->orWhere('kondisi', 'like', '%' . $this->search . '%');
        });

        $total = $query->count(); // jumlah total hasil pencarian

        $items = $query->simplePaginate($this->perPage);

        // hitung current page, start dan end
        $currentPage = $items->currentPage();
        $count = $items->count(); // jumlah item di halaman ini
        // $count = count($items);
        $start = ($currentPage - 1) * $this->perPage + 1;
        $end = $start + $count - 1;

        return view('livewire.inventaris.index', [
            'items' => $items,
            'start' => $start,
            'end' => $end,
            'total' => $total,
        ]);
    }
}
