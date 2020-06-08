<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
        
            Answer::create([
                "answer" => $request->answer,
                "user_id" => $userId,
                "question_id" => $request->question_id
            ]);
          return Redirect::back('home' );
        
    }

}
