<?php

namespace App\Http\Controllers;

use App\Http\Requests\Settings\SettingsUpdateRequest;
use App\Services\SettingsService;
use Illuminate\Http\JsonResponse;

class SettingsController extends Controller
{
    public function index(SettingsService $settingsService): JsonResponse
    {
        $settings = $settingsService->getSettings();
        return response()->json($settings);
    }

    public function update(SettingsUpdateRequest $request, SettingsService $settingsService): JsonResponse
    {
        $settings = $settingsService->updateSettings($request);
        return response()->json($settings);
    }
}
