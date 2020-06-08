<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Notifications\NewAnswer;

use App\Answer;

class AnswerController extends Controller
{
    public function create(){
        $question=request()->question;
        return view('create');

    }
    public function store()
    {
        $request = request();
        $userId = Auth::id();
        
            $answer=Answer::create([
                "answer" => $request->answer,
                "user_id" => $userId,
                "question_id" => $request->question_id
            ]);
            $logged=Auth::user();
            $user= $answer->question->user;
            $user->notify(new NewAnswer($logged, $answer));
          return redirect('home' );
        
    }
    public function show()
    {
        $request = request();
        $answerId = $request->answer;
        $answer = Answer::find($answerId);
     
            return view('answers/show', [
                'answer' => $answer
            ]);
        
    }

}
