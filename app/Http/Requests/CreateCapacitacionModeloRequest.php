<?php

namespace App\Http\Requests;

use App\Models\CapacitacionModelo;
use Illuminate\Foundation\Http\FormRequest;

class CreateCapacitacionModeloRequest extends FormRequest
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
        return CapacitacionModelo::$rules;
    }

    public function messages()
    {
        return CapacitacionModelo::$messages;
    }
}
