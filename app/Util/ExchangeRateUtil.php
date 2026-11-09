<?php

/* Author: Cristian Bolaños */

namespace App\Util;

use Illuminate\Http\Client\ConnectionException;
use Illuminate\Support\Facades\Http;

class ExchangeRateUtil
{
    public static function convertUsdToCop(float $amount): ?float
    {
        $url = config('services.exchange_rate.url').'/'.config('services.exchange_rate.key').'/latest/USD';

        try {
            $response = Http::timeout(5)->get($url);
        } catch (ConnectionException $exception) {
            return null;
        }

        $rate = $response->json('conversion_rates.COP');
        if (! $response->successful() || $rate === null) {
            return null;
        }

        return round($amount * $rate, 2);
    }
}
