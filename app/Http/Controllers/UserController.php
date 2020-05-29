<?php

namespace App\Http\Controllers;

use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Traits\HasRoles;
use App\User;
use Illuminate\Http\Client\Request;

class UserController extends Controller
{

    public function index()
    {
        $users = User::whereHas("roles", function ($q) {
            $q->where("name", "user");
        })->get();
        //dd($users);
        return view('admin/user/index', [
            'users' => $users
        ]);
    }
    //
    public function edit()
    {

        $userId = Auth::id();
        $user = User::find($userId);
        return view('users/edit', [
            'user' => $user
        ]);
    }
    public function show(Request $request)
    {
        $userId = $request->prof;
        $user = User::find($userId);

        if ($user->hasPermissionTo('adminpermission')) {
            return view('admin.users.show', [
                'user' => $user
            ]);
        }
        return view('professionals/show', [
            'prof' => $user,
        ]);
    }
    public function update()
    {
        $request = request();
        $user = User::find($request->id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->save();
        return redirect('/');
    }
}
