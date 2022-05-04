<?php

namespace App\Http\Livewire\Dashboard\Admin;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class Users extends Component
{
    public $name, $email, $role, $id_u;
    public $search = '';

    public function addUser()
    {
        $users = new User();
        $users->name =  $this->name;
        $users->email = $this->email;
        $users->password = Hash::make('123456789');
        $users->role = $this->role;
        $users->save();
        $this->emit('success');
        $this->dispatchBrowserEvent('contentChanged', ['item' => __('lang.UserAdded')]);
    }

    public function editUser($id)
    {
        $this->id_u = $id;
        $users = User::find($id);
        $this->name = $users->name;
        $this->email = $users->email;
        $this->role = $users->role;
    }

    public function updateUser()
    {
        $this->validate([
            'name' => 'required',
            'email' => 'required',
            'role' => 'required'
        ]);
        User::where('id', $this->id_u)->update([
            'name' => $this->name,
            'email' => $this->email,
            'role' => $this->role
        ]);

        $this->emit('success');
        $this->dispatchBrowserEvent('contentChanged', ['item' => __('lang.UserUpdated')]);
    }

    public function deleteUser($id)
    {
        User::where('id', $id)->delete();
        $this->dispatchBrowserEvent('contentChanged', ['item' => __('lang.Userdeleted')]);
    }

    public function render()
    {
        $users = User::where('name', 'like', '%' . $this->search . '%')->orWhere('role', 'like', '%' . $this->search . '%')->paginate(10);
        $AdminUser = User::where('role','ROLE_ADMIN');
        $SchoolUser = User::where('role', 'ROLE_SCHOOL');
        $CandidatUser = User::where('role', 'ROLE_CANDIDAT');
        return view('livewire.dashboard.admin.users', ['users' => $users, 'AdminUser' => $AdminUser, 'SchoolUser' => $SchoolUser, 'CandidatUser' => $CandidatUser])->layout('layouts.dashboard', ['title' => "Utilisateurs"]);
    }

}
