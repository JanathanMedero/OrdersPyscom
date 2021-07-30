<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateServiceOnSite extends FormRequest
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
            'name'              => 'required',
            'quantity'          => 'required',
            'net_price'         => 'required',
            'description'       => 'required',
        ];
    }

    public function messages()
    {
        return[
            'name.required' => 'Ingrese el nombre del servicio',
            'quantity.required' => 'Ingrese la cantidad',
            'net_price.required' => 'Ingrese el precio total del servicio',
            'description.required' => 'Ingrese la descripción del servicio'
        ];
    }
}
