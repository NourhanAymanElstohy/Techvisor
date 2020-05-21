<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\User;



class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {    //Role::create(['name' => 'admin']);
         //Role::create(['name' => 'professional']);
         //Role::create(['name' => 'user']);
         //Role::create(['name' => 'guest']); 
         //Permission::create(['name' => 'admin']);
         //Permission::create(['name' => 'professional']);
         //Permission::create(['name' => 'user']);
         //Permission::create(['name' => 'guest']);


         //$role = Role::findById(4);
         //$permission= Permission::findById(4);
         //$role->givePermissionTo($permission);


         //auth()->user()->assignRole('admin');
        //  auth()->user()->assignRole('user');
         //return  auth()->user()->can('admin');
         //auth()->user()->assignRole('professional');

         //return  User::role('admin')->get();
        //return  User::permission('admin')->get();









        return view('home');
    }
}
