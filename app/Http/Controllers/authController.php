<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Http\Requests\StoreUsuarioRequest;
use App\Models\Usuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;

class authController extends Controller
{
    public function showLoginForm()
    {
        return view("auth.login");
    }
    public function login(LoginRequest $request){
        $user=Usuario::where("user",$request->input('user'))->first();
        if($user && Hash::check($request->input('password'),$user->password))
        {   
            Auth::login($user);
            return redirect()->route('dashboard.user');
        }
        return redirect()->route('login.form')->withErrors(['error','Error en las credenciales']);
    }
    public function showDashboardUser(){
        return view('auth.dashboard.dashboardAdmin');
    }
    public function showRegisterForm()
    {
        return view("auth.register");
    }
    public function register(StoreUsuarioRequest $request){
        
        $usuario=Usuario::create([ 
            'name'=>$request->name,
            'user'=> $request->user,
            'password'=> $request->password,
 
            'telefono'=>$request->telefono,
        ]);
        session()->flash('success','Tu cuenta ha sido creada con exito');
        
        return redirect()->route('login.form');
    }
}
