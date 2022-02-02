<?php
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;





function getExam($program, $num)
{
    $req = Request::create(env('LINIT').'api/get_questions/'.$program,'GET');
    $res = app()->handle($req);
    return  $res->original;
}


function proPics()
{
    return auth()->user()->photo;
}

function queryForHistory($user)
{
    $req = Request::create(env('LINIT').'api/generate_history/'.$user.'GET');
    $res = app()->handle($req); $data =  $res->original;
    session()->put('test_history', $data['test_history']);
    return  session()->get('test_history');
}


function getHistory($user)
{
    $history = session()->has('test_history') ? session()->get('test_history') : '';

    if($history) {
        @$id = $history[0]['user_id'];
        if($user == $id){
            $latest = $history;
        }else{
            $latest = queryForHistory($user);
        }
    }else{
        $latest= queryForHistory($user);
    }
    return $latest;
}


function startExam()
{

    $data = getExam(session()->get('program'), session()->get('question_num'));
    session()->put('que', @$data['questions']);
    $data['info']['start'] = time();
    $data['info']['student'] = auth()->user()->id;
    session()->put('p_info', $data['info']);
    startExamx(session()->get('que'));
    return;
}



function startExamx($que)
{
    $total = count($que);
    $x = [];
    $i = 1;
    while ($i <= $total) {
        $e = $i++;
        $v = $e - 1;
        $qsn = $que[$v]['id'];
        $ca = strtolower($que[$v]['ca']);
        $x[] = array('q' => $e, 'qsn' => $qsn, 'ca' => $ca, 'op' => '');
    }
    session()->put('qa', $x);
    return;
}

function updateAns($sn, $op)
{
    $y = session()->get('qa');
    $total = count($y);
    $x = [];
    $i = 0;
    while ($i < $total) {
        $e = $i++;
        $ca1 = $y[$e]['ca'];
        $qsn = $y[$e]['qsn'];
        $op1 = $y[$e]['op'];
        $q = $y[$e]['q'];
        $x[] = $q == $sn ? array('q' => $q, 'qsn' => $qsn, 'ca' => $ca1, 'op' => $op) : array('q' => $q, 'qsn' => $qsn, 'ca' => $ca1, 'op' => $op1);
    }
    session()->put('qa', $x);
    return;
}

function getAnswered($y)
{

    $total = count($y);
    $i = 0;
    $n = 0;
    while ($i < $total) {
        $e = $i++;
        $op1 = $y[$e]['op'];
        $n += $op1 == '' ? 0 : 1;
    }
    return $n;
}

function examStat($y, $opt = 1)
{
    $tq = count(session()->get('que'));
    $total = count($y);

    $i = 0;
    $n = 0;
    while ($i < $total) {
        $e = $i++;
        $op = $y[$e]['op'];
        $ca = $y[$e]['ca'];
        $n += $op == $ca ? 1 : 0;
    }
    if ($opt == 1) {
        $x = $tq;
    } elseif ($opt == 2) {
        $x = $n;
    } elseif ($opt == 3) {
        $x = $tq - $n;
    } elseif ($opt == 4) {
        @$x = 100 * $n / $tq;
    }
    return $x;
}


function getProgram($user)
{
    $history = session()->has('user_program') ? session()->get('user_program') : '';
    if($history) {
        @$id = $history[0]['user_id'];
        if($user == $id){
            $latest = $history;
        }else{
            $latest = queryForPrograms($user);
        }
    }else{
        $latest= queryForPrograms($user);
    }
    return $latest;
}


function queryForPrograms($id)
{
    $req = Request::create(env('LINIT').'api/get_program/'.$id  ,'GET');
    $res = app()->handle($req);
    session()->put('user_program', $res->original);
    return  $res->original;
}
