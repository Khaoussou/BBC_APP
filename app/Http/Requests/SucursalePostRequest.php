<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SucursalePostRequest extends FormRequest
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
            "nom" => "required",
            "telephone" => "required|unique:succursales|regex:/^(7[76508]{1})(\\d{7})$/",
            "adresse" => "required",
            "reduction" => "sometimes|min:0"
        ];
    }
    public function messages()
    {
        return [
            "nom.required" => "Le nom est requis !",
            "telephone.required" => "Le telephone est requis !",
            "telephone.unique" => "Le telephone doit etre unique !",
            "telephone.regex" => "Le format du telephone est incorrect !",
            "adresse.required" => "L'adresse est requis !",
            "reduction.sometimes" => "La reduction ne diot pas etre négative !"
        ];
    }
}
