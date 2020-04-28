<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class exam extends Model
{
    //Declaração de arquivos protegidos e não protegidos
    protected $table = 'exams';
    protected $fillable = [
       'scheduled_date',
       'performed_date',
       'description',
       'employee_id',
       'patients_id',
       'doctor_performer_id',
       'id_schedules_exam',
       'status',
   ];
}
