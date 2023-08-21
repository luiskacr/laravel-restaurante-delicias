<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FinishOrderRequest extends FormRequest
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
            "firstName" => 'required|max:75',
            "lastname" => 'required|max:75',
            "email" => 'required|max:50',
            "district" => 'required|not_in:0',
            "address1" => 'required|max:200',
            'cc-name' => 'required_if:credit,on',
            'cc-number' => 'required_if:credit,on',
            'cc-expiration' => 'required_if:credit,on',
            'cc-cvv' => 'required_if:credit,on',
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
            'firstName' => 'nombre',
            'lastname' => 'apellido',
            'email' => 'correo electronico',
            'district' => 'districto',
            'address1' => 'direccion',
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'cc-name.required_if' => 'El campo  tarjeta es obligatorio',
            'cc-number.required_if' => 'El campo número de tarjeta es obligatorio',
            'cc-expiration.required_if' => 'El campo caducidad es obligatorio',
            'cc-cvv.required_if' => 'El campo código de tarjeta es obligatorio',
        ];
    }
}
