<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Support\Facades\Hash;
use Cog\Contracts\Ban\Bannable as BannableContract;
use Cog\Laravel\Ban\Traits\Bannable;
use App\User;
use App\Category;
use App\Question;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Str;
use App\Http\Requests\StoreUserRequest;


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
        $role=1;
        return view('admin/users/index', [
            'users' => $users,
            'role' => $role
        ]);
    }
    public function adminIndex()
    {
        // admin only view all have adminspermission  

        $users = User::whereHas("roles", function ($q) {
            $q->where("name", "super-admin");
        })->get();
        $role=3;
        return view('admin/users/index', [
            'users' => $users,
            'role' => $role

        ]);
    }

    public function allUsers()
    {
        // admin only view all have adminspermission             
        $users = User::all();
        $role=0;
        return view('admin/users/index', [
            'users' => $users,
            'role' => $role
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

    public function store(StoreUserRequest $request)
    {
        // admin only create any userrole
        $user = new User;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password= Hash::make(Str::random(8));

        //$user->password =  Hash::make($request->password);

        if ($user->save()) {
            $user->assignRole($request->role);
        }
        //dd($request->role);
        if ($request->role == 'user')
        {$user->role = 1;}
        elseif ($request->role == 'professional')
        {$user->role = 2;}
        else {$user->role = 3;}
        $user->save();

        $token=app('auth.password.broker')->createToken($user);
        $user->sendPasswordResetNotification($token);
    
        if ($request->role == 'super-admin') {
            return redirect('/admins');
        } else {
            return redirect()->route('users.index');
        }
    }

    public function show()
    {
        //all roles can view user profile, permissions in blade
        $userId = request()->user;
        $user = User::find($userId);
        $categories = Category::all();
        $userId = Auth::id();
        $users = User::all()->where('role', '=', '1');
        $questions=Question::where('user_id',$userId)->orderBy('created_at', 'desc')->get();
        if (auth()->user()->hasPermissionTo('adminpermission')) {
            return view('admin/users/show', [
                'users' => $users,
                'categories' => $categories,
                'questions' => $questions,
                'user' => $user
            ]);
        } else {
            return view('users/show', [
                'users' => $users,
                'questions' => $questions,
                'categories' => $categories,
                'user' => $user

            ]);
        }
    }

    public function edit($id)
    {
        //admin and users can edit user profile, permissions in blade
        $user = User::findOrFail($id);
        $roles = Role::all()->pluck('name', 'id');
        $categories = Category::all();
        if (auth()->user()->hasPermissionTo('adminpermission')) {
            return view('admin.users.edit', [
                'user' => $user,
                'roles' => $roles
            ]);
        } elseif  (auth()->user()->role ==1) {
            return view('users/edit', [
                'user' => $user,
                'categories' => $categories
            ]);
        } else {
            return view('home',[
                'categories' => $categories
            ]);
        }
    }


    public function update(Request $request, $id)
    {
        //admin can edit any userRole, user can edit his profile, permissions in blade
        $categories = Category::all();
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
            $user->save();
             if ($user->role == '3') {
                return redirect()->route('users.adminIndex', [
                    'categories' => $categories
                ]); }
                elseif ($user->role == '1') {
                    return redirect()->route('users.index');

                } elseif  ($user->role == '2') {
                    return redirect()->route('professionals.index');
                }

            } 
        
         elseif  (auth()->user()->role==1) {
            $user->save();
            return redirect()->route('user.show', [
                'user' => $user,
                'categories' => $categories
            ]);
        }  elseif  (auth()->user()->role==2) {
            return redirect()->route('professional.show', [
                'user' => $user,
                'categories' => $categories
                ]);
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
                } elseif  ($user->role == '2') {
                    return redirect()->route('professionals.index');
                }
                elseif  ($user->role == '3') {
                    return redirect()->route('users.adminIndex');
                }
            } else {
                return response()->json([
                    'error' =>  'error, canit delete user'
                ]);
            }
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
