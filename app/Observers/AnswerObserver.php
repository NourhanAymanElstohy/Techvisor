<?php
namespace App\Observers;
use Illuminate\Support\Facades\Auth;
use App\Notifications\NewAnswer;
use App\Answer;
use App\User;

class QuestionObserver
{
    public function created(Answer $answer)
    {
      dd(jjjjjj) ;
    
        $logged=Auth::user();
        $user= $answer->question->user;
        $user->notify(new NewAnswer($logged, $answer));
    
    }
}
?>