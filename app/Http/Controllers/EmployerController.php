<?php

namespace App\Http\Controllers;

use App\Http\Requests\EnregistrerEmployerRequest;
use App\Models\Departement;
use App\Models\Employer;
use Illuminate\Http\Request;
use Exception;

class EmployerController extends Controller
{
    //Tous ceux là retourne une vue
    public function liste_des_employer()
    {
       $employers = Employer::with('departement')->paginate(10);
        return view('employers.liste_des_employer', compact('employers'));
    }


    public function ajouter()
    {
        $departements = Departement::all();
       return view('employers.ajouter', compact('departements'));
    }


    public function modifier(Employer $employer)
    {
        return view('employers.modifier', compact('employer'));
    }



    //Tous ceux là intéragissent avec la base de donnée, ils permettent l'enregistrement des employés

    public function ajouterEnregistrement(EnregistrerEmployerRequest $request)
    {
        try {
            $employer = new Employer();
            $employer->departement_id = $request->departement_id;
            $employer->nom = $request->nom;
            $employer->prenom = $request->prenom;
            $employer->email = $request->email;
            $employer->contact = $request->contact;
            $employer->montant_journalier = $request->montant_journalier;
            $employer->save();

            return redirect()->route('employer.liste_des_employer')->with('status','Employé ajouté avec succès');

        }catch (Exception $e){
            return $e->getMessage();
        }
    }

}
