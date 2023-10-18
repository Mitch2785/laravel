<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class AuthenticatedSessionController extends Controller
{
    public function store(Request $request){
        $credentials = $request->validate([
            'email' => ['required' ,'string', 'email'],
            'password' => ['required' ,'string']
        ]);
        // recive array para verificar 

        if ( ! Auth::attempt($credentials, $request->boolean('remember'))){
            //login fail
            throw ValidationException::withMessages([
                'email' => __('auth.failed')
            ]);
        };
        // login success
        $request->session()->regenerate();

        return redirect()->intended()->with('status', 'Iniciaste sesión');
    }

    public function destroy(Request $request){
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();
        
        return to_route('login')->with('status', 'Cerraste sesión.');
    }
}
