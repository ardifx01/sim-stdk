<?php

namespace App\Livewire\Absensi;

use App\Enums\statusAbsensi;
use App\Models\User;
use Livewire\Component;
use App\Models\Attendances;
use Illuminate\Support\Facades\Log;

class Index extends Component
{
    public $selected_users = [];
    public $activity_id = 1;
    public $tanggal;
    public $status;

    public function save()
    {
        foreach ($this->selected_users as $userId => $checked) {
            if ($checked) {
                $user = User::find($userId);
                if ($user) {
                    // tambah absensi di activity
                    Attendances::create([
                        'user_id' => $user->id,
                        'activity_id' => "1",
                        'status' => statusAbsensi::Hadir,
                    ]);
                }
            }
        }
        session()->flash('message', 'Absensi berhasil disimpan.');
    }

    public function render()
    {
        $users = User::All();
        return view('livewire.absensi.index', [
            'users' => $users
        ]);
    }
}
