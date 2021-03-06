<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    protected $fillable = ['name','text','type','contest_part_id','weight'];

    public function answers()
    {
        return $this->hasMany(Answer::class,'question_id','id');
    }
}
