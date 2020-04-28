<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class People extends Model
{
    //Declaração de arquivos protegidos e não protegidos
    protected $table = 'peoples';
     protected $fillable = [
        'name',
        'birthdate',
        'genre',
        'telephone',
        'email',
        'profile',
        'sector'
    ];

    /*public function telephone(){
        return $this->hasMany('App\Telefone');
    }

    public function addTelephone(Telephone $tel){
        return $this->telephone()->save($tel);
    }

    public function deleteTelephone()
    {
        foreach($this->telephone as $tel){
            $tel->delete();
        }
        return true;
    }*/
}
