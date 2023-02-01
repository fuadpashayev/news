<?php

namespace App\Http\Controllers;

use App\Services\NewsService;
use App\Services\FilterService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    private NewsService $newsService;

    public function __construct(NewsService $newsService)
    {
        $this->newsService = $newsService;
    }

    public function index(Request $request, FilterService $filterService): JsonResponse
    {
        $filters = $filterService->getFilters($request);
        $news = $this->newsService->getNews($filters);
        return response()->json($news);
    }
}
