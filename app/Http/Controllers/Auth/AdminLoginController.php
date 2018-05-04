<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;

/* Controller do login admin */
class AdminLoginController extends Controller
{
    // Middleware de autenticação
    public function __construct()
    {
        $this->middleware('guest:admin')->except('logout');
    }

    // mostra o form de login admin
    public function showLoginForm()
    {
        return view('auth.admin-login');
    }

    // Método de logar no admin
    public function login(Request $request)
    {
        //valida os dados
        $this->validate($request, [
            'email'    => 'required|email',
            'password' => 'required|min:6',
        ]);

        //efetua o login, usando o guard configurado no config/auth.php
        if(Auth::guard('admin')->attempt(['email' => $request->email, 'password' => $request->password], $request->remember)){
            return redirect()->intended(route('admin.painel'));
        }
        
        return redirect()->back()->withInput($request->only('email', 'remember'));
    }

    // Método de logout
    public function logout()
    {
        Auth::guard('admin')->logout();
        return redirect('/');
    }
}
