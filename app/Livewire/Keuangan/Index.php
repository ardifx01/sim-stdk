<?php

namespace App\Livewire\Keuangan;

use App\Models\Cash;
use Livewire\Component;
use Livewire\WithPagination;


class Index extends Component
{
    use WithPagination;
    public $activity_id;
    public $user_id;
    public $pemasukan;
    public $pengeluaran;
    public $tanggal;
    public $search = '';
    public $perPage = 50;
    public $cash_id;

    public function delete()
    {
        if ($this->cash_id != '') {
            $id = $this->cash_id;
            Cash::findOrFail($id)->delete();
            flash()->success('Data keuangan berhasil dihapus');
        }
    }

    public function delete_confirmation($id)
    {
        if ($id != '') {
            $this->cash_id = $id;
        }
    }

    public function render()
    {
        // $query = Cash::where(function ($query) {
        //     $query->where('pemasukan', 'like', '%' . $this->search . '%')
        //         ->orWhere('pengeluaran', 'like', '%' . $this->search . '%')
        //         ->orWhere('tanggal', 'like', '%' . $this->search . '%');
        // });

        $query = Cash::where(function ($q) {
            $q->where('pemasukan', 'like', '%' . $this->search . '%')
                ->orWhere('pengeluaran', 'like', '%' . $this->search . '%')
                ->orWhere('tanggal', 'like', '%' . $this->search . '%')
                ->orWhereHas('activity', function ($sub) {
                    $sub->where('judul', 'like', '%' . $this->search . '%');
                });
        });

        // total hasil pencarian
        $total = $query->count();

        // hitung total pemasukan & pengeluaran hasil pencarian
        $totalPemasukan = $query->sum('pemasukan');
        $totalPengeluaran = $query->sum('pengeluaran');
        $totalSelisih = $totalPemasukan - $totalPengeluaran;

        // format rupiah
        $totalPemasukanFormatted = 'Rp ' . number_format($totalPemasukan, 0, ',', '.');
        $totalPengeluaranFormatted = 'Rp ' . number_format($totalPengeluaran, 0, ',', '.');
        $totalSelisihFormatted = 'Rp ' . number_format($totalSelisih, 0, ',', '.');

        // pagination
        $cashes = $query->simplePaginate($this->perPage);

        // hitung current page
        $currentPage = $cashes->currentPage();
        $count = $cashes->count();
        $start = ($currentPage - 1) * $this->perPage + 1;
        $end = $start + $count - 1;

        return view('livewire.keuangan.index', [
            'cashes' => $cashes,
            'start' => $start,
            'end' => $end,
            'total' => $total,
            'totalPemasukan' => $totalPemasukanFormatted,
            'totalPengeluaran' => $totalPengeluaranFormatted,
            'totalSelisih' => $totalSelisihFormatted,
        ]);
    }
}
