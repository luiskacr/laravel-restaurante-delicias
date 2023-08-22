<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SurveyRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name'=> 'required',
            'birthday'=> 'required|date',
            'email'=> 'required|email',
            'clean'=> 'required',
            'place'=> 'required',
            'waitress'=> 'required',
            'recommendation'=> 'required',
        ];
    }

    /**
     * Set Values Display Name
     *
     * @return array
     */
    public function attributes()
    {
        return [
            'name' => 'nombre y apellido',
            'birthday' => 'fecha de nacimiento',
            'email' => 'correo electronico',
            'clean' => 'limpieza de los baños',
            'place' => 'limpieza del salon',
            'waitress' => 'servicios de meseros',
            'recommendation' => 'recomendacion',
        ];
    }
}
