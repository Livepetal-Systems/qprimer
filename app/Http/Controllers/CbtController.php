<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Question;
use App\Models\Program;

class CbtController extends Controller
{
    //

    function startExam(Request $request)
    {
        $program = $request->program;
        $num = count(Question::where('program_id', $program)->get());
        session()->put('program', $program); session()->put('question_num', $num); 
        startExam();
        return redirect()->route('user.exam');
    }
}
