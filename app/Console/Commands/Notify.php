<?php

namespace App\Console\Commands;

use App\Mail\MailController;
use http\Client\Curl\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;

class Notify extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'notify:email';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'notify users by email ';

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
        $users = User::select('email')->get();
        //$users = User::pluck('email')->toArray();
        $data = ['subject'=>'math','section'=>'three'];
        foreach ($users as $user){
            Mail::To($user)->send(new MailController($data));
        }
    }
}
