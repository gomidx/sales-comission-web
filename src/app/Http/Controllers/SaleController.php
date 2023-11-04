<?php

namespace App\Http\Controllers;

use App\Services\SaleService;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class SaleController extends Controller
{
    private SaleService $service;

    public function __construct()
    {
        $this->service = new SaleService();
    }

    public function index(): View
    {
        try {
            return $this->service->getSales();
        } catch (\Throwable $th) {
            return redirect('/dashboard/sellers')->with('error', 'Erro interno, contate o administrador do sistema.');
        }
    }

    public function createSale()
    {
        return view('app.sales.create-sale');
    }

    public function createSalePost(Request $request): RedirectResponse
    {
        try {
            return $this->service->store($request);
        } catch (\Throwable $th) {
            return redirect('/dashboard/sales')->with('error', 'Erro interno, contate o administrador do sistema.');
        }
    }

    public function getSellerSales(int $sellerId): View | RedirectResponse
    {
        try {
            return $this->service->getSellerSales($sellerId);
        } catch (\Throwable $th) {
            return redirect('/dashboard/sellers')->with('error', 'Erro interno, contate o administrador do sistema.');
        }
    }
}