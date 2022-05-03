<?php

namespace App\Commands;

use Illuminate\Support\Facades\Storage;
use Illuminate\Console\Scheduling\Schedule;
use LaravelZero\Framework\Commands\Command;

class MovieListCommand extends Command
{
    protected $signature = 'movie:list';

    protected $description = 'Movie List';

    public function handle()
    {
        $file_name = 'movie-list.txt';

        $fileContent = '';
        if (Storage::exists($file_name)) {
            $fileContent = Storage::get($file_name);
        }
        $lists = explode("\r\n", $fileContent);
        dd($lists);
    }
}
