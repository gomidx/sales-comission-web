<?php

namespace App\Services;

use App\Utils\Utils;
use GuzzleHttp\Client;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class SaleService
{
    public function getSales(): View
    {
        $apiResponse = Utils::doRequestWithToken('get', [], '/sale/list'); // passar p service essas funcçoes

        if (! empty($apiResponse['data'])) {
            $sales = $this->buildSalesComissionValue($apiResponse['data']);

            return view('app.sales.sales-list', [
                'sales' => $sales
            ]);
        }

        return view('app.sales.sales-list', [
            'sales' => []
        ]);
    }

    private function buildSalesComissionValue(array $sales): array
    {
        foreach ($sales as $key => $sale) {
            $sales[$key]['comission_value'] = ($sale['total_value'] * 8.5) / 100;
        }

        return $sales;
    }

    public function store(Request $request): RedirectResponse
    {
        $apiResponse = Utils::doRequestWithToken('post', $request->all(), '/sale');

        if (! empty($apiResponse['data'])) {
            return redirect('/dashboard/sales')->with('success', 'Venda criada com sucesso!');
        }

        return redirect('/dashboard/sales/create')->with('error', Utils::buildError($apiResponse['error'] ?? ''));
    }

    public function getSellerSales(int $sellerId): View | RedirectResponse
    {
        $apiResponse = Utils::doRequestWithToken('get', [], '/seller/' . $sellerId . '/sales');

        if (! empty($apiResponse['data'])) {
            $sales = $this->buildSalesComissionValue($apiResponse['data']);

            return view('app.sales.sales-list', [
                'sales' => $sales
            ]);
        }

        return view('app.sales.sales-list', [
            'sales' => []
        ]);
    }
}