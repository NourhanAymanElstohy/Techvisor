<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Question;

class QuestionController extends Controller
{
    //
    public function index(){
        $questions=Question::all();
        return view('questions/index',[
            'questions'=>$questions
        ]);
    }

    public function show(){
        $request = request();
        $questionId = $request->question;
        $question=Question::find($questionId);
        return view('questions/show',[
            'question'=>$question
        ]);   
    }

    
}
