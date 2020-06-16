<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Meeting extends Model
{
    //Declaração de arquivos protegidos e não protegidos
    protected $table = 'meeting';
    
    protected $fillable = [
        'title', 
        'start', 
        'end', 
        'color', 
        'description', 
        'condition', 
        'priority', 
        'participants', 
        'room_id', 
        'requester_id'
    ];

}
