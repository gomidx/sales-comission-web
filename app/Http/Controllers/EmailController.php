<?php

namespace App\Http\Controllers;

use App\Mail\SellerSalesEmail;
use App\Utils\Utils;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class EmailController extends Controller
{
    public function sendEmail()
    {
        $sales = $this->calculateSellerSalesValueForEmail();

        Mail::to('lucasgomidecv@gmail.com')->send(new SellerSalesEmail($sales));
    }

    private function calculateSellerSalesValueForEmail(): array
    {
        $sellers = Utils::doRequestWithToken('get', [], '/seller/list');

        foreach ($sellers['data'] as $seller) {
            $sellerSales = Utils::doRequestWithToken('get', [], '/email/sellers/sales');
        }

        return $sellerSales;
    }
}
