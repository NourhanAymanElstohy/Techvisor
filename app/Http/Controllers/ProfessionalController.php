<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Support\Facades\Hash;
use App\User;




class ProfessionalController extends Controller
{
    //admin only can view all professionals
    public function index() 
    {
       $users=User::whereHas("roles", function($q){ $q->where("name", "professional"); })->get();
        return view('admin/professionals/index',[
        'users' => $users
            ]); 
        }


       
        public function show()
        {       
            //all roles can view professional profile, permissions in blade
            $userId = request()->prof;
            $user=User::find($userId);
            if (auth()->user()->hasPermissionTo('adminpermission')) {
                return view('admin.professionals.show', [
                    'user' => $user
                ]);
            } else {
                return view('professionals/show', [
                    'user' => $user,
                ]);
        }    
    }
        
    public function edit()
    {               
        //professional can edit his  profile
        if (auth()->user()->hasPermissionTo('professionalpermission')){
        $request = request();
        $professionalId = $request->professional;
        $professional=User::find($professionalId);
        return view('professional/edit',[
            'professional'=>$professional
        ]);
        }
    }

        public function update()
        {
            //admin and professionals can edit professional profile, permission in blade
            if (auth()->user()->hasPermissionTo('professionalpermission')) {
                $request=request();
                $professional = User::find($request->id);
                $professional->name = $request->name;
                $professional->email = $request->email;
                $professional->status = $professional->status;
                $professional->save();
                 return redirect()->route('professional.show',[
                  'professional' => $professional
        ]);
        }
    }


    public function destroy()
    {  
       // here only professionals can delete profile             
      if (auth()->user()->hasPermissionTo('professionalpermission')) {
      $user = User::findOrFail($id);
      $request = request();
      $professionalId = $request->professional;
      User::destroy($professionalId);

      return redirect()->route('home');
      } 
    }      
    
    public function changeStatus($id)
    {  
      $user = User::findOrFail($id);
      //dd($user);
      $user->status =! $user->status;
      if ($user->save()){
        return redirect()->route('style.home');
    } else {
        return redirect()->route('professionals.changestatus');
      } 
         
        
}
}