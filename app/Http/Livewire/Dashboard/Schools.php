<?php

namespace App\Http\Livewire\Dashboard;

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

    public $email, $fullname, $phoneNo, $schoolName, $address, $city;


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

    public function render()
    {
        $schools = School::where('name', 'like', '%' . $this->search . '%')->paginate(10);
        return view('livewire.dashboard.admin.schools', ['schools' => $schools])->layout('layouts.dashboard', ['title' => "Auto-écoles"]);
    }
}
