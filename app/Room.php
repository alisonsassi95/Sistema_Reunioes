<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    //Declaração de arquivos protegidos e não protegidos
    protected $table = 'room';
    protected $fillable = [
        'name',
        'location',
        'number',
        'capacity',
        'description',
        'active',
    ];

}
