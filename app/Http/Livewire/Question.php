<?php

namespace App\Http\Livewire;

use App\Models\Agriculteurs;
use App\Models\Interventions;
use App\Models\Parcelles;
use Livewire\Component;
use Mockery\Matcher\Any;

class Question extends Component
{   private $question1;
    private $question2;
    private $question3;
    private $question4;
    private $question5;
    
    public function render()

    {
        $this->question1=Agriculteurs::all("agr_nom")->sortBy("agr_nom");
        $this->question2=Parcelles::where("par_superficie",">",500)->get();
        $this->question3=Parcelles::where("par_lieu","Arith","and")->whereBetween("par_superficie",[200,500])->get();
        $this->question4=Parcelles::join('agriculteurs', 'parcelles.agriculteur_id', '=', 'agriculteurs.id')->get(['parcelles.*','agriculteurs.agr_nom']);
        
        $from = date('2011-11-07');
        $to = date('2012-02-9');
        $this->question5=Interventions::whereBetween("int_debut",[$from,$to])->get();
       
        
        $this->question6=Interventions::join('parcelles', 'interventions.parcelle_id', '=', 'parcelles.id')->get(['parcelles.par_nom','interventions.*']);
        
        $this->question77=Interventions::join('employes', 'interventions.emp_nss', '=', 'employes.emp_nss')
        ->join('parcelles', 'interventions.parcelle_id', '=', 'parcelles.id')
        ->get(['employes.emp_nom','parcelles.par_nom','interventions.*']);
        

        $this->question8 = Interventions::join('employes', 'interventions.emp_nss', '=', 'employes.emp_nss')
        ->select('employes.emp_nom','interventions.*')->where("employes.emp_nom","Pernet")->get();
        
        $this->question9 = Parcelles::sum("par_superficie");
        
        $this->question10 =  Parcelles::select('par_nom')->orderBy('par_superficie', 'desc')->first();
        
        $this->question11 = Parcelles::select('par_nom')->orderBy('par_superficie', 'asc')->first();
        
        
        return view('userdash',['question1'=>$this->question1,
            'question2'=>$this->question2,
            'question3'=>$this->question3,
            'question4'=>$this->question4,
            'question5'=>$this->question5,
            'question6'=>$this->question6,
            'question77'=>$this->question77,
            'question8'=>$this->question8,
            'question9'=>$this->question9,
            'question10'=>$this->question10,
            'question11'=>$this->question11,
            ]);
    }
}