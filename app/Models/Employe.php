<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employe extends Model
{
    use HasFactory;
    protected $fillable = [
        'emp_nss',
        'emp_nom',
        'emp_prn',
    ];
    public function tarifs(){
        return $this->hasMany(tarifs::class);
    }
    public function parcelles(){
        return $this->belongsTo(parcelles::class)->using(interventions::class);
    }
}

