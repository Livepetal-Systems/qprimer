<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Subscription;
use App\Models\Type;
use App\Models\Test;
use App\Models\Answer;
use App\Models\Program;
use App\Models\Question;
use App\Models\Subject;
use App\Models\Topic;
use App\Models\Year;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Str;

ini_set('memory_limit', '3000M');
ini_set('max_execution_time', '0');

class ApiController extends Controller
{
    /*  getmeExamsQuestionsAnother
        this controller handels every thing that deal with
        oouter connections
    */




    function generateHsitory($user)
    {
        $arr = [];
        $tests = Test::where('user_id', $user)->orderby('id', 'DESC')->limit(50)->get();
        foreach($tests as $test)
        {
            $arr[] = [
                'user_id' => $test->user_id,
                'test_id' => $test->id,
                'type' => $test->program->typ->type,
                'subject' => $test->program->sub->subject,
                'year' => $test->program->yer->year,
                'program_id' => $test->program_id,
                'total_questions' => $test->questions,
                'total_correct' => $test->correct,
                'time_spent' => $test->end->$test->start,
                'date' => $test->created_at,
            ];
        }
        return response([
            'test_history' => $arr ?? [
                'user_id' => '',
                'test_id' => '',
                'type' => 'e',
                'subject' => '',
                'year' => '',
                'program_id' => '',
                'total_questions' => '',
                'total_correct' => '',
                'time_spent' => '',
                'date' => '',
            ],
        ]);
    }





    function currentQuestionSession()
    {
        return response(session()->get('qa'));
    }


    function getProgram($user)
    {
        $subscription = Subscription::where('buyer_id', $user)->get();
        $exam = [];
        foreach($subscription as $sub){
            $exam[] = [
                'info' => [
                    'id' => $sub->exam->id,
                    'title' => $sub->exam->type,
                    'description' => $sub->exam->description,
                    'owner' => $sub->owner->lastname.' '.$sub->owner->firstname,
                ],
                'subjects' => $this->selectSubject($sub->exam),
                'user_id' => $user
            ];
        }
        return response($exam, 201);
    }




    function getSubscriptions($user)
    {
        $subscription = Subscription::where('buyer_id', $user)->get();
        $exam = [];
        foreach($subscription as $sub){
            $exam[] = [
                'info' => [
                    'id' => $sub->exam->id,
                    'title' => $sub->exam->type,
                    'description' => $sub->exam->description,
                    'owner' => $sub->owner->lastname.' '.$sub->owner->firstname,
                ],
                'subjects' => $this->selectSubject($sub->exam),
                'user_id' => $user
            ];
        }
        return response($exam, 201);
    }


    function selectSubject($type)
    {
        $arr = [];
        foreach($type->subjects as $sub){
            $arr[] = [
                'id' => $sub->id,
                'subject' => $sub->subject,
                'code' => $sub->code,
                //'topics' => $sub->topics,
                'programs' => $this->selectProgramFromSubject($sub->id),
            ];
        }
        return $arr;
    }



    function selectProgramFromSubject($subject_id)
    {
        $programs = Program::where('subject', $subject_id)->get();
        $arr = [];
        foreach($programs as $pro){
            $arr[] = [
                'id' => $pro->id,
                'subject' => $pro->sub->subject,
                'year' => $pro->yer->year,
            ];
        }
        return $arr;
    }

    function pickProgram($exam)
    {
        $arr = [];
        foreach($exam->programs as $pro){
            $arr[] = [
                'id' => $pro->id,
                'subject' => $pro->sub->subject,
                'code' => $pro->sub->code,
                'year' => $pro->yer->year,
                'type' => $pro->typ->type,
                'total_question' => count(Question::where('program_id', $pro->id)->get()),
            ];
        }
        return $arr;
    }

    function getQuestion($program)
    {
        $program = Program::where('id', $program)->first();
        $data = [
            'info' => [
                'id' => $program->id,
                'subject' => $program->sub->subject,
                'year' => $program->yer->year,
                'type' => $program->typ->type,
                'student' => '',
                'start' => '',
                'end' => '',
                'total_question' => $program->questions->count(),
                'total_correct' => ''
            ],
            'questions' => $this->pickQuestion($program)
        ];
        return response($data);
    }


    function pickQuestion($program)
    {
        $arr = [];
        $questions = Question::where('program_id', $program->id)->inRandomOrder()->get();
        foreach($questions as $question){
            $arr[] = [
                'id' => $question->id,
                'topic' => $question->topic->topic,
                'qn' => $question->qn,
                'question' => $question->question,
                'a' => $question->a,
                'b' => $question->b,
                'c' => $question->c,
                'd' => $question->d,
                'ca' => $question->ca,
                'option' => '',
            ];
        }
        return $arr;
    }


    function answerProcessor(Request $request)
    {

        $info = $request->info; $questions = $request->questions;
        //create a summary of the test
        $test = Test::create([
            'user_id' => $info['student'],
            'program_id' => $info['id'],
            'questions' => $info['total_question'],
            'correct' => $info['total_correct'] ?? 0,
            'start' => $info['start'],
            'end' => $info['end'] ?? time(),
            'answered' => $info['total_question'],
        ]);
        $testId = $test->id;
        //please Process the answer for each question
        $to = $this->processAnswer($questions, $testId);
        $to = json_decode($to);
        Test::where('id', $testId)->update([ "correct" => $to->total,  "answers" => json_encode($to->answers) ]);
        session()->forget('que'); session()->forget('p_info');
        session()->forget('question_num'); session()->forget('qa');
        // queryForHistory($info['student']);
        return response([
            'message' => 'Exam has been completed',
            'success' => true,
        ]);
    }




    function processAnswer($arr, $testId)
    {
        $a = 0 ; $newarr = [];
        foreach($arr as $an)
        {
            $op = $an['op'] ?? '';
            $ans = ($op == $an['ca']) ? 1 : 0 ;
            $a += ($op == $an['ca']) ? 1 : 0 ;
            $newarr[] = [
                'question_id' => $an['qsn'],
                'test_id' => $testId,
                'qn' => $an['q'],
                'option' => $op,
                'score' => $ans,
            ];
        }
        return json_encode(['answers' => $newarr, 'total' => $a]);
    }



}
