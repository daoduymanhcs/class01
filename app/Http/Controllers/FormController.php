<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FormController extends Controller
{
    public function postForm(Request $request) {
		$validatedData = $request->validate([
			'email' => 'required|email',
			'password' => 'required',
		]);
    	$data = $request->all();
    	dd($data);
    }
}
