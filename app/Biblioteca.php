<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Biblioteca extends Model
{
      protected $fillable = 
    [
     'nombreBiblioteca',
     'ciudad', 
     'numeroTelefonico',
    ];
}
