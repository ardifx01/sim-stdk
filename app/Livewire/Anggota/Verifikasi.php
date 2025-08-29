<?php

namespace App\Livewire\Anggota;

use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class Verifikasi extends Component
{
    public $view = 'index'; // kontrol tampilan
    public $perPage = 50;
    public $search = ''; // untuk pencarian
    public $selectedUser;   // data user yang dipilih

    public $nama, $email, $jabatan, $status;

    public  $anggota_id;

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
            flash()->success('Data tamu berhasil dihapus');
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
            ->whereIn('jabatan', ['tamu']) // filter hanya jabatan tertentu
            ->orderByRaw("FIELD(jabatan,'tamu')");
        $total = $query->count(); // jumlah total hasil pencarian

        $users = $query->simplePaginate($this->perPage);

        // hitung current page, start dan end
        $currentPage = $users->currentPage();
        $count = $users->count(); // jumlah item di halaman ini
        $start = ($currentPage - 1) * $this->perPage + 1;
        $end = $start + $count - 1;

        return view('livewire.anggota.verifikasi', [
            'users' => $users,
            'start' => $start,
            'end' => $end,
            'total' => $total,
        ]);
    }
}
