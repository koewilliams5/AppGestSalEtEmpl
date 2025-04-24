<?php

namespace App\Http\Controllers;

use App\Http\Requests\EnregistrerEmployerRequest;
use App\Http\Requests\ModifierEnregistrementRequest;

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
        //ce qui me permettra d'utilisé les éléments du departement dans la vue modifier
        $departements = Departement::all();
       return view('employers.ajouter', compact('departements'));
    }


    public function modifier(Employer $employer)
    {
        $departements = Departement::all(); //ce qui me permettra d'utilisé les éléments du departement dans la vue modifier

        return view('employers.modifier', compact('employer','departements'));
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



    public function modifierEnregistrement(Employer $employer, ModifierEnregistrementRequest $request)
    {

        try {

            $employer -> departement_id = $request->departement_id;
            $employer -> nom = $request->nom;
            $employer -> prenom = $request->prenom;
            $employer -> email = $request->email;
            $employer -> contact = $request->contact;
            $employer -> montant_journalier = $request->montant_journalier;

            $employer -> update();

            return redirect()->route('employer.liste_des_employer')->with('status','Les informations de l\'employé ont été mise à jour');

        }catch (Exception $e){
            return $e->getMessage();
        }
    }



    public function supprimer(Employer $employer)
    {
        try {

            $employer -> delete();
            return redirect()->route('employer.liste_des_employer')->with('status','L\'employé a été supprimé avec succès');

        }catch (Exception $e){
            return $e->getMessage();
        }
    }
}
