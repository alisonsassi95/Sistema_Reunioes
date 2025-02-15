<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class FastEvent extends Model
{
    use SoftDeletes;
    protected $table = 'fast_events';
    protected $fillable = [
        'title',
        'start', 
        'end', 
        'color',
        'room',
        'description'
    ];
}
