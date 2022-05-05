<?php

namespace App\Http\Livewire\Dashboard\Admin;

use App\Models\Moniteur;
use App\Models\School;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;
use Livewire\WithFileUploads;

class Moniteurs extends Component
{
    use WithFileUploads;

    public $email, $fullname, $phoneNo, $school, $birthdate, $sexe, $cni, $cniRecto, $cniVerso, $numeroCarteMoniteur, $carteMoniteur, $tarif, $paid;

    public $idMoniteur;

    public function submit()
    {
        $user = new User();
        $user->name =  $this->fullname;
        $user->email =  ucfirst($this->email);
        $user->password = Hash::make('123456789');
        $user->role = "ROLE_COACH";
        $user->save();

        $moniteur = new Moniteur();
        $moniteur->phoneNo = $this->phoneNo;
        $moniteur->school_id = $this->school;
        $moniteur->user_id = $user->id;
        $moniteur->birthdate = $this->birthdate;
        $moniteur->sexe = $this->sexe;
        $moniteur->cni = $this->cni;

        if ($this->cniRecto) {
            $name = $this->cniRecto->getClientOriginalName();
            $name = time() . $name;
            $this->cniRecto->storeAs('/img/moniteur/', $name, ['disk' => 'public_uploads']);
            $moniteur->cniRecto = $name;
        }
        if ($this->cniVerso) {
            $name = $this->cniVerso->getClientOriginalName();
            $name = time() . $name;
            $this->cniVerso->storeAs('/img/moniteur/', $name, ['disk' => 'public_uploads']);
            $moniteur->cniVerso = $name;
        }
        if ($this->carteMoniteur) {
            $name = $this->carteMoniteur->getClientOriginalName();
            $name = time() . $name;
            $this->cniVerso->storeAs('/img/moniteur/', $name, ['disk' => 'public_uploads']);
            $moniteur->carteMoniteur = $name;
        }
        $moniteur->numeroCarteMoniteur = $this->numeroCarteMoniteur;
        $moniteur->save();

        $this->emit('success');
        $this->dispatchBrowserEvent('contentChanged', ['item' => __('lang.CoachAddedSuccessfully')]);

        $this->email = $this->fullname = $this->phoneNo = $this->school = $this->birthdate = $this->sexe = $this->cni = $this->cniRecto = $this->cniVerso = $this->numeroCarteMoniteur = $this->carteMoniteur = $this->tarif = $this->paid = "";
    }

    public function deleteMoniteur()
    {
        $moniteur = Moniteur::find($this->idMoniteur);
        User::find($moniteur->user_id)->delete();
        $this->emit('success');
        $this->dispatchBrowserEvent('contentChanged', ['item' => __('lang.CoachDeleteSuccessfully')]);
    }
    public function render()
    {
        $moniteurs = Moniteur::get();
        $schools = School::get();
        return view('livewire.dashboard.admin.moniteurs', ['moniteurs' => $moniteurs, 'schools' => $schools])->layout('layouts.dashboard', ['title' => "Moniteurs"]);
    }
}
