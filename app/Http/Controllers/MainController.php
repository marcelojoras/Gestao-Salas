<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use Auth;
use App\User;
use App\Sala;
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
        $salas = Sala::all();
        $total = Sala::all()->count();
    	return view('dashboard', compact('salas', 'total'));
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

    function createSala(Request $request){
        $sala = new Sala;
        $sala->name = $request->name;
        $sala->localization = $request->localization;
        $sala->is_reserved = 'false';
        $sala->save();
        return back()->with('sala_criada', 'Sala criada com sucesso!');
    }

    function deleteSala(Request $request){
        $sala = Sala::findOrFail($request->id);
        $sala->delete();
        return back()->with('sala_criada', 'Sala deletada com sucesso!');
    }

    function alteraSala(Request $request){
        $sala = Sala::findOrFail($request->id);
        return view('alter-sala', compact('sala'));
    }

    function alteraSalaBanco(Request $request){
        $sala = Sala::findOrFail($request->id);
        $sala->name = $request->name;
        $sala->localization = $request->localization;
        $sala->save();
        return redirect(url('main/dashboard'))->with('sala_criada', 'Sala alterada com sucesso!');
    }
}
