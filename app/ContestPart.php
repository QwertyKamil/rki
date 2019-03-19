<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ContestPart extends Model
{
    protected $fillable = ['name','contest_id'];

    public function questions()
    {
        return $this->hasMany(Question::class,'contest_part_id','id');
    }
}
