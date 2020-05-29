<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = ['name'];

    public function prof()
    {
        return $this->belongsToMany('App\User', 'category_professional')->wherePivotwherePivot('role', '2');
    }
}
