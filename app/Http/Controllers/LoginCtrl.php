<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Painel_usuario;
use Auth;
use Session;
use Validator;

class LoginCtrl extends Controller
{
    public function index(){
		return view('login'); 
    }


    
    public function entrar(Request $request){
	    	$dados = $request->all();
	    	if(Auth::attempt(['username' => $dados['username'], 'password' => $dados['password']])){
	        	$this->create_session(Auth::id());
	        	return "true";
	      	} else{
	      		return "Login Inválido";
	      	}

    }



    public function listar(){
        $search   = new Painel_usuario();
        $usuarios = $search->listar();
        return $usuarios;
    }



    public function logout(){
        Auth::logout();
        return redirect()->route('login');
    }



    public function admin(Request $request){

        $values    = $request->all();
        $validator = $this->validator_user($values);
        if ($validator == "true") {
            $this->create_new_user($values, 2);
            return [
                'result'  => true,
                'message' => 'Usuário Cadastrado com sucesso!',
            ];         
            
        } else{
            return [
                'result'  => false,
                'message' => $validator,
            ];
        }
    }



    public function cord(Request $request){

        $values    = $request->all();
        $validator = $this->validator_user($values);
        if ($validator == "true") {
            $this->create_new_user($values, 3);
            return [
                'result'  => true,
                'message' => 'Usuário Cadastrado com sucesso!',
            ];         
            
        } else{
            return [
                'result'  => false,
                'message' => $validator,
            ];
        }

    }



    public function secr(Request $request){

        $values    = $request->all();
        $validator = $this->validator_user($values);
        if ($validator == "true") {
            $this->create_new_user($values, 4);
            return [
                'result'  => true,
                'message' => 'Usuário Cadastrado com sucesso!',
            ];         
            
        } else{
            return [
                'result'  => false,
                'message' => $validator,
            ];
        }
        
    }



    public function create_session($id){
        $logged = Painel_usuario::find($id);

    	Session::put('id', $logged->id);
    	Session::put('user', $logged->username);
    	Session::put('type', $logged->tipo_usuario);
    }



    public function create_new_user($values, $type){

        $dados["username"] = $values["username"];
        $dados["password"] = bcrypt($values["password"]);
        $dados["tipo_usuario"] = $type;
        Painel_usuario::create($dados);
        
    }

    

    public function validator_user($values){

        $validator = Validator::make(
            $values, 
            [
                'username' => 'required|unique:painel_usuarios|max:50',
                'password' => 'required|min:6',
                'passrep'  => 'required|same:password',
            ],
            [
                'same'     => 'The :attribute and :other must match.',
                'required' => 'The :attribute required',
                'min'      => 'The :attribute value is not between :min',
                'max'      => 'The :attribute value is not between :max',
                'unique'   => 'The :attribute value is not unique',
            ]
        );

        if ($validator->fails()) {

            $errors = $validator->errors();

            foreach ($errors->all() as $message) {
                $error = $message;
                break;
            }

            return $error;

        } else{

            return "true";

        }

    }


}
