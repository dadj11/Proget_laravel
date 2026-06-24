<?php

namespace App\Http\Controllers;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    //

    public function loginForm(){

        return view('auth.login');
    }
    public function registerForm(){
        // dd( "RegisterForm");
        return view('auth.register');
    }
            public function logout(Request $request): RedirectResponse
        {
            Auth::logout();

            $request->session()->invalidate();

            $request->session()->regenerateToken();

            return redirect('/');
        }
    public function authenticate(Request $request){
        // 1 recuperet le credencial
        // 2 valider

        $credentials=$request->validate([
            "email"=>"required|email",
            "password"=>"required"
        ]);
        //   dump($credentials);
        //   dump(Auth::attempt($credentials));
          if(Auth::attempt($credentials)){
              $request->session()->regenerate();
              return redirect()->intended();
          }
           return back()->withErrors([
            'email' => 'email incorrecte',
        ])->onlyInput('email');
        //    recherceh
        // 3 recuper le user a base de email
        // 4 comparer les hach de password
        // 5 sovegarder les infos du user dans une section
        // 6 rdiriger ver la vue demander

    }

    public function register(){
        dd( "Register");
    }
}
