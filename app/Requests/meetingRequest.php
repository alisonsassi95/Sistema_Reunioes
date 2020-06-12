<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MeetingRequest extends FormRequest
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

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'title' => 'required|min:3',
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'Preencha o campo Título do Evento!',
            'title.min' => 'Título do Evento necessita ter pelo menos 03 caracteres!',
           
        ];
    }

}
