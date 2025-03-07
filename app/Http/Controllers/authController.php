<?php

namespace App\Http\Controllers;


use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class authController extends Controller
{
    public function showLoginForm()
    {
        return view("auth.login");
    }
    public function login(Request $request)
    { 
        $credentials = $request->only('email', 'password');
        // Intentar autenticar al usuario
        if (Auth::attempt($credentials)) {
            return redirect()->route('dashboard.user');
        }
        return redirect()->route('login.form')->withErrors(['error','Error en las credenciales']);
    }
    public function logout(){
        Auth::logout();
        return redirect()->route('login.form');
    }
    public function showDashboardUser(){
        return view('auth.dashboard.dashboardAdmin');
    }
    public function showRegisterForm()
    {
        return view("auth.register");
    }
    public function register(Request $request)
    {
        $usuario=User::create([ 
            'name'=>$request->name,
            'email'=> $request->email,
            'password'=> $request->password,
        ]);
        session()->flash('success','Tu cuenta ha sido creada con exito');
        
        return redirect()->route('login.form');
    }
}
