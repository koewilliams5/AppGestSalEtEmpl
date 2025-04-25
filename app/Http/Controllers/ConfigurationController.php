<?php

namespace App\Http\Controllers;

use App\Models\Configuration;
use Illuminate\Http\Request;

class ConfigurationController extends Controller
{
    //

    public function listeConfguration()
    {
        $toutesConfigurations = Configuration::latest()->paginate(10);
        return view('configurations.liste_des_configurations', compact('toutesConfigurations'));
    }
}
