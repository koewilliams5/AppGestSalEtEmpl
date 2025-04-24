<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EnregistrerEmployerRequest extends FormRequest
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
            'email' => 'required|unique:employers,email',
            'contact' => 'required|unique:employers,contact',
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
            'email.unique' => 'le mail existe déjà',
            'contact.required' => 'le champs Contact est requis',
            'contact.unique' => 'Ce contact est déjà utilisé',
            'montant_journalier.required' => 'Le montant journalier est requis',
        ];
    }
}
