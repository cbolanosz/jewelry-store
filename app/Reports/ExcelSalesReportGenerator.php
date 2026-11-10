<?php

/* Author: Pablo José Benítez Trujillo */

namespace App\Reports;

use App\Contracts\SalesReportGenerator;
use Illuminate\Database\Eloquent\Collection;
use Symfony\Component\HttpFoundation\StreamedResponse;

class ExcelSalesReportGenerator implements SalesReportGenerator
{
    public function generate(Collection $orders): StreamedResponse
    {
        $viewData = [];
        $viewData['orders'] = $orders;
        $viewData['totalSales'] = $orders->sum(function ($order) {
            return $order->getTotalAmount();
        });

        return response()->streamDownload(function () use ($viewData): void {
            echo view('report.sales_excel')->with('viewData', $viewData)->render();
        }, __('report.excel_file'), [
            'Content-Type' => 'application/vnd.ms-excel; charset=UTF-8',
        ]);
    }
}
