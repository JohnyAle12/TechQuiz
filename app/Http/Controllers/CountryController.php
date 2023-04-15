<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Adapters\Http\LaravelAdapter;
use App\Services\CountryService;
use Illuminate\Http\JsonResponse;

class CountryController extends Controller
{
    private CountryService $countryService;

    public function __construct() {
        $this->countryService = new CountryService(new LaravelAdapter);
    }

    public function getCountries(): JsonResponse
    {
        return response()->json([
            'data' => $this->countryService->getCountries(),
        ], 200);
    }
}
