<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Traits\HasRoles;
use App\User;


class ProfessionalController extends Controller
{
    public function index()
    {
       $users=User::whereHas("roles", function($q){ $q->where("name", "professional"); })->get();
        //dd($users);
        return view('admin/professional/index',[
        'users' => $users
            ]);
        }


       
        public function show(Request $request)
        {   $userId = Auth::id();
            $user=User::find($userId);
            return view('admin.users.show',[
                'user' => $user
            ]);
        }    
        
        
        public function edit(){
       
            $userId = Auth::id();
            $user=User::find($userId);
            return view('users/edite2',[
                'user'=>$user
            ]);
    
            
        }
        public function update(){
            $request=request();
            $user = User::find($request->id);
            $user->status = $request->status;
            $user->save();
            return redirect('/');
    
        }
        
}
