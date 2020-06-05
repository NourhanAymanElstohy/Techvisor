<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = ['name'];

    public function profs()
    {
        return $this->belongsToMany('App\User', 'category_professional');
    }
}
