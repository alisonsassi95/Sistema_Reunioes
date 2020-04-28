<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class profile extends Model
{
    //Declaração de arquivos protegidos e não protegidos
    protected $table = 'profiles';
     protected $fillable = [
        'name',
        'description'
    ];
}
