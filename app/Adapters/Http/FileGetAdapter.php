<?php

declare(strict_types=1);

namespace App\Adapters\Http;

use App\Adapters\Http\Interfaces\HttpAdapter;

class FileGetAdapter implements HttpAdapter
{
    public function get(string $url): array
    {
        return json_decode( file_get_contents($url), true);
    }
}