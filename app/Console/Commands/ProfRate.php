<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class rate extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'prof:rate'; //any name

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

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
     * @return mixed
     */
    public function handle()
    {
        //logic
        // $users = User::all();
        // // $notifications = Notification::where('type','=','App\Notifications\NewZoom');
        // foreach($users as $user){
        //     foreach($user->notifications as $notification) {
        //         if($notification->type=='App\Notifications\NewZoom'){
        //             dd($notification->data['user_name']);
        //         }

        //     } 
        // }        
        echo ("gggggg");
        
    }
}
