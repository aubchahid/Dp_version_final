<?php

namespace App\Http\Livewire\Auth;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Login extends Component
{
    public $message;

    public $email, $password;

    protected $rules = [
        'email' => 'required|email',
        'password' => 'required',
    ];

    public function submit(Request $request)
    {
        $this->validate();

        $user = User::where('email', $this->email)->first();
        if ($user) {
            $credentials = [
                'email' => strtolower($this->email),
                'password' => $this->password,
            ];
            if (Auth::attempt($credentials, true)) {
                $request->session()->regenerate();
                return redirect('/');
            } else {
                $this->addError('error', 'Veuillez vérifier l\'email et le mot de passe et réessayer.');
            }
        } else {
            $this->addError('error', "Il n'y a pas d'utilisateur avec cet email");
        }
    }

    public function render()
    {
        return view('livewire.auth.login')->layout('layouts.app', ['title' => "S'identifier"]);
    }
}
