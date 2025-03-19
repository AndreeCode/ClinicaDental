<?php

namespace App\Http\Controllers;


use App\Http\Requests\LoginRequest;
use App\Http\Requests\StoreUsuarioRequest;
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
    public function login(LoginRequest $request)
    { 
        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            return redirect()->route('dashboard.user');
        }
        return redirect()->route('login')->withErrors(['error','Error en las credenciales']);
    }
    public function logout(){
        Auth::logout();
        return redirect()->route('login');
    }
    public function showDashboardUser(){
        return view('auth.dashboard.dashboardAdmin');
    }
    public function showRegisterForm()
    {
        return view("auth.register");
    }
    public function register(StoreUsuarioRequest $request)
    {
        $usuario=User::create([ 
            'name'=>$request->name,
            'lastname'=>$request->lastname,
            'email'=> $request->email,
            'telefono'=>$request->telefono,
            'password'=> $request->password,
        ]);
        session()->flash('success','Tu cuenta ha sido creada con exito');
        
        return redirect()->route('login');
    }
}
