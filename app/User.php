<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'username', 'name', 'email', 'password',
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


    public function gravatar($size = 150){
        return  "https://www.gravatar.com/avatar/" . md5( strtolower( trim( $this->email ) ) ) . "?d=mp&s=" . $size;
    }

    //Relasi ke post table
    public function posts(){
        return $this->hasMany(Post::class);
    }

    public function isAdmin(){
        return $this->username == 'rahmatrh';
    }
}
