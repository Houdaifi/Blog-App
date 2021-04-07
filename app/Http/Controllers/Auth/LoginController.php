<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index(){
        return view('auth.login');
    }
    
    public function store(Request $request){

        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required'
        ]);
        
        if(Auth::attempt($request->only('email', 'password'))):
            return redirect()->route('dashboard');
        else:
            return back()->with('status', 'Invalide login details');
        endif;
    }
}
