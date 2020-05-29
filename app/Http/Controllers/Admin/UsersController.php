<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Spatie\Permission\Traits\HasRoles;

use App\User;


class UsersController extends Controller
{
    use  HasRoles;


    public function __construct()
{
    //$this->middleware(['role:super-admin'],['only' => ['create', 'store']]);
    //$this->middleware(['role:user'],['only' => 'index']);

}
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users=User::all();
        return view('admin/users/index',[
            'users' => $users
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //$users  = DB::select('select * from users where role_id = ?', [2]);
        //$roles = DB::table('roles')->pluck('name','id');
        $roles = Role::all()->pluck('name', 'id');
        return view('admin/users/create',[
            'roles' => $roles
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) 
    {
       $user = new User;
       $user->name = $request->name;
       $user->email = $request->email;
       $user->password =  Hash::make($request->password);

       if ($user->save()) {
           $user->assignRole($request->role);

           return redirect()->route('admin.users.index');
       }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {   $request = request();
        $userId = $request->user;
        $user = User::find($userId);
        
        return view('admin.users.show', [
             'user' => $user
                     ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user =User::findOrFail($id);
        $roles = Role::all()->pluck('name', 'id');
        return view('admin.users.edit', [
            'user' => $user,
            'roles' =>$roles

        ]);


    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $user =User::findOrFail($id);
        $user->name = $request->name;
        $user->email = $request->email;

       if ($request->password !=null) {
           $user->password=$request->password;
    }
        $user->syncRoles($request->role);
        $user->save();
        return redirect()->route('admin.users.index');

}

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user =User::findOrFail($id);
        $user->removeRole($user->roles->implode('name', ', '));
        if($user->delete())
        {
            return redirect()->route('admin.users.index');
        }
        else
        {
            return response()->json([
                'error' =>  'error, canit delete user'
            ]);
        }
    }

   
}
