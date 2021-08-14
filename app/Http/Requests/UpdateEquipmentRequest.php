<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateEquipmentRequest extends FormRequest
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
            'technical_report'  => 'required',
            'price'             => 'required',
        ];
    }

    public function messages()
    {
        return [
            'technical_report.required' => 'Ingrese el reporte del técnico',
            'price.required'            => 'Ingrese el precio a cobrar',
        ];
    }
}
