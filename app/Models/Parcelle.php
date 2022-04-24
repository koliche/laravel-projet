<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Parcelle extends Model
{
    use HasFactory;
    protected $fillable = [
        'par_nom',
        'par_lieu',
        'par_superficie',
    ];

    public function emploiyes(){
        $this->hasMany(emploiyes::class)->using(Interventions::class);
    }
    public function agriculteurs(){
        $this->hasMany(agriculteurs::class);
    }
}
