<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EleveRequest extends FormRequest
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
            'nom' => 'required',
            'prenom' => 'required',
            'date_de_naissance' => 'date_format:Y-m-d',
            'sexe' => 'required',
            'profil' => 'required',
            'email'=> 'required'

        ];
    }
    public function messages()
    {
        return [
            'date_de_naissance.date_format' =>'bonjour'
        ];
    }
}
