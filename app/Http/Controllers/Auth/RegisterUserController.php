<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;

use Illuminate\Validation\Rules;

use Illuminate\Http\Request;

use App\Models\User;

class RegisterUserController extends Controller
{
    //

    public function store(Request $request){
        $request->validate([
            'name' =>['required', 'string', 'max:255'],
            'email' =>['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' =>['required', 'confirmed', Rules\Password::default()],

        ]);

        $user = User:: create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            
        ]);

        // Auto login
        //Auth::login($user);

        //Manual login
        return to_route('login')->with('status', 'Cuenta creada!');
    }
}
