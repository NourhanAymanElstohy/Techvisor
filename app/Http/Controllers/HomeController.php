<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Category;
use App\Question;
use App\User;



class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $user = Auth::user();

        return view('home');
    }

    public function adminHome()
    {
        $categories = Category::all();
        $questions=Question::where('state','=','public')->orderBy('created_at', 'desc')->get();

        $request = request();
        $userId = Auth::id();
        $user = User::find($userId);
        return view('home', [
            'user' => $user,
            'categories' => $categories,
            'questions'=>$questions
        ]);
    }


    public function home()
    {
        $categories = Category::all();
        $questions=Question::where('state','=','public')->orderBy('created_at', 'desc')->get();
        $userId = Auth::id();
        $user = User::find($userId);
        $professionals=User::where('role','=','2')->take(5)->orderBy('rating_average', 'desc')->get();

        return view('home', [
            'user' => $user,
            'categories' => $categories,
            'questions'=>$questions,
            'professionals'=>$professionals,
        ]);
    }
}
