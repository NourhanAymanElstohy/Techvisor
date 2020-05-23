<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;
use App\Question;
use App\User;

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

    public function create(){
        return view('questions/create');
    }
    public function store(){
        $request=request();
        $userId = Auth::id();
        $question=$request->question;
        
        Question::create([
            "question"=> $question,
            "user_id"=>$userId,
            "state"=>$request->state,
        ]);
       
        return redirect()->route('questions.index');
    }
}
