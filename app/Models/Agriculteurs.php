<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Parcelle;

class Agriculteurs extends Model
{
    use HasFactory;
    protected $fillable=[
        'agr_nom',
        'agr_prn',
        'agr_resid',
    ];
    public function parcelle(){
        return $this->belongsTo(Parcelle::class);
    }
}
