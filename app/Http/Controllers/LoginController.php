<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Spatie\Permission\Traits\HasRoles;

class LoginController extends Controller
{


    public function index()
    {
        if (Auth::check()) {
            // The user is logged in...
            return redirect('/dashboard');
          }
          else{
            return view('login');

          }
    }
    public function authenticate(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            $roles = auth()->user()->getRoleNames();

            if ($roles[0] == 'accountant') {
                return redirect()->intended('/pos');
            }

            elseif($roles[0] == 'user'){
                return redirect()->intended('/startpage');
            }


        }
            else{
                return redirect()->intended('/dashboard');

            }


        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ]);
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/login');
    }


}
