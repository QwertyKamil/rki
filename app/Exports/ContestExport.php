<?php

namespace App\Exports;

use App\Contest;
use App\UsersAnswer;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\FromView;

class ContestExport implements FromView
{

    private $contest;

    public function __construct(Contest $contest)
    {
        $this->contest = $contest;
    }

    /**
     * @return View
     */
    public function view(): View
    {
        $contest = $this->contest;
        $questions = $this->contest->questions();
        $users = count($questions) ?
            UsersAnswer::whereIn('question_id', $questions)
                ->select('user_id', DB::raw('SUM(correct) as total'))
                ->groupBy('user_id')
                ->orderBy('total','desc')
                ->get()
            : [];
        /*dd($users);*/
        return view('admin.exports.contest', compact('contest','users'));
    }
}
