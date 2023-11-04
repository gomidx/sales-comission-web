<?php

namespace App\Services;

use App\Mail\AllSalesEmail;
use App\Mail\SellerSalesEmail;
use App\Utils\Utils;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Mail;

class EmailService
{
    public function sendToSeller(int $sellerId, string $sellerEmail): RedirectResponse
    {
        $sales =  Utils::doRequestWithToken('get', [], '/seller/' . $sellerId . '/email');

        Mail::to($sellerEmail)->send(new SellerSalesEmail($sales['data']));

        return redirect('/dashboard/sellers')->with('success', 'E-mail encaminhado com sucesso!');
    }

    public function sendToAdministrator(string $adminEmail): RedirectResponse
    {
        $sales =  Utils::doRequestWithToken('get', [], '/sale/list/email');

        Mail::to($adminEmail)->send(new AllSalesEmail($sales['data']));

        return redirect('/dashboard')->with('success', 'E-mail encaminhado com sucesso!');
    }

    public function sendToAllSellers(): void
    {
        $sales =  Utils::doRequestWithoutToken([], '/seller/list/email', 'get');

        foreach ($sales['data'] as $email => $sale_data) {
            Mail::to($email)->send(new SellerSalesEmail($sale_data));
        }
    }
}