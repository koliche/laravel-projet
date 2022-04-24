<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        if(Auth::user()->hasRole('user')){
             return view('userdash');
        }elseif(Auth::user()->hasRole('editor')){
             return view('editordash');
        }elseif(Auth::user()->hasRole('admin')){
         return view('dashboard');
    }
    }

    public function agriculteur()
   {
    return view('livewire.agriculteur');
   }
   public function parcelle()
   {
    return view('livewire.parcelle');
   }
   public function employe()
   {
    return view('livewire.employe');
   }
   public function tarif()
   {
    return view('livewire.tarif');
   }
   public function intervention()
   {
    return view('livewire.intervention');
   }
}
