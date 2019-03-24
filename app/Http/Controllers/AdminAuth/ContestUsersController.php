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
        $users_ids = UsersAnswer::where('question_id',$questions)->select('user_id')->distinct('user_id')->get();

        $users = User::whereIn('id',$users_ids->pluck('user_id')->values())->paginate(10);

        /*dd($users[0]->getAnswers($contest));*/

        return view('admin.usersanswers.index',compact('users','contest'));



    }
}
