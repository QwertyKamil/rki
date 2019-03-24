<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UsersAnswer extends Model
{
    protected $fillable = ['correct','question_id','answer_id','user_id','answer'];

    public function user()
    {
        return $this->belongsTo(User::class,'user_id','id');
    }

    public function question()
    {
        return $this->belongsTo(Question::class,'question_id','id');
    }
}
