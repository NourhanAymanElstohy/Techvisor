<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;
use App\User;

class UserController extends Controller
{
    //
    public function edit(){
       
        $userId = Auth::id();
        $user=User::find($userId);
        return view('users/edit',[
            'user'=>$user
        ]);

        
    }
    public function update(){
        $request=request();
        $user = User::find($request->id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->save();
        return redirect('/');

    }
}
