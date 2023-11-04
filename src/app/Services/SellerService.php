<?php

namespace App\Services;

use App\Utils\Utils;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;

class SellerService
{
    public function getSellers(): View | RedirectResponse
    {
        $apiResponse = Utils::doRequestWithToken('get', [], '/seller/list');

        if (! empty($apiResponse['data'])) {
            return view('app.sellers.sellers-list', [
                'sellers' => $apiResponse['data']
            ]);
        }

        return redirect('/dashboard/sellers')->with('error', Utils::buildError($apiResponse['error'] ?? ''));
    }

    public function store(Request $request): RedirectResponse
    {
        $apiResponse = Utils::doRequestWithToken('post', $request->all(), '/seller');

        if (! empty($apiResponse['data'])) {
            return redirect('/dashboard/sellers')->with('success', 'Vendedor criado com sucesso!');
        }

        return redirect('/dashboard/seller/create')->with('error', Utils::buildError($apiResponse['error'] ?? ''));
    }

    public function getUser(int $sellerId): View | RedirectResponse
    {
        $apiResponse = Utils::doRequestWithToken('get', [], '/seller/' . $sellerId);

        if (! empty($apiResponse['data'])) {
            return view('app.sellers.update-seller', [
                'seller' => $apiResponse['data']
            ]);
        }

        return redirect('/dashboard/sellers')->with('error', Utils::buildError($apiResponse['error'] ?? ''));
    }

    public function update(Request $request, int $sellerId): RedirectResponse
    {
        $seller = Utils::doRequestWithToken('get', [], '/seller/' . $sellerId);

        if (! empty($seller['data'])) {
            $payload = array_diff_assoc($request->all(), $seller['data']);

            $apiResponse = Utils::doRequestWithToken('put', $payload, '/seller/' . $sellerId);

            if (! empty($apiResponse['data'])) {
                return redirect('/dashboard/sellers')->with('success', 'Vendedor editado com sucesso!');
            }
        }

        return redirect('/dashboard/sellers')->with('error', Utils::buildError($apiResponse['error'] ?? ''));
    }

    public function delete(int $sellerId): View | RedirectResponse
    {
        $apiResponse = Utils::doRequestWithToken('delete', [], '/seller/' . $sellerId);

        if (! empty($apiResponse['data'])) {
            return redirect('/dashboard/sellers')->with('success', 'Vendedor excluído com sucesso!');
        }

        return redirect('/dashboard/sellers')->with('error', Utils::buildError($apiResponse['error'] ?? ''));
    }
}