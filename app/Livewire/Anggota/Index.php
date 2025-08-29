<?php

namespace App\Livewire\Anggota;

use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Container\Attributes\Auth;

class Index extends Component
{

    public $perPage = 50;

    public $search = ''; // untuk pencarian

    public $anggota_id;

    use WithPagination;


    public function updatingSearch()
    {
        $this->resetPage(); // reset ke halaman 1 saat search berubah
    }

    public function delete()
    {
        if ($this->anggota_id != '') {
            $id = $this->anggota_id;
            User::findOrFail($id)->delete();
            flash()->success('Data Anggota berhasil dihapus');
        }
    }



    public function delete_confirmation($id)
    {
        if ($id != '') {
            $this->anggota_id = $id;
        }
    }

    public function render()
    {
        $query = User::where(function ($query) {
            $query->where('nama', 'like', '%' . $this->search . '%')
                ->orWhere('email', 'like', '%' . $this->search . '%')
                ->orWhere('status', 'like', '%' . $this->search . '%')
                ->orWhere('jabatan', 'like', '%' . $this->search . '%');
        })
            ->whereIn('jabatan', ['ketua', 'wakil ketua', 'sekretaris', 'bendahara', 'anggota']) // filter hanya jabatan tertentu
            ->orderByRaw("FIELD(jabatan, 'ketua', 'wakil ketua', 'sekretaris', 'bendahara', 'anggota')");

        $total = $query->count(); // jumlah total hasil pencarian

        $users = $query->simplePaginate($this->perPage);

        // hitung current page, start dan end
        $currentPage = $users->currentPage();
        $count = $users->count(); // jumlah item di halaman ini
        $start = ($currentPage - 1) * $this->perPage + 1;
        $end = $start + $count - 1;


        return view('livewire.anggota.index', [
            'users' => $users,
            'start' => $start,
            'end' => $end,
            'total' => $total,
        ]);
    }
}
