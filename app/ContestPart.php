<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ContestPart extends Model
{
    protected $fillable = ['name','contest_id'];
}
