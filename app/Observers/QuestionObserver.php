<?php
namespace App\Observers;
use Illuminate\Support\Facades\Auth;
use App\Notifications\NewQuestion;
use App\Question;
use App\User;

class QuestionObserver
{
    public function created(Question $question)
    {
       
    if ($question->prof){
        $logged=Auth::user();
        $user= $question->prof;
        $user->notify(new NewQuestion($logged, $question));
    }
    }
}
?>