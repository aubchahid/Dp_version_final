<?php

namespace App\Http\Livewire\Dashboard\Admin;

use Livewire\Component;

class Seances extends Component
{
    public function render()
    {
        return view('livewire.dashboard.admin.seances')->layout('layouts.dashboard', ['title' => 'Seance']);
    }
}
