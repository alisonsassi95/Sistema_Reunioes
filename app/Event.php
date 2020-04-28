<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    //Declaração de arquivos protegidos e não protegidos
    protected $fillable = [
        'event_name','start_date','end_date'
        //fillable for fullcalendar
    ];
}
