<?php

namespace App\Http\Controllers\Api;

use App\Contest;
use App\Jobs\CreateUserAnswers;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    public function create(Request $request)
    {
        $user = User::create([
            'name'=>$request->name,
            'email'=>time()."@test.pl",
            'password'=>bcrypt('password'),
        ]);
        $contest = Contest::where('id',$request->contest)->first();
        CreateUserAnswers::dispatch($user,$contest)->delay(now()->addSecond());
        return response()->json(['status'=>'ok','id'=>$user->id],200);
    }


}
