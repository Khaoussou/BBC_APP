<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MarquePostRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            "libelle" => "required|unique:marques",
            "numero" => "required|unique:marques|min:0"
        ];
    }
    
    public function messages()
    {
        return [
            "libelle.required" => "Le libelle est obligatoire !",
            "libelle.unique" => "Ce libelle existe deja !",
            "numero.required" => "Le numero est obligatoire !",
            "numero.min" => "Le numero doit etre positif !",
            "numero.unique" => "Ce numero existe deja !",
        ];
    }
}
