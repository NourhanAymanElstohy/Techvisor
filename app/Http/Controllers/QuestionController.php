<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

use App\Notifications\NewZoom;
use App\Question;
use App\Category;
use App\User;

class QuestionController extends Controller
{

    public function index()
    {
        $userId = Auth::id();
        $user = User::find($userId);
        $questions = Question::all();
        if (auth()->user()->hasPermissionTo('adminpermission')) {
            return view('admin/questions/index', [
                'questions' => $questions,
                
            ]);
        } else {
            return view('questions/index', [
                'questions' => $questions,
            ]);
        }
    }

    public function show()
    {
        $request = request();
        $questionId = $request->question;
        $question = Question::find($questionId);
        if (auth()->user()->hasPermissionTo('adminpermission')) {
            return view('admin/questions/show', [
                'question' => $question,
            ]);
        } else {
            return view('questions/show', [
                'question' => $question
            ]);
        }
    }


    public function create()
    {
        $prof = request()->prof;
        $cat = request()->cat;
        $cats = Category::all();
        if (auth()->user()->hasPermissionTo('adminpermission')) {
            $users = User::where('role', 2)->get();

            return view('admin/questions/create', [
                'prof' => $prof,
                'cat' => $cat,
                'users' => $users,
                'cats' => $cats

            ]);
        } else {
            return view('questions/create', [
                'prof' => $prof,
                'cat' => $cat,
                'cats' => $cats
            ]);
        }
    }
    public function store()
    {
        $request = request();
        $userId = Auth::id();
        if ($request->prof) {
            Question::create([
                "question" => $request->question,
                "user_id" => $userId,
                "state" => "private",
                "prof_id" => $request->prof,
                "category_id" => $request->cat
            ]);
        } else {
            Question::create([
                "question" => $request->question,
                "user_id" => $userId,
                "state" => "public",
                "category_id" => $request->cat

            ]);
        }
        if (auth()->user()->hasPermissionTo('adminpermission')) {
            return redirect()->route('questions.index');
        } elseif (auth()->user()->hasPermissionTo('professionalpermission')) {
            return redirect()->route('professional.show', ['professional' => $userId]);
        } else {
            return redirect()->route(
                'user.show',
                ['user' => $userId]
            );
        }
    }

    public function edit()
    {
        $request = request();
        $users = User::where('role', 2)->get();
        $questionId = $request->question;
        $question = Question::find($questionId);
        if (auth()->user()->hasPermissionTo('adminpermission')) {
            return view('admin/questions/edit', [
                'question' => $question,
                'users' => $users
            ]);
        } else {
            return view('questions/edit', [
                'question' => $question,
                'users' => $users
            ]);
        }
    }
    public function update()
    {
        $request = request();
        $question = Question::find($request->id);
        $question->question = $request->question;
        $question->state = $request->state;
        $question->save();
        return redirect('/');
    }

    public function destroy()
    {
        $request = request();
        $questionId = $request->question;
        Question::destroy($questionId);

        return redirect()->route('questions.index');
    }
    public function zoom()
    {
        $request = request();
        $user = Auth::user();
        $userId = $request->zoom;
        $prof = User::find($userId);
        $join_url = "ff";
        $prof->notify(new NewZoom($user, $join_url));
        return redirect('/rate/' . $userId);
    }
    public function search()
    {
        $request = request();
        $search = $request->search;
        $categories = Category::all();
        $questions = Question::search($search)->get();
        return view('home', [
            'questions' => $questions,
            'categories' => $categories,
        ]);
    }
}
