<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class userController extends Controller
{
    public function login(){
        return view("auth.login");
    }
    public function showRgisterForm(){
        return view("auth.register");
    }
    public function register(Request $request){
        $request->validate([
            "name"=> "required",
            "email"=> "required|email",
            "password"=> "required|min:8",
            "prenom"=> "required",
            "date_naissance"=> "required|date",
            "adresse"=> "required",
            "telephone"=> "required",
            "photo"=> "required|image|mimes:jpeg,png,jpg,gif|max:2048",
        ]);
        //dd($request->all());
        return redirect()->route("login");
    }
}
