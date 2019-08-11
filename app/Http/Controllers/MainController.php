<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use Auth;
use App\User;
use Illuminate\Support\Facades\Hash;

class MainController extends Controller
{
    function index(){
    	return view('login');
    }

    function checkLogin(Request $request){
    	$this->validate($request, [
    		'email' => 'required|email',
    		'password' => 'required|alphaNum|min:3'
    	]);

    	$user_data = array(
    		'email' => $request->get('email'),
    		'password' => $request->get('password')
    	);

    	if(Auth::attempt($user_data)){
    		return redirect('main/dashboard');
    	}else{
    		return back()->with('error', 'Senha ou Email errado!');
    	}
    }

    function successlogin(){
    	return view('dashboard');
    }

    function logout(){
    	Auth::logout();
    	return redirect('main');
    }

    function createUser(Request $request){
        $user = new User;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->save();
        return back()->with('user_criado', 'Usuário criado com sucesso! Faça login com ele');
    }
}
