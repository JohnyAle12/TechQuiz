<?php

declare(strict_types=1);

namespace App\Services;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class CountryService
{
    public function getCountries(): array
    {
        try {
            $endpoint = config('services.restcountries.endpoint');
            $result = Http::get($endpoint);
            
            return array_map(
                fn($item) => $item['name']['common'],
                $result->collect()->all()
            );
        } catch (\Throwable $exception) {
            Log::error('There is an error getting countries', $exception);
        }
    }
}