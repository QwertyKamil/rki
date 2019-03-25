<?php

namespace App\Http\Controllers\AdminAuth;

use App\Contest;
use App\User;
use App\UsersAnswer;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ContestUsersController extends Controller
{
    public function index(Contest $contest)
    {
        $part = $contest->parts()->first();
        $questions = $part->questions->pluck('id');
        $users_ids = (count($questions->toArray()))?UsersAnswer::where('question_id',$questions->toArray())->select('user_id')->distinct('user_id')->get():[];


        $users = (count($users_ids))?User::whereIn('id',$users_ids->pluck('user_id')->values())->paginate(10):User::where('id','<',1)->paginate(10);


        return view('admin.usersanswers.index',compact('users','contest'));
    }

    public function edit(Contest $contest, UsersAnswer $answer)
    {
        return view('admin.usersanswers.edit',compact('answer'));
    }

    public function update(Request $request, Contest $contest, UsersAnswer $answer)
    {
        $answer->update([
            'correct'=>$request->correct,
        ]);
        return redirect()->route('admin.admin-contest-users',$contest);
    }
}
