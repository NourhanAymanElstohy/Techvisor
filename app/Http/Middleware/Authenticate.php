<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;

use App\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Auth;


class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string|null
     */
    protected function redirectTo($request)
    {
        if (! $request->expectsJson()) {
            return route('login');
        }
    }
}

       /*  if(auth()->user()->role==2)
        {
            if(auth()->user()->first_time_login == true || $user->first_time_login == 1)
            {  
                return redirect()->route('profcat');  

             $user->first_time_login = false;
             $user->save();
             //return redirect()->to('/users/edit');
             //return redirect()->route('home');  
        
            }  
        } 

        if(auth()->user()->role==1)
        {
            return redirect()->route('home');  
        }
    }   
 */
    