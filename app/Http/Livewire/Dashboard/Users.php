<?php

namespace App\Http\Livewire\Dashboard;

use Livewire\Component;
use App\Models\User;

class Users extends Component
{




    public function render()
    {
        $user = User::paginate(8);

        return view('livewire.dashboard.admin.users',['user' => $user])->layout('layouts.dashboard', ['title' => "Users"]);
    }
}
