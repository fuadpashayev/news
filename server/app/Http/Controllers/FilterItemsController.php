<?php

namespace App\Http\Controllers;

use App\Services\FilterItemsService;
use Illuminate\Http\JsonResponse;

class FilterItemsController extends Controller
{
    public function index(FilterItemsService $filterItemsService): JsonResponse
    {
        $categories = $filterItemsService->getCategories();
        $languages = $filterItemsService->getLanguages();
        return response()->json([
            'categories' => $categories,
            'languages' => $languages,
        ]);
    }
}
