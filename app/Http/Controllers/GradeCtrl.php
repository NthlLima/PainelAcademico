<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Grade;
use Auth;


class GradeCtrl extends Controller
{
    public function index(){

     	if (Auth::check()) {
     		return view('painel.grade');
		} else{
			return redirect()->route('login');
		}
    }


    public function buscar(Request $request)
    {
    	$item   = $request->all();
    	$buscar = new Grade();

    	$return = $buscar->buscar($item);

    	return $return;
    }
}
