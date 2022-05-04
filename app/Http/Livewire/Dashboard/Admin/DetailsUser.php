<?php

namespace App\Http\Livewire\Dashboard\Admin;

use Livewire\Component;
use App\Models\User;


class DetailsUser extends Component
{
    public $user;

    public function mount($id)
    {
        $this->user = User::find($id);
    }
    public function render()
    {
        return view('livewire.dashboard.admin.details-user', ['user' => $this->user])->layout('layouts.dashboard', ['title' => "Utilisateur"]);
    }
}
