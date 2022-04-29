<?php

namespace App\Http\Livewire\Dashboard\Admin;

use App\Models\User;
use Livewire\Component;

class Users extends Component
{
    public function render()
    {
        $users = User::get();
        return view('livewire.dashboard.admin.users', ['users' => $users])->layout('layouts.dashboard', ['title' => "Utilisateurs"]);
    }
}
