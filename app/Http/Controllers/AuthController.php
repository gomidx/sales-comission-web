<?php

namespace App\Http\Controllers;

use App\Services\AuthService;
use App\Utils\Utils;
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

        return redirect()->route('auth.login');
    }

    public function loginPost(Request $request): RedirectResponse
    {
        $apiResponse = Utils::doRequestWithoutToken($request->all(), '/token');

        if (! empty($apiResponse['data'])) {
            session(['api_token' => $apiResponse['data']]);

            $this->setUserNameOnSession($request->input('email'));

            return redirect('/dashboard');
        }

        return redirect('/login')->with('error', Utils::buildError($apiResponse['error'] ?? ''));
    }

    public function registerPost(Request $request): RedirectResponse
    {
        $apiResponse = Utils::doRequestWithoutToken($request->all(), '/user');

        if (! empty($apiResponse['data'])) {
            return $this->loginPost($request);
        }

        return redirect()->route('/login')->with('error', Utils::buildError($apiResponse['error'] ?? ''));
    }

    private function setUserNameOnSession(string $email): void
    {
        $apiResponse = Utils::doRequestWithToken('get', [], '/user/' . $email);

        if (! empty($apiResponse['data'])) {
            session(['name' => $apiResponse['data']['name']]);
        } else {
            session(['name' => $email]);
        }
    }
}
