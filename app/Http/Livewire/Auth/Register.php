<?php

namespace App\Http\Livewire\Auth;

use App\Models\Inscription;
use Livewire\Component;

class Register extends Component
{
    public $email, $fullname, $phoneNo, $schoolName, $address, $city;


    protected $rules = [
        'fullname' => 'required|min:6',
        'email' => 'required|email',
        'phoneNo' => 'required|min:10',
        'city' => 'required',
        'schoolName' => 'required',
        'address' => 'required',
    ];

    public function register()
    {
        $this->validate();

        $inscription = new Inscription();
        $inscription->email = ucfirst($this->email);
        $inscription->fullname = $this->fullname;
        $inscription->phoneNo = $this->phoneNo;
        $inscription->city = $this->city;
        $inscription->schoolName = $this->schoolName;
        $inscription->address = $this->address;
        $inscription->save();

        $this->dispatchBrowserEvent('contentChanged', ['item' => __('lang.SentSuccessfully')]);
        redirect('/login');
    }

    public function render()
    {
        return view('livewire.auth.register')->layout('layouts.app', ['title' => "Créer un compte"]);
    }
}
