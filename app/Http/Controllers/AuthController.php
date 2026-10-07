<?php

namespace App\Http\Controllers;

/**
 * Fase 1 dummy: hanya UI (PRD Task 1.4). Backend OAuth & session di Task 2.3.
 */
class AuthController extends Controller
{
    public function login()
    {
        return view('auth.login');
    }

    public function register()
    {
        return view('auth.register');
    }

    public function forgot()
    {
        return view('auth.lupa-password');
    }
}
