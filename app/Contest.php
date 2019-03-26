<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contest extends Model
{
    protected $fillable = ['name','token',];

    public function parts()
    {
        return $this->hasMany(ContestPart::class,'contest_id','id');
    }

    public function questions()
    {
        $return = [];
        foreach ($this->parts as $part) {
            $return = array_merge($return,$part->questions->pluck('id')->toArray());
        }

        return $return;
    }
}
