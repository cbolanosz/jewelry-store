<?php

/* Author: Pablo José Benítez Trujillo */

namespace App\Http\Controllers\Admin;

use App\Contracts\SalesReportGenerator;
use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Response;
use Symfony\Component\HttpFoundation\StreamedResponse;

class AdminSalesReportController extends Controller
{
    public function download(SalesReportGenerator $reportGenerator, string $format): Response|StreamedResponse
    {
        $orders = Order::with('user', 'items.product')
            ->where('status', '!=', 'cancelled')
            ->orderBy('created_at', 'desc')
            ->get();

        return $reportGenerator->generate($orders);
    }
}
