<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
    //Declaração de arquivos protegidos e não protegidos
    protected $fillable = [
        'title',
        'start_date',
        'end_date',
        'note',
        'doctor_requests_id',
        'patients_id',
        'equipament_id',
        'convenant',
    ];
}
