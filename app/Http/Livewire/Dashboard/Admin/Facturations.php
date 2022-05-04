<?php

namespace App\Http\Livewire\Dashboard\Admin;

use App\Models\Facturation;
use App\Models\User;
use Livewire\Component;

class Facturations extends Component
{
    public $search = '';
    public $type, $fullname, $montant, $payé, $reste, $id_f;

    public function addFacturation(){

        $facture = new Facturation();
        $facture->user_id =  $this->fullname;
        $facture->type = $this->type;
        $facture->montant = $this->montant;
        $facture->payé = $this->payé;
        $facture->reste = $this->reste;
        $facture->save();

        $this->emit('success');
        $this->dispatchBrowserEvent('contentChanged', ['item' => __('lang.FactureAdded')]);
    }

    public function editFacturation($id){
        $this->id_f = $id;
        $factures = Facturation::find($id);
        $this->fullname = $factures->user_id;
        $this->type = $factures->type;
        $this->montant = $factures->montant;
        $this->payé = $factures->payé;
        $this->reste = $factures->reste;
    }

    public function updateFacturation(){
        $this->validate([
            'fullname' => 'required',
            'type' => 'required',
            'montant' => 'required',
            'payé' => 'required',
            'reste' => 'required'
        ]);
        Facturation::where('id', $this->id_f)->update([
            'user_id' => $this->fullname,
            'type' => $this->type,
            'montant' => $this->montant,
            'payé' => $this->payé,
            'reste' => $this->reste
        ]);

        $this->emit('success');
        $this->dispatchBrowserEvent('contentChanged', ['item' => __('lang.FactureUpdated')]);
    }

    public function deleteFacturation($id)
    {
        Facturation::where('id', $id)->delete();
        $this->dispatchBrowserEvent('contentChanged', ['item' => __('lang.Facturedeleted')]);
    }

    public function render()
    {
        $users = User::all();
        $factures = Facturation::where('type', 'like', '%' . $this->search . '%')->paginate(10);
        $factureSchool = Facturation::where('type','Auto école');
        $factureCandidat = Facturation::where('type','Candidat');
        $factureMoniteur = Facturation::where('type', 'Moniteur');
        
        return view('livewire.dashboard.admin.facturations', ['factures' => $factures, 'users' => $users, 'factureSchool' => $factureSchool, 'factureMoniteur' => $factureMoniteur, 'factureCandidat' => $factureCandidat])->layout('layouts.dashboard', ['title' => "Facturation"]);
    }
}
