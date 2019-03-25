<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','role',
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

    public function isAdmin()
    {
        return $this->role == 1;
    }

    public function answers()
    {
        return $this->hasMany(UsersAnswer::class,'user_id','id');
    }

    public function getAnswers (Contest $contest)
    {
        $q_ids = [];
        foreach ($contest->parts as $part) {
            $q_ids = array_merge($q_ids,$part->questions->pluck('id')->toArray());
        }

        return $q_ids?$this->answers()->whereIn('question_id',$q_ids)->get():[];

    }
}
