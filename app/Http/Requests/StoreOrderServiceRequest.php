<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreOrderServiceRequest extends FormRequest
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
            'team'              => 'required',
            'brand'             => 'required',
            'features'          => 'required',
            'fault_report'      => 'required',
            'solicited_service' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'team.required'                 => 'Ingrese un equipo',
            'brand.required'                => 'Ingrese la marca o modelo del equipo',
            'features.required'             => 'Ingrese las características del equipo',
            'fault_report.required'         => 'Ingrese el reporte de falla',
            'solicited_service.required'    => 'Ingrese el servicio solicitado',
        ];
    }
}
