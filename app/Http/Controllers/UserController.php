<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;


class UserController extends Controller
{
    public function index() {
    	$users = User::all();
    	return view('index')->with('users', $users);
    }

    public function edit($id) {
    	$user = User::find($id);
    	return view('edit')->with('user', $user);
    }

    public function update(Request $request) {
		$validatedData = $request->validate([
			'name' => 'required',
			'email' => 'required|email',
		]);
		$user = User::find($request->input('id'));
		$user->name = $request->input('name');
		$user->email = $request->input('email');
		$user->save();
		return redirect('/');
    }

    public function login() {
        return view('login');
    }

    public function postLogin(Request $request) {
        $validatedData = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $email = $request->input('email');
        $password = md5($request->input('password'));

        $user = User::where('email', $email)
                    ->where('password', $password)
                    ->first();
        if(!empty($user)) {
            // $user = json_decode($user); // convert json to array
            $request->session()->put('user', $user);
        } else {
            return redirect()->route('login');
        }
        return redirect()->route('index');
    }

    public function logout(Request $request) {
        $request->session()->forget('user');
        return redirect()->route('login');
    }
}
