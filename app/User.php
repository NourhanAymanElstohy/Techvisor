<?php

namespace App;

use Cog\Laravel\Ban\Traits\Bannable;
use Cog\Contracts\Ban\Bannable as BannableContract;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;
use willvincent\Rateable\Rateable;
//use Illuminate\Contracts\Auth\Authenticatable;



class User extends Authenticatable implements BannableContract
{
    use Notifiable, HasRoles;
    use Bannable;
    use Rateable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'role', 'avatar', 'state', 'linkedin', 'github', 'other'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /* public function setPasswordAttribute($value)
    {
        if (!empty($value)) {
            $this->attributes['password'] = bcrypt($value);
        }
    } */

    /*  this one
    public function setPasswordAttribute($password){
        $this->attributes['password'] = Hash::needsRehash($password) ? Hash::make($password) : $password;
    } */

    /*   public function setPasswordAttribute($password)
{
    $this->attributes['password'] = \Hash::make($password);
} */



    public function categories()
    {
        return $this->belongsToMany('App\Category', 'category_professional');
    }
    public function questions()
    {
        return $this->hasMany('\App\Question');
    }
}
