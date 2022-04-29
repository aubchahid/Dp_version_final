<?php

namespace App\Http\Livewire\Dashboard\Admin;

use App\Models\School;
use Livewire\Component;

class DetailsSchool extends Component
{
    public $school;

    public function mount($id)
    {
        $this->school = School::find($id);
    }
    public function render()
    {
        return view('livewire.dashboard.admin.details-school', ['school' => $this->school])->layout('layouts.dashboard', ['title' => $this->school->name]);
    }
}
