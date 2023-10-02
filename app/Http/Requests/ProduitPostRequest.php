<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProduitPostRequest extends FormRequest
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
            "libelle" => "required",
            "description" => "sometimes",
            "prix_unitaire" => "required|min:0",
            "prix_promo" => "sometimes|min:0",
            "quantite" => "required|min:0",
            "image" => "sometimes"
        ];
    }

    public function messages()
    {
        return [
            "libelle.required" => "Le libelle est requis !",
            "description.sometimes" => "La description est requise !",
            "prix_unitaire.required" => "Le prix_unitaire est requis !",
            "prix_unitaire.min" => "Le prix_unitaire doit etre positif !",
            "prix_promo.sometimes" => "Le prix_promo est requis !",
            "prix_promo.min" => "Le prix_promo doit etre positif !",
            "quantite.required" => "La quantite est requise !",
            "quantite.min" => "La quantite doit etre positive !",
            "image.sometimes" => "L'image doit est requis !",
        ];
    }
}
