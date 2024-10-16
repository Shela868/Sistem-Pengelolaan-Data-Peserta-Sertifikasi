<?php

namespace App\Http\Controllers;
use App\Models\user;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;




class AuthController extends Controller

{
        public function index(){
            if($user= Auth::user()){
                if ($user->role == 'peserta'){
                    return redirect()->intended('users.frontend');
                }elseif($user->role == 'admin'){
                    return redirect()->intended('home');
                }
            }
            return view ('users.frontend');
         }

}
