<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreClientRequest extends FormRequest
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
            'name'          => 'required',
            'phone'         => 'required',
            'street'        => 'required',
            'suburb'        => 'required',
            'number'        => 'required',
            'postal_code'   => 'required',
        ];
    }

    public function messages()
    {
        return
        [
            'name.required'         => 'Ingrese el nombre del cliente',
            'phone.required'        => 'Ingrese el número de teléfono del cliente',
            'street.required'       => 'Ingrese la calle donde vive el cliente',
            'suburb.required'       => 'Ingrese la colonia del cliente',
            'number.required'       => 'Ingrese el número de casa del cliente',
            'postal_code.required'  => 'Ingrese el código postal del cliente',
        ];
    }
}
