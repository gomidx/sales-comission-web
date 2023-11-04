<?php

namespace App\Http\Controllers;

use App\Services\EmailService;
use Illuminate\Http\RedirectResponse;

class EmailController extends Controller
{
    private EmailService $service;

    public function __construct()
    {
        $this->service = new EmailService();
    }

    public function sendEmailToSeller(int $sellerId, string $sellerEmail): RedirectResponse
    {
        try {
            return $this->service->sendToSeller($sellerId, $sellerEmail);
        } catch (\Throwable $th) {
            return redirect('/dashboard/sellers')->with('error', 'Erro interno, contate o administrador do sistema.');
        }
    }

    public function sendEmailToAdministrator(string $adminEmail): RedirectResponse
    {
        try {
            return $this->service->sendToAdministrator($adminEmail);
        } catch (\Throwable $th) {
            return redirect('/dashboard')->with('error', 'Erro interno, contate o administrador do sistema.');
        }
    }
}
