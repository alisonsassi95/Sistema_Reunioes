<?php

namespace App\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LaudoRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    public function messages(){

        return[
            'name.diagnostic'=>'Deve-se Preencher o Laudo',
            'patients_id.diagnostic'=>'Precisa Selecionar um Paciente',
            'doctor_performer_id'=>'Precisa Selecionar um Médico'
           
        ];
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'exam_id'=>'required',
            'patients_id'=>'required',
            'doctor_performer_id'=>'required',
            'status'=>'required',
            'diagnostic'=>'required',            
        ];
    }
}
