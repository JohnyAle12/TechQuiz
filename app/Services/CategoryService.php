<?php

declare(strict_types=1);

namespace App\Services;

use App\Models\Category;

class CategoryService
{
    public function getAll(): array
    {
        return Category::select('id', 'name')
            ->orderBy('name')
            ->get()
            ->toArray();
    }
}