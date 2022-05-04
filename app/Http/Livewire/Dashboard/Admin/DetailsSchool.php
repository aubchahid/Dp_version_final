<?php

namespace App\Http\Livewire\Dashboard\Admin;

use App\Models\Feedback;
use App\Models\School;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class DetailsSchool extends Component
{
    public $school, $feedback, $limiter = 2;

    public $content;



    public function mount($id)
    {
        $this->school = School::find($id);
    }

    public function loadMore()
    {
        $this->limiter = $this->limiter + 2;
    }

    public function submitFeedback()
    {
        $feedback = new Feedback();
        $feedback->content = $this->content;
        $feedback->user_id = Auth::id();
        $feedback->school_id = $this->school->id;
        $feedback->save();

        $this->content = "";
    }
    public function render()
    {
        $this->feedback = Feedback::where('school_id', '=', $this->school->id)->orderBy('created_at', 'DESC')->get();

        return view('livewire.dashboard.admin.details-school', ['school' => $this->school, 'feedback' => $this->feedback])->layout('layouts.dashboard', ['title' => $this->school->name]);
    }
}
