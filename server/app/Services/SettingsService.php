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

    /**
     * Get user settings as array with key => value pairs
     *
     * @return array
     */
    public function getSettings(): array
    {
        $settings = $this->user->settings->mapWithKeys(function ($item) {
            return [$item['key'] => $item['value']];
        });

        return $settings->toArray();
    }

    /**
     * Update user settings and return updated settings
     *
     * @param SettingsUpdateRequest $request
     * @return array
     */
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

    /**
     * Map settings array to array with key => value pairs
     *
     * @param array $settings
     * @return array
     */
    public function mapSettings(array $settings): array
    {
        return array_map(fn($key, $value) => ['key' => $key, 'value' => $value], array_keys($settings), $settings);
    }

}
