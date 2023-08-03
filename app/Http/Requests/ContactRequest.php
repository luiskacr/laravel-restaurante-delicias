<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContactRequest extends FormRequest
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
            'name' => 'required|max:50',
            'email' => 'required|max:50',
            'telephone' => 'required|max:20',
            'message' => 'max:250',
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
            'name' => 'nombre',
            'email' => 'email',
            'telephone' => 'telefono',
            'message' => 'mensaje',
        ];
    }
}
