<?php

namespace App\Services;

use App\Http\Requests\Settings\SettingsUpdateRequest;
use Illuminate\Contracts\Auth\Authenticatable;

class SettingsService {
    public ?Authenticatable $user;

    public function __construct()
    {
        $this->user = auth()->user();
    }
    public function getSettings(): array
    {
        $settings = $this->user->settings->mapWithKeys(function ($item) {
            return [$item['key'] => $item['value']];
        });

        return $settings->toArray();
    }

    public function updateSettings(SettingsUpdateRequest $request): array
    {
        $settings = $this->mapSettings($request->validated());
        foreach ($settings as $setting) {
            $this->user->settings()->updateOrCreate(
                [
                    'user_id' => $this->user->id,
                    'key' => $setting['key']
                ],
                ['value' => $setting['value']]
            );
        }

        return $this->getSettings();
    }

    public function mapSettings(array $settings): array
    {
        return array_map(fn($key, $value) => ['key' => $key, 'value' => $value], array_keys($settings), $settings);
    }

}
