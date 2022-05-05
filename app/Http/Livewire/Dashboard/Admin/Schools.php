<?php

namespace App\Http\Livewire\Dashboard\Admin;

use App\Models\School;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;
use Livewire\WithPagination;

class Schools extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';
    public $idInscription, $search = '';

    public $email, $fullname, $phoneNo, $schoolName, $address, $city, $id_sc;
    
    public function addSchool()
    {
        $user = new User();
        $user->name =  $this->fullname;
        $user->email =  $this->email;
        $user->password = Hash::make('123456789');
        $user->role = "ROLE_SCHOOL";
        $user->save();

        $school = new School();
        $school->name = $this->schoolName;
        $school->phoneNo = $this->phoneNo;
        $school->address = $this->address;
        $school->city = $this->city;
        $school->user_id = $user->id;
        $school->save();

        // *TO-DO Send a message to the user with a password

        $this->emit('success');
        $this->dispatchBrowserEvent('contentChanged', ['item' => __('lang.SchoolAdded')]);
    }
    public function deleteSchool($id){
        School::where('id', $id)->delete();
        $this->emit('success');
        $this->dispatchBrowserEvent('contentChanged', ['item' => __('lang.SchoolDeleted')]);
    }

    public function editSchool($id){
        $school_up = School::find($id);
        $this->id_sc=$id;
        $this->schoolName = $school_up->name;
        $this->phoneNo = $school_up->phoneNo;
        $this->address = $school_up->address;
        $this->city = $school_up->city;
    }

    public function updateSchool()
    {
        $this->validate([
            'schoolName' => 'required',
            'phoneNo' => 'required',
            'address' => 'required',
            'city' => 'required',
         
        ]);

        School::where('id', $this->id_sc)->update([
            'name' => $this->schoolName,
            'phoneNo' => $this->phoneNo,
            'address' => $this->address,
            'city' => $this->city,
            
        ]);

        $this->emit('success');
        $this->dispatchBrowserEvent('contentChanged', ['item' => __('lang.SchoolUpdated')]);
    }

    public function render()
    {
        $schools = School::where('name', 'like', '%' . $this->search . '%')->paginate(10);
        
        return view('livewire.dashboard.admin.schools', ['schools' => $schools])->layout('layouts.dashboard', ['title' => "Auto-écoles"]);
    }
}
