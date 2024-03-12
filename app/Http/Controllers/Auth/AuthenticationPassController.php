<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AuthenticationPassController extends Controller
{
    public function index()
    {
        session(['authenticated' => false]);
        return view('auth.passwords.authentication_pass');
    }
    public function authenticate(Request $request)
    {
        $password = $request->input('password');
        if ($password === 'pEATic@kURaPT') {
            $request->session()->put('authenticated', true);
            return redirect()->route('register');
        } else {
            return redirect()->route('authentication.pass')->with('error', 'Senha incorreta.');
        }
    }
    
    
    
}
