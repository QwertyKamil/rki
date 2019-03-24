<?php

namespace App\Http\Controllers\Api;

use App\Answer;
use App\Contest;
use App\Question;
use App\UsersAnswer;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ContestController extends Controller
{
    /**
     * @param Request $request
     * @param string $token
     * @return \Illuminate\Http\JsonResponse
     */
    public function get(Request $request, string $token)
    {
        $contest = Contest::where('token',$token)->first();
        $part = $contest->parts()->first();
        $questions = $part->questions()->with('answers')->inRandomOrder()->get();
        return response()->json(compact('questions'),200);
    }

    /**
     * @param Request $request
     * @param string $token
     * @return \Illuminate\Http\JsonResponse
     */
    public function createAnswer(Request $request, string $token)
    {
        $question = Question::where('id',$request->question_id)->first();
        $UsersAnswer = UsersAnswer::where('question_id',$request->question_id)
            ->where('user_id',$request->user_id)->first();

        if($question->type == 1){
            $answer = Answer::where('id',$request->answer_id)->first();
            if($UsersAnswer){
                $UsersAnswer->update([
                    'answer_id'=>$request->answer_id,
                    'correct'=>$answer->correct*$question->weight,
                    'answer'=>$answer->answer,
                ]);
            }
            else{
                UsersAnswer::create([
                    'question_id'=>$request->question_id,
                    'answer_id'=>$request->answer_id,
                    'user_id'=>$request->user_id,
                    'correct'=>$answer->correct*$question->weight,
                    'answer'=>$answer->answer,
                ]);
            }
        }
        else{
            $correct = false;
            foreach($question->answers as $answer){
                $pos = strpos($request->text, $answer->answer);
                if($pos !== false){
                    $correct = true;
                    break;
                }
            }
            if($UsersAnswer){
                $UsersAnswer->update([
                    'correct'=>$correct*$question->weight,
                    'answer'=>$request->text,
                ]);
            }
            else{
                UsersAnswer::create([
                    'question_id'=>$request->question_id,
                    'user_id'=>$request->user_id,
                    'correct'=>$correct*$question->weight,
                    'answer'=>$request->text,
                ]);
            }

        }
        return response()->json(['status'=>'ok',200]);
    }

    public function getAnswer(Request $request, string $token)
    {
        $answer = UsersAnswer::where('question_id',$request->question_id)
            ->where('user_id',$request->user_id)->first();
        return response()->json(compact('answer'),200);
    }
}
