<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use Closure;
use Illuminate\Support\Facades\Auth;

class WelcomeController extends Controller
{
    public function index(){
        
        if (isset(Auth::user()->name)) {
            return redirect('/home');
        }else{
            return view('welcome');
        }
    }
}
