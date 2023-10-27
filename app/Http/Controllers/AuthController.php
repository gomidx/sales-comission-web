<?php

namespace App\Http\Controllers;

use App\Services\AuthService;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    private AuthService $service;

    public function __construct()
    {
        $this->service = new AuthService();
    }

    public function login(): View
    {
        return view('auth.login');
    }

    public function register(): View
    {
        return view('auth.register');
    }

    public function logout(): RedirectResponse
    {
        session()->forget('api_token');
        session()->forget('name');
        session()->forget('email');

        return redirect()->route('auth.login');
    }

    public function loginPost(Request $request): RedirectResponse
    {
        try {
            return $this->service->login($request);
        } catch (\Throwable $th) {
            return redirect('/dashboard/sales')->with('error', 'Erro interno, contate o administrador do sistema.');
        }
    }

    public function registerPost(Request $request): RedirectResponse
    {
        try {
            return $this->service->register($request);
        } catch (\Throwable $th) {
            return redirect('/dashboard/sales')->with('error', 'Erro interno, contate o administrador do sistema.');
        }
    }
}
