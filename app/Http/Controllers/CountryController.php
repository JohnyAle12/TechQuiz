<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Services\CountryService;
use Illuminate\Http\JsonResponse;

class CountryController extends Controller
{
    public function __construct(
        private CountryService $countryService
    ) {
    }

    public function getCountries(): JsonResponse
    {
        return response()->json([
            'data' => $this->countryService->getCountries(),
        ], 200);
    }
}
