<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\User;
use App\Notifications\NewRate;

class ProfRate extends Command
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
        $users = User::all();
         
        foreach($users as $user){
             foreach($user->notifications as $notification) {
                if($notification->type=='App\Notifications\NewZoom'){
                    $notification->created_at;
                       if(\Carbon\Carbon::now()>$notification->created_at && $notification->created_at > \Carbon\Carbon::now()->subHours(1)){
                        $userId=$notification->data["user_id"];
                        $profId=$notification->data["prof_id"];
                        $user=User::find($userId);
                        $prof=User::find($profId);
                        $user->notify(new NewRate($user,$prof));
        
                       }
                    
                   
                     
                }
            }
        }     
       
        
    }
}
