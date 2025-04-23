<?php

namespace App\Http\Controllers;

use App\Http\Requests\AuthRequest;
use Illuminate\Http\Request;
use illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login()
    {
        return view('auth.login');
    }

    public function traitementLogin(AuthRequest $request)
    {
//        dd(kjhjoiuytr);
        $data = $request->only(['email','password']);
        if(Auth::attempt($data)){
            return redirect()->route('page_d_accueil');
        }else{
            return redirect()->back()->with('status','Email ou mot de passe incorrect');
        }
    }
}
