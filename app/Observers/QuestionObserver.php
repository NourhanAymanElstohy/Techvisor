<?php
namespace App\Observers;

use App\Notifications\NewQuestion;
use App\Question;
use App\User;

class QuestionObserver
{
    public function created(Question $question)
    {
        $user = User::find(5);
       
        $user->notify(new NewQuestion($user, $question));
        
    }
}
?>