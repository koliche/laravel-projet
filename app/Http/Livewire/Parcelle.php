<?php

namespace App\Http\Livewire;

use App\Models\Parcelles;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class Parcelle extends Component
{
    public $isOpen = 0;
    public $parcelle, $agr, $par_id, $par_lieu, $par_nom, $par_superficie, $agriculteur_id;
    public function render()
    {
        $this->parcelle = Parcelles::all();
        $this->agr = DB::table('agriculteurs')->get();
        return view('livewire.parcelle');
    }

    public function create()
    {
        $this->resetInputFields();
        $this->openModal();
    }

    public function openModal()
    {
        $this->isOpen = true;
    }

    public function closeModal()
    {
        $this->isOpen = false;
    }

    public function cancel()
    {
        $this->isOpen = false;
        $this->resetInputFields();
    }

    private function resetInputFields()
    {
        $this->par_lieu = '';
        $this->par_nom = '';
        $this->par_superficie = '';
        $this->agriculteur_id = '';
    }

    public function store()
    {
        $this->validate([
            'par_lieu' => 'required',
            'par_nom' => 'required',
            'par_superficie' => 'required',
            'agriculteur_id' => 'required'
        ]);

        Parcelles::updateOrCreate(['par_lieu' => $this->par_lieu, 'par_nom' => $this->par_nom, 'par_superficie' => $this->par_superficie, 'agriculteur_id' => $this->agriculteur_id]);
        session()->flash(
            'message',
            $this->par_id ? 'Agr Updated Successfully.' : 'Agr Created Successfully.'
        );

        $this->closeModal();
        $this->resetInputFields();
    }

    public function edit($id)
    {
        $Agri = Parcelles::findOrFail($id);
        $this->par_id = $id;
        $this->par_lieu = $Agri->par_lieu;
        $this->par_superficie = $Agri->par_superficie;
        $this->par_nom = $Agri->par_nom;
        $this->agriculteur_id = $Agri->agriculteur_id;

        $this->openModal();
    }

    public function update()
    {
        $this->validate([
            'par_lieu' => 'required',
            'par_nom' => 'required',
            'par_superficie' => 'required',
            'agriculteur_id' => 'required'
        ]);

        Parcelles::find($this->par_id)->update([
            'par_lieu' => $this->par_lieu,
            'par_nom' => $this->par_nom,
            'par_superficie' => $this->par_superficie,
            'agriculteur_id' => $this->agriculteur_id
        ]);
        $this->closeModal();
        session()->flash('message', 'Parcelle Updated Successfully.');
        $this->resetInputFields();
    }
    public function delete($id)
    {
        if ($id) {
            Parcelles::find($id)->delete();
            session()->flash('message', 'Post Deleted Successfully.');
        }
    }
}
