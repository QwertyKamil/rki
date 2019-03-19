<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contest extends Model
{
    protected $fillable = ['name',];

    public function parts()
    {
        return $this->hasMany(ContestPart::class,'contest_id','id');
    }
}
