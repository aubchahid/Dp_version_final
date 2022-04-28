<?php

namespace App\Http\Livewire\Dashboard;

use App\Models\School;
use Livewire\Component;
use Livewire\WithPagination;

class Schools extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';
    public $idInscription, $search = '';


    public function render()
    {
        $schools = School::where('name', 'like', '%' . $this->search . '%')->get();
        return view('livewire.dashboard.admin.schools', ['schools' => $schools])->layout('layouts.dashboard', ['title' => "Auto-écoles"]);
    }
}
