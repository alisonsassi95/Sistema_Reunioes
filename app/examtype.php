<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class examtype extends Model
{
    //Declaração de arquivos protegidos e não protegidos
    protected $table = 'examtypes';
    protected $fillable = [
       'name',
       'description',
       'class'
   ];
}
