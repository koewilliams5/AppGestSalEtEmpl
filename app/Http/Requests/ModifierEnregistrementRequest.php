<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ModifierEnregistrementRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            //
            'departement_id' => 'required|integer',
            'nom' => 'required|string',
            'prenom' => 'required|string',
            'email' => 'required',
            'contact' => 'required',
            'montant_journalier' => 'required|integer',
        ];
    }

    public function messages()
    {
        return [
            'departement_id.required' => 'Le choix du département est requis',
            'nom.required' => 'Le champ nom est requis',
            'prenom.required' => 'Le champ prenom est requis',
            'email.required' => 'Le champ email est requis',
            'contact.required' => 'le champs Contact est requis',
            'montant_journalier.required' => 'Le montant journalier est requis',

        ];
    }
}
