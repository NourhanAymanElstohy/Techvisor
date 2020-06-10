<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;

class Question extends Model
{
    use Searchable;
    //
    protected $fillable = [
        'question',
        'user_id',
        'state',
        'prof_id',
        'category_id'
    ];
    public function user()
    {
        return $this->belongsTo('App\User');
    }
    public function answers()
    {
        return $this->hasMany('App\Answer');
    }
    public function category()
    {
        return $this->belongsTo('App\Category');
    }
   
    public function prof()
    {
        return $this->belongsTo('App\User', 'prof_id')->where('role', '2');
    }
    public function searchableAs()
    {
        return 'question';
    }
}
