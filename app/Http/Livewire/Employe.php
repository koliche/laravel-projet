<?php

namespace App\Http\Livewire;
use App\Models\Employes;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class Employe extends Component
{
    public $emps, $tarif, $emp_nss, $emp_nom, $emp_prn, $emp_tarif;
    public $updateMode = false;
    public function render()
    {
        $this->emps = Employes::all();
        $this->tarif = DB::table('tarifs')->get();
        return view('livewire.employe');
    }
    private function resetInputFields(){
        $this->emp_nss = '';
        $this->emp_nom = '';
        $this->emp_prn = '';
        $this->emp_tarif = '';
    }

    public function store()
    {
        $validatedDate = $this->validate([
            'emp_nss' => 'required',
            'emp_nom' => 'required',
            'emp_prn' => 'required',
            'emp_tarif' => 'required'
        ]);

        Employes::create($validatedDate);

        session()->flash('message', 'Employe Created Successfully.');

        $this->resetInputFields();

    }

    public function edit($id)
    {
        $this->updateMode = true;
        $Emp = Employes::where('emp_nss',$id)->first();;
        $this->emp_nss = $id;
        $this->emp_nom = $Emp->emp_nom;
        $this->emp_prn = $Emp->emp_prn;
        $this->emp_tarif = $Emp->emp_tarif;


    }

    public function cancel()
    {
        $this->updateMode = false;
        $this->resetInputFields();


    }

    public function update()
    {
        $validatedDate = $this->validate([
            'emp_nss' => 'required',
            'emp_nom' => 'required',
            'emp_prn' => 'required',
            'emp_tarif' => 'required'
        ]);

        if ($this->emp_nss) {
            $emp = Employes::find($this->emp_nss);
            $emp->update([
                'emp_nom' => $this->emp_nom,
                'emp_prn' => $this->emp_prn,
                'emp_tarif' => $this->emp_tarif
            ]);
            $this->updateMode = false;
            session()->flash('message', 'Employe Updated Successfully.');
            $this->resetInputFields();

        }
    }

    public function delete($id)
    {
        if($id){
            Employes::find($id)->delete();
            session()->flash('message', 'Employe Deleted Successfully.');
        }
    }
}
