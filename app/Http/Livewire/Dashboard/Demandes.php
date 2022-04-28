<?php

namespace App\Http\Livewire\Dashboard;

use App\Models\Inscription;
use App\Models\School;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;
use Livewire\WithPagination;

class Demandes extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';


    public $email, $fullname, $phoneNo, $schoolName, $address, $city, $status;

    public $idInscription, $search = '';

    public function setValueToModal($id)
    {
        $ins = Inscription::find($id);
        $this->email = $ins->email;
        $this->fullname = $ins->fullname;
        $this->phoneNo = $ins->phoneNo;
        $this->schoolName = $ins->schoolName;
        $this->address = $ins->address;
        $this->city = $ins->city;
        $this->idInscription = $ins->id;
        $this->status = $ins->status;
    }

    public function acceptRequest()
    {
        $ins = Inscription::find($this->idInscription);
        $user = new User();
        $user->name =  $ins->fullname;
        $user->email =  $ins->email;
        $user->password = Hash::make('123456789');
        $user->role = "ROLE_SCHOOL";
        $user->save();

        $school = new School();
        $school->name = $ins->schoolName;
        $school->phoneNo = $ins->phoneNo;
        $school->address = $ins->address;
        $school->city = $ins->city;
        $school->user_id = $user->id;
        $school->save();

        // *TO-DO Send a message to the user with a password

        $ins->status = 1;
        $ins->save();
        $this->emit('success');
        $this->dispatchBrowserEvent('contentChanged', ['item' => __('lang.AddedSuccessfully')]);
    }

    public function refuseRequest()
    {
        $ins = Inscription::find($this->idInscription);
        $ins->status = 100;
        $ins->save();
        $this->emit('success');
        $this->dispatchBrowserEvent('contentChanged', ['item' => __('lang.RefusedSuccessfully')]);
    }

    public function render()
    {
        $inscription = Inscription::where('status', '=', 0)->where('fullname', 'like', '%' . $this->search . '%')->orWhere('schoolName', 'like', '%' . $this->search . '%')->orderBy('created_at', 'desc')->paginate(8);
        $inscriptionInHold = Inscription::where('status', '=', 0)->get();
        $inscriptionRefused =  Inscription::where('status', '=', 100)->get();
        return view('livewire.dashboard.admin.demandes', ['inscriptions' => $inscription, 'inscriptionInHold' => $inscriptionInHold, 'inscriptionRefused' => $inscriptionRefused])->layout('layouts.dashboard', ['title' => "Demandes d'inscriptions"]);
    }
}
