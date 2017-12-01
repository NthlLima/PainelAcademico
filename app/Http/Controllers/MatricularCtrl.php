<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class MatricularCtrl extends Controller
{
    public function index(){

     	if (Auth::check()) {
     		return view('painel.matricular');
		} else{
			return redirect()->route('login');
		}
    }
}
