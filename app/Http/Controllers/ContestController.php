<?php

namespace App\Http\Controllers;

use App\Contest;
use Illuminate\Http\Request;

class ContestController extends Controller
{
    public function index(string $token)
    {
        if($contest = Contest::where('token',$token)->first()){
            return view('contest',compact('token','contest'));
        }
        else{
            abort(404);
        }
    }
}
