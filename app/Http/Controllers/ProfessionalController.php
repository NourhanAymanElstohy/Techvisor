<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Support\Facades\Hash;
use App\User;
use App\Category;
use App\Question;
use Intervention\Image\Facades\Image;






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
        $userId = request()->professional;
        $user = User::find($userId);
        $categories = Category::all();
        $profs = User::all()->where('role', '=', '2');
        $users = User::all()->where('role', '=', '1');
        $questions = Question::all();
        if (auth()->user()->hasPermissionTo('adminpermission')) {
            return view('admin.professionals.show', [
                 'user' => $user
            ]);
        } else {
            return view('professionals/show', [ 
                'profs' => $profs,
                'users' => $users,
                'categories' => $categories,
                'questions' => $questions,
                'user' => $user
            ]);
        }
    }

    public function edit()
    {
        //professional can edit his  profile
        if (auth()->user()->role==2) {
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
        if (auth()->user()->role==2) {
            $request = request();
            $professional = User::find($request->professional);

            if ($request->hasFile('avatar')) {
                $avatar = $request->file('avatar');
                $filename = time() . '.' . $avatar->getClientOriginalExtension();
                Image::make($avatar)->resize(300, 300)->save(public_path('/uploads/avatars/' . $filename));

                $professional->avatar = $filename;
                $professional->save();
            }
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
        if (auth()->user()->role==2) {
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
    public function banned()
    {
        //here admin only can ban any prof
        $profId = request()->professional;
        $prof = User::find($profId);
        if ($prof->isNotBanned()) {
            $prof->ban();
        } else {
            $prof->unban();
        }
        return redirect()->route('professionals.index', [
            'prof' => $prof
        ]);
    }
}
