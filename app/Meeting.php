<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Meeting extends Model
{
    //Declaração de arquivos protegidos e não protegidos
    protected $table = 'meeting';
    protected $fillable = [
        'title', 
        'description',
        'condition', 
        'priority', 
        'participants', 
        'solicitant',
        'room_id',
    ];

}
