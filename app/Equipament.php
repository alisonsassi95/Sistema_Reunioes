<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Equipament extends Model
{
    //Declaração de arquivos protegidos e não protegidos
    protected $table = 'equipaments';
    protected $fillable = [
        'name',
        'active',
        'description',
    ];

}
