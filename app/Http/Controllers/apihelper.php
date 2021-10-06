<?php


use App\Models\Program;
use App\Models\Question;
use Illuminate\Support\Facades\Http;

function insertTopics()
{
    // $programs = Program::where('type', 5)->get();


    // foreach($programs as $pro){
    //     $sub = $pro->subject;
    //     $response = Http::get('http://localhost/livepetal/api/cbt/api2.php?getmeExamsTopics='.$pro->li);
    //     $response = json_decode($response);
    //     foreach($response as $topic)
    //     {

    //         $ct = count(Topic::where('li' , $topic->sn)->get());

    //         if($ct  == 0)
    //         {
    //             Topic::create([
    //                 'subject_id' => $sub  ,
    //                 'topic' => $topic->topic,
    //                 'li' => $topic->sn
    //             ]);


    //             // $arr [] = [
    //             //     'subject_id' => $sub ,
    //             //     'topic' => $topic->topic,
    //             //     'li' => $topic->sn
    //             // ];
    //         }
    //     }


    // }

    return response('done');
}




function insertQuestions()
{

    $programs = Program::where('type', 3)->limit(1)->get();

    foreach($programs as $pro){
        $sub = $pro->subject;
        $response = Http::get('http://localhost/livepetal/api/cbt/api2.php?getmeExamsQuestionsAnother='.$pro->li);
        $response = json_decode($response);
        foreach($response as $ques)
        {
            $ct = count(Question::where('li' , $ques->sn)->get());
            if($ct == 0)
            {
                // Question::create([
                //     'program_id' => $pro->sn,
                //     'topics_id' => Topic::where('subject_id', $sub)->where()->first()['id'],
                //     'qn' => $ques->qno,
                //     'question' => $ques->question,
                //     'a' => $ques->a,
                //     'b' => $ques->b,
                //     'c' => $ques->c,
                //     'd' => $ques->d,
                //     'ca' => $ques->ca,
                //     'li' => $ques->sn,
                //     'status' => 1,
                // ]);

                $arr[] = [
                    'program_id' => $pro->sn,
                    'topics_id' => '',
                    'qn' => $ques->qno,
                    'question' => $ques->question,
                    'a' => $ques->a,
                    'b' => $ques->b,
                    'c' => $ques->c,
                    'd' => $ques->d,
                    'ca' => $ques->ca,
                    'li' => $ques->sn,
                    'status' => 1,
                ];
            }
        }


    }

    return response($arr);
}


function getTopic($esn, $week)
{
    $response = Http::get('http://localhost/livepetal/api/cbt/api2.php?esn='.$esn.'&week='.$week);
    $response = json_decode($response);
}



function insertPrograms()
{
    $response = Http::get('http://localhost/livepetal/api/cbt/api2.php?getmeExamsPrograms=sss 1');
    $response = json_decode($response);  $t = 5; //ss3


    // //$arr = ['SSS 3', 'SSS 2', 'SSS 1']; $i = 0;
    // foreach ($response as $pro)
    // {
    //     $a [] = $pro->year.' '.$pro->term.' term';
    // }

    // $a = array_unique($a);
    //     foreach($a as $val) {
    //         Year::create([
    //             'type_id' => ,
    //             'year' => $val,
    //         ]);
    //     }



    // foreach ($response as $pro)
    // {

    //     $subject_id = Subject::where('subject', $pro->pro)->where('type_id', $t)->first()['id'];
    //     $cus = $pro->year.' '.$pro->term.' term';

    //     $y = Year::where('year', $cus)->where('type_id', $t)->first()['id'];
    //     //echo $cus .'<br>';

    //     Program::create([
    //         'type' => $t,
    //         'subject' => $subject_id,
    //         'year' => $y,
    //         'li' => $pro->sn,
    //         'status' =>  1,
    //     ]);

    //     // $arr[] = [
    //     //     'type' => $t,
    //     //     'subject' => $subject_id,
    //     //     'year' => $y,
    //     //     'li' => $pro->sn,
    //     // ];

    // }




    return response('done');
}


function insertSubject()
{

    // Subject::where('id' ,'<', 39)->update([
    //     'li' => 0,
    // ]);
    // $response = Http::get('http://localhost/livepetal/api/cbt/api2.php?getmeSubjects');
    // $response = json_decode($response);

    // $arr = [3,4,5];

    // foreach($arr as $tp)
    // {

    //     foreach($response as $sub)
    //     {
    //         Subject::create([
    //             'type_id' => $tp,
    //             'subject' => $sub->sub,
    //             'slug' => rand(111111,9999999).Str::slug($sub->sub),
    //             'code' => strtoupper(substr($sub->sub, 0,3)) ,
    //             'li' => $sub->sn,
    //         ]);



    //         // $a [] = [
    //         //     'type_id' => $tp,
    //         //     'subject' => $sub->sub,
    //         //     'slug' => rand(111111,9999999).Str::slug($sub->sub),
    //         //     'code' => strtoupper(substr($sub->sub, 0,3)) ,
    //         //     'li' => $sub->sn,
    //         // ];
    //     }
    // }


    return response('done');
}


function domeSomeExams()
{
    $num = 20;
    $program = Program::where('id', 3)->first();
    $data = [
        'info' => [
            'id' => $program->id,
            'subject' => $program->sub->subject,
            'year' => $program->yer->year,
            'student' => 1,
            'start' => time(),
            'end' => time() + (rand(15, 30) * 60),
            'total_question' => $num,
            'total_correct' => 12,
        ],
        //'questions' => $this->pickQuestionTester($program, $num)
    ];
    //$this->answerProcessor(json_encode($data));
    return response($data);
}



function pickQuestionTester($program, $num)
{
    $arr = [];
    $questions = Question::where('program_id', $program->id)->inRandomOrder()->limit($num)->get();
    $option = ['a', 'b', 'c', 'd'];
    foreach($questions as $question){
        $arr[] = [
            'id' => $question->id,
            'topic' => $question->topic->topic,
            'qn' => $question->qn,
            'questions' => $question->question,
            'a' => $question->a,
            'b' => $question->b,
            'c' => $question->c,
            'd' => $question->d,
            'ca' => $question->ca,
            'option' =>  strtoupper($option[rand(0,3)]),
        ];
    }
    return $arr;
}






function domeSomeQuestion()
{
    $response = Http::get('http://localhost/livepetal/api/cbt/api.php?getmeQuestion');
    $response = json_decode($response);

    foreach ($response as $quest)
    {
        // Question::create([
        //     'program_id' => 3,
        //     'topic_id' => 4,
        //     'question' => $quest->question,
        //     'a' => $quest->a,
        //     'b' => $quest->b,
        //     'c' => $quest->c,
        //     'd' => $quest->d,
        //     'ca' => $quest->ca,
        //     'qn' => $quest->qn,
        //     'status' => 1,
        // ]);
    }
    return response('done!');
}

