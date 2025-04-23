<?php

namespace App\Http\Controllers;

use App\Models\Departement;
use App\Models\Employer;
use App\Models\User;
use Illuminate\Http\Request;

class AppController extends Controller
{
    public function index()
    {
        $totalDepartements = Departement::all()->count();
        $totalEmployer = Employer::all()->count();
        $totalAdministrateur = User::all()->count();
        return view('page_d_accueil', compact('totalDepartements','totalEmployer', 'totalAdministrateur'));
    }
}
