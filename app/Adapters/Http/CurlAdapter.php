<?php

declare(strict_types=1);

namespace App\Adapters\Http;

use App\Adapters\Http\Interfaces\HttpAdapter;
use Illuminate\Support\Facades\Log;

class CurlAdapter implements HttpAdapter
{
    public function get(string $url): array
    {
        try {
            $curl = curl_init();
            curl_setopt($curl, CURLOPT_URL,  $url);
            curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
            curl_setopt($curl, CURLOPT_HTTPGET,true);
            curl_setopt($curl, CURLOPT_HEADER, 0);

            $data = curl_exec($curl);
            curl_close($curl);

            return json_decode($data, true);
        } catch (\Throwable $th) {
            Log::error($th->getMessage());
        }
    }
}