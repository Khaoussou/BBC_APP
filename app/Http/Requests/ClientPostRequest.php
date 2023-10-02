<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ClientPostRequest extends FormRequest
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
            "nom_complet" => "required",
            "adresse" => "sometimes",
            "telephone" => "required|unique:clients|regex:/(7[70568]{1})(\\d{7})$/"
        ];
    }
    public function messages()
    {
        return [
            "nom_complet.required" => "Le nom est obligatoire !",
            "adresse.somtimes" => "L'adresse est requis !",
            "telephone.required" => "Le téléphone est resuis !",
            "telephone.unique" => "Ce numéro de téléphone existe deja !",
            "telephone.regex" => "Le format du téléphone est incorrect !"
        ];
    }
}
