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
        $prof=request()->prof;
        return view('questions/create',[
            'prof'=>$prof
        ]);
    }
    public function store(){
        $request=request();
        $userId = Auth::id();
        $question=$request->question;
        
        Question::create([
            "question"=> $question,
            "user_id"=>$userId,
            "state"=>$request->state,
            "prof_id"=>$request->prof
        ]);
        return redirect()->route('questions.index');
    }

    public function edit(){
        $request = request();
        $questionId = $request->question;
        $question=Question::find($questionId);
        return view('questions/edit',[
            'question'=>$question
        ]);

        
    }
    public function update(){
        $request=request();
        $question = Question::find($request->id);
        $question->question = $request->question;
        $question->state = $request->state;
        $question->save();
        return redirect()->route('questions.index');

    }

    public function destroy(){
        $request = request();
        $questionId = $request->question;
        Question::destroy($questionId);

        return redirect()->route('questions.index');

    }
}
