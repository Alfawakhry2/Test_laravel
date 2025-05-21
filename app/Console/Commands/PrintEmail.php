<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;

class PrintEmail extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'print:users';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'This command only for print my email';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        // return $this->info('Your email is : ' . $this->argument('email')) ;
        // return $this->error('Unknown Error');

        // $this->table(
        //     ['#' , 'Full Name' , 'Email'],
        //     User::all(['id' , 'name' , 'email'])->toArray(),
        // );

        //create progress bar
        $users = User::all();
        $bar = $this->output->createProgressBar(count($users));
        $bar->start();
        foreach($users as $user){
            $this->info($user->name);
            $this->newLine();
            $bar->advance();
        }
        $bar->finish();

    }
}
