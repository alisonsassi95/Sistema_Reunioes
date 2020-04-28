<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class exam_image extends Model
{
    //Declaração de arquivos protegidos e não protegidos
    protected $table = 'exam_images';
    protected $fillable = [
       'exam_id',
       'imagem',
       'Data',
   ];
}
