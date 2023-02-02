<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class AddNewsSourceCommand extends Command
{
    private string $sourceFolder;
    private string $categoryFolder;
    private string $formatterFolder;
    private string $examplesFolder;
    private string $sourceExample;
    private string $categoryExample;
    private string $formatterExample;

    public function __construct()
    {
        parent::__construct();

        $this->sourceFolder = app_path('Services/Sources');
        $this->categoryFolder = app_path('Services/Categories');
        $this->formatterFolder = app_path('Services/Formatters');
        $this->examplesFolder = app_path('Services/Examples');

        $this->sourceExample = File::get("$this->examplesFolder/ExampleSource.php");
        $this->categoryExample = File::get("$this->examplesFolder/ExampleCategories.php");
        $this->formatterExample = File::get("$this->examplesFolder/ExampleFormatter.php");
    }

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
    public function handle(): int
    {
        $sourceName = $this->argument('name');
        $checkName = Str::endsWith($sourceName, 'Source');
        if (!$checkName) {
            $this->error(" News source must end with \033[47m\033[31m Source \033[0m, for example \033[47m\033[31m {$sourceName}Source \033[0m ");
        } else {
            $sourceName = Str::replace('Source', '', $sourceName);

            File::put("{$this->sourceFolder}/{$sourceName}Source.php", Str::replace('Example', $sourceName, $this->sourceExample));
            File::put("{$this->categoryFolder}/{$sourceName}Categories.php", Str::replace('Example', $sourceName, $this->categoryExample));
            File::put("{$this->formatterFolder}/{$sourceName}Formatter.php", Str::replace('Example', $sourceName, $this->formatterExample));

            $this->info("Added new source: \033[47m\033[31m {$sourceName}Source \033[0m");
        }

    }
}
