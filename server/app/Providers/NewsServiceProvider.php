<?php

namespace App\Providers;

use App\Services\NewsService;
use Illuminate\Support\ServiceProvider;

class NewsServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->bind(NewsService::class, function () {
            $sourceConfigs = config('news.sources');
            $sourceClasses = [];

            foreach ($sourceConfigs as $sourceName => $sourceConfig) {
                ['config' => $config, 'source' => $source, 'formatter' => $formatter] = $sourceConfig;
                $sourceClasses[] = new $source(new $formatter, $config, $sourceName);
            }

            return new NewsService($sourceClasses);
        });
    }

    public function boot()
    {
        //
    }
}
