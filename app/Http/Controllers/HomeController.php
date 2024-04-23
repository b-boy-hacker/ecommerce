<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
//---------------------------------
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class HomeController extends Controller
{
   
    public function bienvenido(){
        return view('inicio.bienvenido');
    }
    
    public function redirect(){
        $usertype = Auth::user()->usertype;
        if ($usertype == '1'){
            return view('admin/inicio.home');
        }
        else{
            return view('inicio.bienvenido');
        }
    }

    
}
