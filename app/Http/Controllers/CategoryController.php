<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\JsonResponse;

class CategoryController extends Controller
{
    public function getCategories(): JsonResponse
    {
        $categories = Category::select('id', 'name')
            ->orderBy('name')
            ->get()
            ->toArray();

        return response()->json([
            'categories' => $categories
        ], 200);
    }
}
