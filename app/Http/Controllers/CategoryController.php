<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Services\CategoryService;
use Illuminate\Http\JsonResponse;

class CategoryController extends Controller
{
    public function __construct(
        private CategoryService $categoryService
    ) {
    }

    public function getCategories(): JsonResponse
    {
        return response()->json([
            'categories' => $this->categoryService->getAll()
        ], 200);
    }
}
