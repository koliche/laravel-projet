<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Validator;
use App\Models\Agriculteurs;
use Illuminate\Http\Request;

class Agriculteur extends Component
{
    public $agrs, $agr_nom, $agr_prn, $agr_id, $agr_resid;
    public $updateMode = false;

    public function render()
    {
        $this->agrs =Agriculteurs::all();
        return view('livewire.agriculteur');
    }
    private function resetInputFields(){
        $this->agr_nom = '';
        $this->agr_prn = '';
        $this->agr_resid = '';
    }

    public function store()
    {
        $validatedDate = $this->validate([
            'agr_nom' => 'required',
            'agr_prn' => 'required',
            'agr_resid' => 'required',
        ]);

        Agriculteurs::create($validatedDate);

        session()->flash('message', 'Users Created Successfully.');

        $this->resetInputFields();

    }

    public function edit($id)
    {
        $this->updateMode = true;
        $agr = Agriculteurs::where('id',$id)->first();
        $this->agr_id = $id;
        $this->agr_nom = $agr->agr_nom;
        $this->agr_prn = $agr->agr_prn;
        $this->agr_resid = $agr->agr_resid;

    }

    public function cancel()
    {
        $this->updateMode = false;
        $this->resetInputFields();


    }

    public function update()
    {
        $validatedDate = $this->validate([
            'agr_nom' => 'required',
            'agr_prn' => 'required',
            'agr_resid' => 'required',
        ]);

        if ($this->agr_id) {
            $agr = Agriculteurs::find($this->agr_id);
            $agr->update([
                'agr_nom' => $this->agr_nom,
                'agr_prn' => $this->agr_prn,
                'agr_resid' => $this->agr_resid,
            ]);
            $this->updateMode = false;
            session()->flash('message', 'Users Updated Successfully.');
            $this->resetInputFields();

        }
    }

    public function delete($id)
    {
        if($id){
            Agriculteurs::where('id',$id)->delete();
            session()->flash('message', 'Users Deleted Successfully.');
        }
    }
}
