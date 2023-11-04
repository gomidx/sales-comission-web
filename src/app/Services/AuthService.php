<?php

namespace App\Services;

use App\Utils\Utils;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class AuthService
{
    public function login(Request $request): RedirectResponse
    {
        $apiResponse = Utils::doRequestWithoutToken($request->all(), '/token');

        if (! empty($apiResponse['data'])) {
            session(['api_token' => $apiResponse['data']]);

            $this->setUserDataOnSession($request->input('email'));

            return redirect('/dashboard');
        }

        return redirect('/login')->with('error', Utils::buildError($apiResponse['error'] ?? ''));
    }

    public function register(Request $request): RedirectResponse
    {
        $apiResponse = Utils::doRequestWithoutToken($request->all(), '/user');

        if (! empty($apiResponse['data'])) {
            return $this->login($request);
        }

        return redirect()->route('/login')->with('error', Utils::buildError($apiResponse['error'] ?? ''));
    }

    private function setUserDataOnSession(string $email): void
    {
        $apiResponse = Utils::doRequestWithToken('get', [], '/user/' . $email);

        if (! empty($apiResponse['data'])) {
            session(['name' => $apiResponse['data']['name']]);
        } else {
            session(['name' => $email]);
        }

        session(['email' => $email]);
    }
}