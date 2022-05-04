<?php

namespace App\Http\Livewire\Dashboard\Admin;

use App\Models\Candidat;
use Livewire\Component;

class DetailsCandidat extends Component
{
    public $candidat;
    public function mount($id)
    {
        $this->candidat = Candidat::find($id);
    }
    public function render()
    {
        return view('livewire.dashboard.admin.details-candidat', ['candidat' => $this->candidat])->layout('layouts.dashboard', ['title' => $this->candidat->user->name]);
    }
}
