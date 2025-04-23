<?php

namespace App\Http\Controllers;

use App\Models\Employer;
use Illuminate\Http\Request;

class EmployerController extends Controller
{

    public function liste_des_employer()
    {
       $employers = Employer::paginate();
        return view('employers.liste_des_employer', compact('employers'));
    }


    public function ajouter()
    {
       return view('employers.ajouter');
    }


    public function modifier(Employer $employer)
    {
        return view('employers.modifier', compact('employer'));
    }


}
