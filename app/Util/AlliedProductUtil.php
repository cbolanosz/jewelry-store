<?php

/* Author: Cristian Bolaños */

namespace App\Util;

use Illuminate\Http\Client\ConnectionException;
use Illuminate\Support\Facades\Http;

class AlliedProductUtil
{
    public static function getProducts(): array
    {
        try {
            $response = Http::timeout(5)->get(config('services.allied_products.url'));
        } catch (ConnectionException $exception) {
            return [];
        }

        if (! $response->successful()) {
            return [];
        }

        return $response->json() ?? [];
    }
}
