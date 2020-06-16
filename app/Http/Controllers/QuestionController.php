<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

use App\Notifications\NewZoom;
use App\Question;
use App\Category;
use App\User;
use App\Answer;
use App\Http\Requests\StoreQuestionRequest;
use App\Http\Requests\UpdateQuestionRequest;
use MacsiDigital\Zoom\Facades\Zoom;
use Illuminate\Support\Facades\DB;


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
        $flag = "show";
        $questionId = $request->question;
        $question = Question::find($questionId);
        $categories = Category::all();
        if ($question) {
            if (auth()->user()->hasPermissionTo('adminpermission')) {
                return view('admin/questions/show', [
                    'question' => $question,
                ]);
            } else {
                return view('home2', [
                    'question' => $question,
                    'categories' => $categories,
                    'flag' => $flag
                ]);
            }
        } else {
            $flag = "not_found";
            return view('home2', [

                'categories' => $categories,
                'flag' => $flag
            ]);
        }
    }


    public function create()
    {
        $prof = request()->prof;
        $cat = request()->cat;
        $flag = 'create';

        $cats = Category::all();
        $categories = Category::all();
        if (auth()->user()->hasPermissionTo('adminpermission')) {
            $users = User::where('role', 2)->get();

            return view('admin/questions/create', [
                'prof' => $prof,
                'cat' => $cat,
                'users' => $users,
                'cats' => $cats

            ]);
        } else {
            return view('home2', [
                'flag' => $flag,
                'prof' => $prof,
                'cat' => $cat,
                'cats' => $cats,
                'categories' => $categories,

            ]);
        }
    }
    public function store(StoreQuestionRequest $request)
    {

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
            return redirect('/');
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
        $flag = 'edit';
        $users = User::where('role', 2)->get();
        $cats = Category::all();
        $categories = Category::all();

        $questionId = $request->question;
        $question = Question::find($questionId);
        if (auth()->user()->hasPermissionTo('adminpermission')) {
            return view('admin/questions/edit', [
                'question' => $question,
                'users' => $users,
                'cats' => $cats
            ]);
        } else {
            return view('home2', [
                'flag' => $flag,
                'question' => $question,
                'users' => $users,
                'cats' => $cats,
                'categories' => $categories
            ]);
        }
    }
    public function update(UpdateQuestionRequest $request)
    {
        $question = Question::find($request->id);
        $question->question = $request->question;
        $question->state = $request->state;
        $question->prof_id = $request->prof;
        $question->category_id = $request->cat;
        $question->save();
        if (auth()->user()->hasPermissionTo('adminpermission')) {
            return redirect()->route('questions.index');
        } else {
            return redirect('/');
        }
    }

    public function destroy()
    {
        $request = request();
        $questionId = $request->question;
        Question::destroy($questionId);
        Answer::where('question_id', $questionId)->delete();
        $notifications = DB::table('notifications')->get();
        foreach ($notifications as $n) {
            if (property_exists(json_decode($n->data), 'question_id')) {
                if (json_decode($n->data)->question_id == $questionId) {
                    DB::table('notifications')->where('id', $n->id)->delete();
                }
            }
        }
        if (auth()->user()->hasPermissionTo('adminpermission')) {
            return redirect()->route('questions.index');
        } else {
            return redirect('/');
        }
    }
    public function zoom()
    {
        $request = request();
        $user = Auth::user();
        $userId = $request->zoom;
        $prof = User::find($userId);

        $meeting = Zoom::user()->find('techvisor.consulting@gmail.com')->meetings()->create(['topic' => 'Meeting With ' . $prof->name]);
        $join_url = $meeting->join_url;

        $prof->notify(new NewZoom($user, $join_url, $prof));
        return view('/zoom_url', [
            'meeting' => $meeting
        ]);

        // }
    }
    public function search()
    {
        $request = request();
        $search = $request->search;
        $categories = Category::all();
        $questions = Question::search($search)->get();
        $professionals=User::where('role','=','2')->take(5)->orderBy('rating_average', 'desc')->get();

        return view('home', [
            'questions' => $questions,
            'categories' => $categories,
            'professionals'=>$professionals,
        ]);
    }
}
