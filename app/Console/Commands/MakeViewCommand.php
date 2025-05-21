<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;

class MakeViewCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:view {name}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Make Blade file in View';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        //get argument
        $argument = str_replace('.' , '/' , $this->argument('name'));
        // create full path with the name of view and add extension
        $fullPath = 'resources/views/'. $argument . '.blade.php';

        //check if folder exists , if not exist will make new dir
        $directory = dirname($fullPath);
        if(!file_exists($directory)){
            mkdir($directory,0777 , true);
        }

        //check blade file found or not
        if(File::exists($fullPath)){
            $this->error("This file {$fullPath} already exists !");
        }else{
            File::put($fullPath ,'');
            return $this->info('The File ' . $fullPath . ' Created Successfully');
        }


    }


}
