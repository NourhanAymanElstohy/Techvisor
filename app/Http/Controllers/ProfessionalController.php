<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Support\Facades\Hash;
use App\User;
use App\Category;





class ProfessionalController extends Controller
{
    //admin only can view all professionals
    public function index()
    {
        $users = User::whereHas("roles", function ($q) {
            $q->where("name", "professional");
        })->get();
        return view('admin/professionals/index', [
            'users' => $users
        ]);
    }



    public function show()
    {
        //all roles can view professional profile, permissions in blade
        $categories = Category::all();
        $userId = request()->prof;
        $user = User::find($userId);
        if (auth()->user()->hasPermissionTo('adminpermission')) {
            return view('admin.professionals.show', [
                'user' => $user
            ]);
        } else {
            return view('professionals/show', [
                'user' => $user,
                'categories' => $categories
            ]);
        }
    }

    public function edit()
    {
        //professional can edit his  profile
        if (auth()->user()->hasPermissionTo('professionalpermission')) {
            $request = request();
            $professionalId = $request->professional;
            $professional = User::find($professionalId);
            return view('professionals/edit', [
                'professional' => $professional
            ]);
        }
    }

    public function update()
    {
        //admin and professionals can edit professional profile, permission in blade
        $categories = Category::all();
        if (auth()->user()->hasPermissionTo('professionalpermission')) {
            $request = request();
            $professional = User::find($request->professional);
            //dd($professional);
            $professional->name = $request->name;
            $professional->email = $request->email;
            $professional->save();
            return redirect()->route('professional.show', [
                'professional' => $professional,
                'categories' => $categories

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
        $user->status = !$user->status;
        if ($user->save()) {
            return redirect()->route('home');
        } else {
            return redirect()->route('professionals.changestatus');
        }
    }
}
