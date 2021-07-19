<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreOrderSaleRequest extends FormRequest
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
            'quantity'          => 'required',
            'unit_price'        => 'required',
            'net_price'         => 'required',
            'description'       => 'required',
            'date_of_sale'     => 'required',
        ];
    }

    public function messages()
    {
        return [
            'quantity.required'         => 'Ingrese la cantidad',
            'unit_price.required'       => 'Ingrese el precio unitario',
            'net_price.required'        => 'Ingrese el precio NETO',
            'description.required'      => 'Ingrese una descripción del producto',
            'date_of_sale.required'    => 'Ingrese la fecha en que se recibio la orden',

        ];
    }

}
