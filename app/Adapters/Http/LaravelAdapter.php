<?php

declare(strict_types=1);

namespace App\Adapters\Http;

use App\Adapters\Http\Interfaces\HttpAdapter;
use Illuminate\Support\Facades\Http;

class LaravelAdapter implements HttpAdapter
{
    public function get(string $url): array
    {
        return Http::get($url)->collect()->all();
    }
}