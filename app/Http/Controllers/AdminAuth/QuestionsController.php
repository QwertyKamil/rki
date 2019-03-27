<?php

namespace App\Http\Controllers\AdminAuth;

use App\Answer;
use App\Contest;
use App\ContestPart;
use App\Question;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class QuestionsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param Contest $contest
     * @param ContestPart $part
     * @return \Illuminate\Http\Response
     */
    public function index(Contest $contest, ContestPart $part)
    {
        $questions = $part->questions()->paginate(10);
        return view('admin.question.index',compact('questions','contest','part'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param Contest $contest
     * @param ContestPart $part
     * @return \Illuminate\Http\Response
     */
    public function create(Contest $contest, ContestPart $part)
    {
        return view('admin.question.add',compact('contest','part'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param Contest $contest
     * @param ContestPart $part
     * @return \Illuminate\Http\Response
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request,Contest $contest, ContestPart $part)
    {
        $this->validate($request,[
            'name'=>'required',
            'text'=>'required',
            'type'=>'required',
            'weight'=>'required',
        ]);

        $question = Question::create([
           'name'=>$request->name,
           'text'=>$request->text,
           'type'=>$request->type,
           'weight'=>$request->weight,
           'contest_part_id'=>$part->id,
        ]);

        if(isset($request->answers)){
            foreach ($request->answers as $key => $answer) {
                Answer::create([
                    'question_id'=>$question->id,
                    'answer'=>$answer,
                    'correct'=>($request->correct == $key+1)?1:0,
                ]);
            }
        }
        elseif(isset($request->patterns)){
            foreach ($request->patterns as $key => $answer) {
                Answer::create([
                    'question_id'=>$question->id,
                    'answer'=>$answer,
                    'correct'=>1,
                ]);
            }

        }
        return redirect()->route('admin.admin-questions',['contest'=>$contest,'part'=>$part])->with('success','Dodano pytanie');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Contest $contest
     * @param ContestPart $part
     * @param Question $question
     * @return \Illuminate\Http\Response
     */
    public function edit(Contest $contest, ContestPart $part, Question $question)
    {
        return view('admin.question.edit',compact('contest','part','question'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param Contest $contest
     * @param ContestPart $part
     * @param Question $question
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Contest $contest, ContestPart $part, Question $question)
    {
        $question->update([
            'name'=>$request->name,
            'text'=>$request->text,
            'type'=>$request->type,
            'weight'=>$request->weight,
        ]);
        return redirect()->route('admin.admin-questions',['contest'=>$contest,'part'=>$part])->with('success','Zedytowano pytanie');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Contest $contest
     * @param ContestPart $part
     * @param Question $question
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Contest $contest, ContestPart $part, Question $question)
    {
        $question->delete();
        return redirect()->route('admin.admin-questions',['contest'=>$contest,'part'=>$part])->with('success','Usunięto pytanie');
    }
}
