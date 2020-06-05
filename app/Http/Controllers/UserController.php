<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Support\Facades\Hash;
//use Illuminate\Http\Client\Request;
use Cog\Contracts\Ban\Bannable as BannableContract;
use Cog\Laravel\Ban\Traits\Bannable;
use App\User;
use App\Category;
use App\Question;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;


class UserController extends Controller
{

    public function __construct()
    {
        //$this->middleware(['role:super-admin'],['only' => ['create', 'store']]);
        //$this->middleware(['role:user'],['only' => 'index']);

    }


    public function index()
    {
        // admin only view all have userspermission             
        $users = User::whereHas("roles", function ($q) {
            $q->where("name", "user");
        })->get();
        return view('admin/users/index', [
            'users' => $users
        ]);
    }
    public function adminIndex()
    {
        // admin only view all have adminspermission             
        $users = User::whereHas("roles", function ($q) {
            $q->where("name", "super-admin");
        })->get();
        return view('admin/users/index', [
            'users' => $users
        ]);
    }

    public function allUsers()
    {
        // admin only view all have adminspermission             
        $users = User::all();
        return view('admin/users/index', [
            'users' => $users
        ]);
    }


    public function create()
    {
        // admin only create any userrole
        $roles = Role::all()->pluck('name', 'id');
        return view('admin/users/create', [
            'roles' => $roles
        ]);
    }

    public function store(Request $request)
    {
        // admin only create any userrole
        $user = new User;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password =  Hash::make($request->password);

        if ($user->save()) {
            $user->assignRole($request->role);
        }
        if ($request->role == 'super-admin') {
            return redirect('/admins');
        } else {
            return redirect()->route('users.index');
        }
    }

    public function show()
    {
        //all roles can view user profile, permissions in blade
        $categories = Category::all();
        // $userId = request()->user;
        // $user = User::find($userId);
        $userId = Auth::id();
        $users = User::all()->where('role', '=', '1');
        $questions=Question::where('user_id',$userId)->get();
        if (auth()->user()->hasPermissionTo('adminpermission')) {
            return view('users.show', [
                'users' => $users,
                'categories' => $categories,
                'questions' => $questions
            ]);
        } else {
            return view('users/show', [
                'users' => $users,
                'questions' => $questions,
                'categories' => $categories,
            ]);
        }
    }

    public function edit($id)
    {
        //admin and users can edit user profile, permissions in blade
        $user = User::findOrFail($id);
        $roles = Role::all()->pluck('name', 'id');
        if (auth()->user()->hasPermissionTo('adminpermission')) {
            return view('admin.users.edit', [
                'user' => $user,
                'roles' => $roles
            ]);
        } elseif (auth()->user()->hasPermissionTo('userpermission')) {
            return view('users/edit', [
                'user' => $user,
            ]);
        } else {
            return view('home');
        }
    }


    public function update(Request $request, $id)
    {
        //admin can edit any userRole, user can edit his profile, permissions in blade
        $user = User::findOrFail($id);
        $user->name = $request->name;
        $user->email = $request->email;
        if ($request->password != null) {
            $user->password = bcrypt($request->password);
        }
        if ($request->hasFile('avatar')) {
            $avatar = $request->file('avatar');
            $filename = time() . '.' . $avatar->getClientOriginalExtension();
            Image::make($avatar)->resize(300, 300)->save(public_path('/uploads/avatars/' . $filename));

            $user->avatar = $filename;
            $user->save();
        }
        if (auth()->user()->hasPermissionTo('adminpermission')) {
            $user->syncRoles($request->role);
            // dd($user->role);
            if ($user->role == '3') {
                return redirect('/admins');
            } else {
                return redirect()->route('users.index');
            }
            $user->save();
        } elseif (auth()->user()->hasPermissionTo('userpermission')) {
            $user->save();
            return redirect()->route('user.show', [
                'user' => $user
            ]);
        } else {
            return view('home');
        }
    }

    public function destroy($id)
    {
        //here admin can delete any userRole and user can delete here profile
        $user = User::findOrFail($id);
        if (auth()->user()->hasPermissionTo('adminpermission')) {
            $user->removeRole($user->roles->implode('name', ', '));
            if ($user->delete()) {
                if ($user->role == '1') {
                    return redirect()->route('users.index');
                } else {
                    return redirect()->route('users.adminIndex');
                }
            } else {
                return response()->json([
                    'error' =>  'error, canit delete user'
                ]);
            }
        }
        if (auth()->user()->hasPermissionTo('userpermission')) {
            $request = request();
            $userlId = $request->user;
            User::destroy($userlId);
            return redirect()->route('home');
        }
    }

    public function banned()
    {
        //here admin only can ban any user
        $userId = request()->user;
        $user = User::find($userId);
        if ($user->isNotBanned()) {
            $user->ban();
        } else {
            $user->unban();
        }
        return redirect()->route('users.index', [
            'user' => $user
        ]);
    }
}
