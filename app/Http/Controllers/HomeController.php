<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Category;
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
    {    
        $user = Auth::user();

        return view('home');
    }

    public function adminHome()
    {
        $categories = Category::all();           
        $request=request();
        $userId = Auth::id();
        $user = User::find($userId);
        return view('style/home', [
            'user' => $user,
            'categories' => $categories
        ]);
    }


    public function home()
    {
        $categories = Category::all();           
        $request=request();
        $userId = Auth::id();
        $user = User::find($userId);
        return view('style/home', [
            'user' => $user,
            'categories' => $categories
        ]);
    }
} 
