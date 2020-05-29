<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    //
    protected $fillable = [
        'question',
        'user_id',
        'answer_id',
        'state',
        'prof_id'
    ];
    public function user()
    {
        return $this->belongsTo('App\User');
    }
    public function answer()
    {
        return $this->belongsTo('App\Answer');
    }
    public function prof()
    {
        return $this->belongsTo('App\User', 'prof_id')->where('role', '2');
    }
}
