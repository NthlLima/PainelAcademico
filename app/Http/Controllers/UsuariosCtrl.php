<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class UsuariosCtrl extends Controller
{
    public function index(){

     	if (Auth::check()) {
     		return view('painel.usuarios');
		} else{
			return redirect()->route('login');
		}
    }
}
