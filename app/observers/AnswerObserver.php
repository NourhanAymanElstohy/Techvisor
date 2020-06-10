<?php
namespace App\Observers;
use Illuminate\Support\Facades\Auth;
use App\Notifications\NewAnswer;
use App\Answer;
use App\User;

class AnswerObserver
{
    public function created(Answer $question)
    {
       
   
    }
}
?>