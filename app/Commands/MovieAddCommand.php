<?php

namespace App\Commands;

use Illuminate\Console\Scheduling\Schedule;
use LaravelZero\Framework\Commands\Command;
use Illuminate\Support\Facades\Storage;

class MovieAddCommand extends Command
{
    /**
     * The signature of the command.
     *
     * @var string
     */
    protected $signature = 'movie:add {name?}';

    protected $name = '';

    protected $description = 'Save movie into file';

    public function handle()
    {
        $file_name = 'movie-list.txt';
        $this->checkName();

        $fileContent = '';
        if (Storage::exists($file_name)) {
            $fileContent = Storage::get($file_name);
            $fileContent .= "\r\n";
        }
        $fileContent .= $this->name;
        Storage::put($file_name, $fileContent);
        $this->notify("Success", "Movie Added", "icon.png");
    }


    protected function checkName(): void
    {
        if (empty($this->argument('name'))) {
            $this->name =   $this->ask('Please Enter Movie Name');
        } else {
            $this->name = $this->argument('name');
        }
    }
}
