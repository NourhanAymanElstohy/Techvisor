<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

use App\Notifications\NewZoom;
use App\Question;
use App\User;

class QuestionController extends Controller
{

    public function index()
    {
        $questions = Question::all();
        return view('questions/index', [
            'questions' => $questions
        ]);
    }

    public function show()
    {
        $request = request();
        $questionId = $request->question;
        $question = Question::find($questionId);
        return view('questions/show', [
            'question' => $question
        ]);
    }

    public function create()
    {
        $prof = request()->prof;
        if (!$prof) {
            $users = User::where('role', 2)->get();
            return view('questions/create', [
                'prof' => $prof,
                'users' => $users
            ]);
        } else {
            return view('questions/create', [
                'prof' => $prof
            ]);
        }
    }
    public function store()
    {
        $request = request();
        $userId = Auth::id();
        // $question = $request->question;

        Question::create([
            "question" => $request->question,
            "user_id" => $userId,
            "state" => "private",
            // "prof_id" => $request->prof
        ]);

        if (auth()->user()->hasPermissionTo('adminpermission')) {
            return redirect()->route('questions.index');
        } else {
            return redirect()->route('professionals.show');
        }
    }

    public function edit()
    {
        $request = request();
        $users = User::where('role', 2)->get();
        $questionId = $request->question;
        $question = Question::find($questionId);
        return view('questions/edit', [
            'question' => $question,
            'users' => $users
        ]);
    }
    public function update()
    {
        $request = request();
        $question = Question::find($request->id);
        $question->question = $request->question;
        $question->state = $request->state;
        $question->save();
        return redirect()->route('questions.index');
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
        $prof->notify(new NewZoom($user));
    }
}
