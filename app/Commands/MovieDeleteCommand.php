<?php

namespace App\Commands;

use Illuminate\Support\Facades\Storage;
use Illuminate\Console\Scheduling\Schedule;
use LaravelZero\Framework\Commands\Command;

class MovieDeleteCommand extends Command
{

    protected $signature = 'movie:delete';

    protected $description = 'Movie Delete From List';

    public function handle()
    {
        $file_name = 'movie-list.txt';

        $fileContent = '';
        if (Storage::exists($file_name)) {
            $fileContent = Storage::get($file_name);
        }
        $lists = explode("\r\n", $fileContent);

        $option = $this->menu('Select Movie To Delete',  $lists)->open();

        unset($lists[$option]);

        Storage::put($file_name, implode("\r\n", $lists));

        $this->notify("Success", "Movie Deleted", "icon.png");
    }
}
