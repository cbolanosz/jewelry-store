<?php

/* Author: Pablo José Benítez Trujillo */

namespace App\Contracts;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Response;
use Symfony\Component\HttpFoundation\StreamedResponse;

interface SalesReportGenerator
{
    public function generate(Collection $orders): Response|StreamedResponse;
}
