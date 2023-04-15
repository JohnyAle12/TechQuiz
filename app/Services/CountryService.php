<?php

declare(strict_types=1);

namespace App\Services;

use App\Adapters\Http\Interfaces\HttpAdapter;
use Illuminate\Support\Facades\Log;

class CountryService
{
    public function __construct(
        private readonly HttpAdapter $httpAdapter
    ){}

    public function getCountries(): array
    {
        try {
            $endpoint = config('services.restcountries.endpoint');
            $result = $this->httpAdapter->get($endpoint);
            
            return array_map(
                fn($item) => $item['name']['common'],
                $result
            );
        } catch (\Throwable $exception) {
            Log::error('There is an error getting countries', $exception);
        }
    }
}