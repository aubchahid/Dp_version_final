<?php

namespace App\Http\Livewire\Auth;

use Livewire\Component;

class Register extends Component
{
    public function render()
    {
        return view('livewire.auth.login')->layout('layouts.app', ['title' => "Créer un compte"]);
    }
}
