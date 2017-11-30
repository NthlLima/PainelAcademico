<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;


class PainelCtrl extends Controller
{
     public function index(){

     	if (Auth::check()) {
     		return view('painel.index');
		} else{
			return redirect()->route('login');
		}
     }
}
