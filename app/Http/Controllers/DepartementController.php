<?php

namespace App\Http\Controllers;

use App\Http\Requests\EnregistrementDepartementRequest;
use App\Models\Departement;
use Illuminate\Http\Request;

class DepartementController extends Controller
{

    public function liste_des_departements()
    {
        $departements = Departement::paginate(10);
        return view('departements.liste_des_departements', compact('departements'));
    }


    public function ajouter()
    {
        return view('departements.ajouter');
    }


    public function modifier(Departement $departement)
    {
        return view('departements.modifier', compact('departement'));
    }


    //interraction avec ma base de donnée


    public function ajouterTraitement(EnregistrementDepartementRequest $request)
    {
        try {
            $departement = new Departement();
            $departement -> name = $request -> name;
            $departement -> save();

            return redirect()->route('departement.liste_des_departements')->with('status','Département enregistré');

        }catch (Exception $e){
            return $e->getMessage();
        }
    }



    public function modifierTraitement(Departement $departement, EnregistrementDepartementRequest $request)
    {
        try {

            $departement -> name = $request -> name;
            $departement -> update();

            return redirect()->route('departement.liste_des_departements')->with('status','Département modifié');

        }catch (Exception $e){
            return $e->getMessage();
        }
    }


    public function supprimer(Departement $departement)
    {
        try {

            $departement->delete();
            return redirect()->route('departement.liste_des_departements')->with('status','Département supprimé avec succès');

        }catch (Exception $e){
            return $e->getMessage();
        }
    }

}
