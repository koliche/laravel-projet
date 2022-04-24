<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tarifs extends Model
{
    use HasFactory;
    protected $fillable = [
        'tar_description',
        'tar_euro',
    ];
}
