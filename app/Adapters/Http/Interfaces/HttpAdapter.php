<?php

declare(strict_types=1);

namespace App\Adapters\Http\Interfaces;

interface HttpAdapter
{
    public function get(string $url): array;
}