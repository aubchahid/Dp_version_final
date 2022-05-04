<?php

namespace App\Http\Livewire\Dashboard\Admin;

use App\Models\Candidat;
use App\Models\School;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;
use Livewire\WithFileUploads;

class Candidats extends Component
{
    use WithFileUploads;

    public $email, $fullname, $phoneNo, $school, $birthdate, $sexe, $cni, $cniRecto, $cniVerso, $contrat, $certifcat, $tarif, $paid;

    public $idCandidat;

    public $loadingEdit = true;

    public function submit()
    {
        $user = new User();
        $user->name =  $this->fullname;
        $user->email =  $this->email;
        $user->password = Hash::make('123456789');
        $user->role = "ROLE_CANDIDAT";
        $user->save();

        $candidat = new Candidat();
        $candidat->user_id = $user->id;
        $candidat->school_id = $this->school;
        $candidat->phoneNo = $this->phoneNo;
        $candidat->birthdate = $this->birthdate;
        $candidat->sexe = $this->sexe;
        $candidat->cni = $this->cni;
        if ($this->cniRecto) {
            $name = $this->cniRecto->getClientOriginalName();
            $name = time() . $name;
            $this->cniRecto->storeAs('/img/candidat/', $name, ['disk' => 'public_uploads']);
            $candidat->cniRecto = $name;
        }
        if ($this->cniVerso) {
            $name = $this->cniVerso->getClientOriginalName();
            $name = time() . $name;
            $this->cniVerso->storeAs('/img/candidat/', $name, ['disk' => 'public_uploads']);
            $candidat->cniVerso = $name;
        }
        if ($this->contrat) {
            $name = $this->contrat->getClientOriginalName();
            $name = time() . $name;
            $this->contrat->storeAs('/img/candidat/', $name, ['disk' => 'public_uploads']);
            $candidat->contrat = $name;
        }
        if ($this->certifcat) {
            $name = $this->certifcat->getClientOriginalName();
            $name = time() . $name;
            $this->certifcat->storeAs('/img/candidat/', $name, ['disk' => 'public_uploads']);
            $candidat->certificat = $name;
        }

        $candidat->tarifs = $this->tarif;
        $candidat->paid = $this->paid;
        $candidat->save();

        //* Send Email To Candidat And AutoEcole

        $this->emit('success');
        $this->dispatchBrowserEvent('contentChanged', ['item' => __('lang.CandidatAdded')]);

        $this->fullname = $this->email = $this->phoneNo = $this->birthdate = $this->cni = $this->sexe = $this->tarif = $this->paid = $this->school = $this->certifcat = $this->contrat = $this->cniVerso = $this->cniRecto = "";
    }

    public function setEdit($id)
    {
        $candidat = Candidat::find($id);
        $this->idCandidat = $candidat->id;
        $this->email = $candidat->user->email;
        $this->fullname = $candidat->user->name;
        $this->phoneNo = $candidat->phoneNo;
        $this->birthdate = $candidat->birthdate;
        $this->sexe = $candidat->sexe;
        $this->school = $candidat->school_id;
        $this->cni = $candidat->cni;
        $this->tarif = $candidat->tarifs;
        $this->paid = $candidat->paid;
    }

    public function edit()
    {
        $candidat = Candidat::find($this->idCandidat);
        $candidat->phoneNo = $this->phoneNo;
        $candidat->birthdate = $this->birthdate;
        $candidat->sexe = $this->sexe;
        $candidat->school_id = $this->school;
        $candidat->cni = $this->cni;
        $candidat->save();

        $this->emit('success');
        $this->dispatchBrowserEvent('contentChanged', ['item' => __('lang.UpdatedInfoCandidate')]);
    }

    public function deleteCandidat()
    {
        $candidat = Candidat::find($this->idCandidat);
        User::find($candidat->user_id)->delete();
        $candidat->delete();
        $this->emit('success');
        $this->dispatchBrowserEvent('contentChanged', ['item' => __('lang.CandidatDeletedSuccessfully')]);
    }

    public function render()
    {
        $candidates = Candidat::get();
        $schools = School::get();
        return view('livewire.dashboard.admin.candidats', ['candidates' => $candidates, "schools" => $schools])->layout('layouts.dashboard', ['title' => 'Candidats']);
    }
}
