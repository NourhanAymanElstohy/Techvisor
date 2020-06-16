<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\User;
use App\Notifications\NewRate;
use Illuminate\Support\Facades\DB;

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
    protected $description = 'ask users to rate professionals who made meetings with them';

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
      
        $notifications = DB::table('notifications')->where('type','App\Notifications\NewZoom')->get();
        foreach($notifications as $notification){
            
            if(\Carbon\Carbon::now() > $notification->created_at && $notification->created_at > \Carbon\Carbon::now()->subMinutes(1)){
                // json_decode($n->data)->user_id==$id)
                
                $userId = json_decode($notification->data)->user_id ;
                $profId = json_decode($notification->data)->prof_id ;
                $user = User::find($userId);
                $prof = User::find($profId);
                $user->notify(new NewRate($user, $prof));
              
            }
        }
    }
}
