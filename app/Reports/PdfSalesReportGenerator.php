<?php

/* Author: Pablo José Benítez Trujillo */

namespace App\Reports;

use App\Contracts\SalesReportGenerator;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Response;

class PdfSalesReportGenerator implements SalesReportGenerator
{
    public function generate(Collection $orders): Response
    {
        $viewData = [];
        $viewData['orders'] = $orders;
        $viewData['totalSales'] = $orders->sum(function ($order) {
            return $order->getTotalAmount();
        });

        return Pdf::loadView('report.sales_pdf', ['viewData' => $viewData])
            ->download(__('report.pdf_file'));
    }
}
