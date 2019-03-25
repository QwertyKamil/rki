<?php

namespace App\Jobs;

use App\Contest;
use App\User;
use App\UsersAnswer;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

class CreateUserAnswers implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    private $user;
    private $contest;
    /**
     * Create a new job instance.
     *
     * @param User $user
     * @param Contest $contest
     */
    public function __construct(User $user, Contest $contest)
    {
        $this->user = $user;
        $this->contest = $contest;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        foreach ($this->contest->parts as $part) {
            foreach ($part->questions as $question) {
                $answer = UsersAnswer::where('question_id',$question->id)
                    ->where('user_id',$this->user->id)->first();
                if(!$answer){
                    UsersAnswer::create([
                        'question_id'=>$question->id,
                        'user_id'=>$this->user->id,
                        'correct'=>0,
                        'answer'=>'',
                    ]);
                }
            }
        }
    }
}
