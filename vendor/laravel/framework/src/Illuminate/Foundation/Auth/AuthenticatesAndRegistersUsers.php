<?php

namespace Illuminate\Foundation\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

trait AuthenticatesAndRegistersUsers
{
    use AuthenticatesUsers, RegistersUsers {
        AuthenticatesUsers::redirectPath insteadof RegistersUsers;
        AuthenticatesUsers::getGuard insteadof RegistersUsers;

        login as traitLogin;
        register as traitRegister;
    }

    // Override trait function and call it from the overriden function
    public function login(Request $request)
    {
        //Set session as 'login'
        Session::put('last_auth_attempt', 'login');
        //The trait is not a class. You can't access its members directly.
        return $this->traitLogin($request);
    }


    public function register(Request $request)
    {
        //Set session as 'register'
        Session::put('last_auth_attempt', 'register');
        //The trait is not a class. You can't access its members directly.
        return $this->traitRegister($request);
    }
}

