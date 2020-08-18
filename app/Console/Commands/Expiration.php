<?php

namespace App\Console\Commands;

use App\User;
use Illuminate\Console\Command;

class Expiration extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'user:expired';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'expire user every 5 minutes automatically';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $users = User::where('expired',0)-> get();  //collection of users
        foreach ($users as $user){
            $user -> update(['expired'=> 1]);
        }
    }
}
