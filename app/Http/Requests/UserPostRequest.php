<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserPostRequest extends FormRequest
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
            "name" => "required",
            "email" => "required|email|unique:users",
            "password" => "required|min:4|same:password_confirmation",
            "telephone" => "required|unique:users|regex:/^(7[76508]{1})(\\d{7})$/",
            "role" => "required"
        ];
    }
    public function messages()
    {
        return [
            "name.required" => "Le nom est obligatoire !",
            "email.required" => "L'adresse est requis !",
            "email.email" => "Le format de l'email est incorrect !",
            "email.unique" => "L'email est unique !",
            "password.required" => "Le mot de passe est requis !",
            "password.min" => "Le mot de passe doit avoir au moins 4 caractères !",
            "password.same" => "Les mots de passe ne correspondent pas !",
            "telephone.required" => "Le telephone est requis !",
            "telephone.unique" => "Le telephone est unique !",
            "telephone.regex" => "Le format du telephone est incorect !",
        ];
    }
}
