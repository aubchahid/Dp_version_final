<?php

namespace App\Http\Livewire\Dashboard\Admin;

use App\Models\Car;
use App\Models\School;
use Livewire\Component;
use Livewire\WithFileUploads;

class Parkings extends Component
{
    use WithFileUploads;

    public $brand, $version, $kilometrage, $engine, $color, $matricule, $school, $photo;

    public function submit()
    {
        $car = new Car();
        $car->brand = $this->brand;
        $car->version = $this->version;
        $car->engine = $this->engine;
        $car->color = $this->color;
        $car->school_id = $this->school;
        $car->matricule = $this->matricule;
        $car->kilometrage = $this->kilometrage;
        if ($this->photo) {
            $name = $this->photo->getClientOriginalName();
            $name = time() . $name;
            $this->photo->storeAs('/img/car/', $name, ['disk' => 'public_uploads']);
            $car->photo = $name;
        }

        $car->save();

        $this->emit('success');
        $this->dispatchBrowserEvent('contentChanged', ['item' => __('lang.CandidatAdded')]);

        $this->brand = $this->version = $this->kilometrage = $this->engine = $this->color = $this->matricule = $this->school = $this->photo = "";
    }
    public function render()
    {
        $cars = Car::get();
        $schools = School::get();
        return view('livewire.dashboard.admin.parkings', ['cars' => $cars, 'schools' => $schools])->layout('layouts.dashboard', ['title' => 'Parkings']);
    }
}
