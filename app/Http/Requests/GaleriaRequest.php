<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\Galeria;

class GaleriaRequest extends FormRequest
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
            'fecha'       =>  'required|date_format:"m/d/Y',
            'imagen_1'    =>  'required|image|mimes:png,jpg,jpeg,gif,bmp',
            'imagen_2'    =>  'required|image|mimes:png,jpg,jpeg,gif,bmp'
        ];
    }

    public function messages()
    {
        return [
            'fecha.required' => 'fecha debe ser ingresado',
            'fecha.date_format' => 'fecha debe ser el formato correcto',
            'imagen_1.required' => 'imagen_1 debe ser seleccionada',
            'imagen_2.required' => 'imagen_1 debe ser seleccionada'
            // ..
        ];
    }
}