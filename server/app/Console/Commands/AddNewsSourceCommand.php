<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class AddNewsSourceCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:source {name}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Add news source to codebase';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $sourceName = $this->argument('name');
        $checkName = Str::endsWith($sourceName, 'Source');
        if (!$checkName) {
            $this->error(" News source must end with \033[47m\033[31m Source \033[0m, for example \033[47m\033[31m {$sourceName}Source \033[0m ");
        } else {
            $sourceName = Str::replace('Source', '', $sourceName);

            $sourceFolder = app_path('Services/Sources');
            $categoryFolder = app_path('Services/Categories');
            $formatterFolder = app_path('Services/Formatters');
            $examplesFolder = app_path('Services/Examples');

            $sourceExample = File::get("$examplesFolder/ExampleSource.php");
            $categoryExample = File::get("$examplesFolder/ExampleCategories.php");
            $formatterExample = File::get("$examplesFolder/ExampleFormatter.php");

            File::put("{$sourceFolder}/{$sourceName}Source.php", Str::replace('Example', $sourceName, $sourceExample));
            File::put("{$categoryFolder}/{$sourceName}Categories.php", Str::replace('Example', $sourceName, $categoryExample));
            File::put("{$formatterFolder}/{$sourceName}Formatter.php", Str::replace('Example', $sourceName, $formatterExample));

            $this->info("Added new source: \033[47m\033[31m {$sourceName}Source \033[0m");
        }

    }
}
