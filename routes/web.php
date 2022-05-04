<?php

use App\Http\Livewire\Dashboard\Admin\DetailsSchool;
use App\Http\Livewire\Auth\Login;
use App\Http\Livewire\Auth\Register;
use App\Http\Livewire\Dashboard\Admin\Candidats;
use App\Http\Livewire\Dashboard\Admin\Users;
use App\Http\Livewire\Dashboard\Admin\Demandes;
use App\Http\Livewire\Dashboard\Admin\DetailsCandidat;
use App\Http\Livewire\Dashboard\Admin\Index;
use App\Http\Livewire\Dashboard\Admin\Moniteurs;
use App\Http\Livewire\Dashboard\Admin\Parkings;
use App\Http\Livewire\Dashboard\Admin\Schools;
use App\Http\Livewire\Dashboard\Admin\Seances;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


//Route::any('/login', LoginPage::class)->name('login');
Route::any('/login', Login::class)->name('login');
Route::any('/register', Register::class)->name('register');
Route::any('/logout', function (Request $request) {
    Auth::logout();
    $request->session()->invalidate();
    $request->session()->regenerateToken();
    return redirect('/login');
});



Route::middleware(['auth'])->group(function () {
    Route::any('/', Index::class)->name('index');
    Route::any('/demandes', Demandes::class)->name('demandes');
    Route::any('/schools', Schools::class)->name('schools');
    Route::any('/details-school/{id}', DetailsSchool::class);
    Route::any('/candidats', Candidats::class);
    Route::any('/details-candidat/{id}', DetailsCandidat::class);
    Route::any('/users', Users::class);
    Route::any('/parkings', Parkings::class);
    Route::any('/moniteurs', Moniteurs::class);
    Route::any('/seances', Seances::class);
});
