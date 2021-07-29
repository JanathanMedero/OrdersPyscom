<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreOrderServiceOnSiteRequest extends FormRequest
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
            'iva_price'         => 'required',
            'net_price'         => 'required',
            'description'       => 'required',
            'date_of_service'   => 'required',
        ];
    }

    public function messages()
    {
        return[
            'name.required' => 'Ingrese el nombre del servicio',
            'quantity.required' => 'Ingrese la cantidad',
            'iva_price.required' => 'Ingrese el precio sin IVA',
            'net_price.required' => 'Ingrese el precio NETO',
            'description.required' => 'Ingrese una breve descripción',
            'date_of_service.required' => 'Ingrese la fecha de servicio',
        ];
    }
}
