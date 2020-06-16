<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Participants extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'event_id', 
        'user_id'
    ];

}
