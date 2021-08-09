<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreEmployee extends FormRequest
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
            'name' => 'required',
            'email' => 'required|unique:users',
            'password' => 'required'
        ];
    }

    public function messages()
    {
        return[
            'name.required'     => 'Ingrese el nombre del empleado',
            'email.required'    => 'Ingrese el correo electrónico del empleado',
            'email.unique'      => 'El correo electrónico ya esta en uso',
            'password.required' => 'Ingrese una contraseña'
        ];
    }
}
