<?php

namespace App\Livewire\Kegiatan;

use App\Models\Activities;
use Livewire\Component;

class Show extends Component
{
    public $id;
    public function render()
    {
        $activity = Activities::findOrFail($this->id);
        return view('livewire.kegiatan.show', [
            'activity' => $activity,
        ]);
    }
}
