<?php

namespace App\Http\Controllers;

use App\Services\SellerService;
use App\Utils\Utils;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class SellerController extends Controller
{
    private SellerService $service;

    public function __construct()
    {
        $this->service = new SellerService();
    }

    public function index(): View | RedirectResponse
    {
        try {
            return $this->service->getSellers();
        } catch (\Throwable $th) {
            return redirect('/dashboard/sellers')->with('error', 'Erro interno, contate o administrador do sistema.');
        }
    }

    public function createSeller()
    {
        return view('app.sellers.create-seller');
    }

    public function createSellerPost(Request $request): RedirectResponse
    {
        try {
            return $this->service->store($request);
        } catch (\Throwable $th) {
            return redirect('/dashboard/sellers')->with('error', 'Erro interno, contate o administrador do sistema.');
        }
    }

    public function updateSeller(int $sellerId): View | RedirectResponse
    {
        try {
            return $this->service->getUser($sellerId);
        } catch (\Throwable $th) {
            return redirect('/dashboard/sellers')->with('error', 'Erro interno, contate o administrador do sistema.');
        }
    }

    public function updateSellerPost(Request $request, int $sellerId): RedirectResponse
    {
        try {
            return $this->service->update($request, $sellerId);
        } catch (\Throwable $th) {
            return redirect('/dashboard/sellers')->with('error', 'Erro interno, contate o administrador do sistema.');
        }
    }

    public function deleteSeller(int $sellerId): View | RedirectResponse
    {
        try {
            return $this->service->delete($sellerId);
        } catch (\Throwable $th) {
            return redirect('/dashboard/sellers')->with('error', 'Erro interno, contate o administrador do sistema.');
        }
    }
}