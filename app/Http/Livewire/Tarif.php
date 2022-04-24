<?php

namespace App\Http\Livewire;

use App\Models\Tarifs;
use Livewire\Component;

class Tarif extends Component
{
    public $tarifs, $tar_euro, $tar_description;
    public $updateMode = false;

    public function render()
    {
        $this->tarifs =Tarifs::all();
        return view('livewire.tarif');
    }

    private function resetInputFields(){
        $this->tar_description = '';
        $this->tar_euro = '';
    }

    public function store()
    {
        $validatedDate = $this->validate([
            'tar_description' => 'required',
            'tar_euro' => 'required',
        ]);

        Tarifs::create($validatedDate);

        session()->flash('message', 'Tarif Created Successfully.');

        $this->resetInputFields();

    }



    public function edit($id)
    {
        $this->updateMode = true;
        $tar = Tarifs::where('tar_description',$id)->first();
        $this->tar_euro = $tar->tar_euro;

    }

    public function cancel()
    {
        $this->updateMode = false;
        $this->resetInputFields();


    }

    public function update()
    {
        $validatedDate = $this->validate([
            'tar_description' => 'required',
            'tar_euro' => 'required',
        ]);

        if ($this->tar_description) {
            $tar = Tarifs::find($this->tar_description);
            $tar->update([
                'tar_description' => $this->tar_description,
                'tar_euro' => $this->tar_euro,
            ]);
            $this->updateMode = false;
            session()->flash('message', 'Tarif Updated Successfully.');
            $this->resetInputFields();

        }
    }

    public function delete($id)
    {
        if($id){
            Tarifs::find($id)->delete();
            session()->flash('message', 'Tarif Deleted Successfully.');
        }
    }
}
