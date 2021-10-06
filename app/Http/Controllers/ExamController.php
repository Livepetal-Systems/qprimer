<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Program;
use App\Models\Subject;
use App\Models\Year;
use App\Models\Type;
use App\Models\Topic;
use App\Models\User;
use App\Models\Question;
use App\Models\QuestionPics;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class ExamController extends Controller
{


    function questionEditIndex($sha, $id, $question)
    {
        if(!sha1($id) == $sha){ abort(404); }
        $program = Program::where('id', $id)->first();
        $questions = Question::where('program_id', $id)->orderby('id','ASC')->paginate(25);
        $quest = Question::where('id', $question)->first();
        return view('control.editquestion', compact('program', 'questions', 'quest'));
    }

    function questionIndex($sha, $id)
    {
        if(!sha1($id) == $sha){ abort(404); }
        $program = Program::where('id', $id)->first();
        $questions = Question::where('program_id', $id)->orderby('id','ASC')->paginate(25);
        return view('control.question', compact('program', 'questions'));
    }


    function subjectIndex($slug)
    {
        $subject = Subject::where('slug', $slug)->first();
        return view('control.subject', compact('subject'));
    }


    function examInfoIndex($slug)
    {
        $type = Type::where('slug', $slug)->first();
        return view('control.examinfo', compact('type'));
    }


    function examIndex(){
        $types = auth()->user()->examtypes;
        return view('control.exam', compact('types'));
    }


    function uploadProgramPics(Request $request)
    {
        if($request->hasFile('photos'))
        {
            $files = $request->file('photos');
            foreach($files as $file){
                $extension = $file->getClientOriginalExtension();
                $name = $request->id.'_'.time().rand().'.'.$extension;
                $dest_path2 = 'assets/img/question/'.$name;
                $this->createThumbnail($file, $dest_path2, 250);
                move_uploaded_file($file, 'assets/img/question/def_'.$name);

                QuestionPics::create([
                    'program_id' => $request->id,
                    'image' => $name,
                ]);
            }
        }

        return back()->with('success', 'Image has been uploaded sucessfully');
    }

    function addProgramQuestion(Request $request)
    {
        $val = Validator::make($request->all(), [
            'question' => 'string|required|min:3',
            'a' => 'string|required',
            'b' => 'string|required',
            'c' => 'string|required',
            'd' => 'string|required',
            'ca' => 'string|required',
            'topic' => 'required',
        ])->validate();

        session()->put('topic', $val['topic']);

        $program = $request->program_id;


        Question::create([
            'program_id' => $program,
            'topic_id' =>  $val['topic'],
            'question' => $val['question'],
            'a' => $val['a'],
            'b' => $val['b'],
            'c' => $val['c'],
            'd' => $val['d'],
            'ca' => $val['ca'],
            'status' => 1,
            'qn' => $this->qn($program),
        ]);
        return back()->with('success', 'Question added ');
    }



    function qn($program){
        return count(Question::where('program_id',$program)->get())+1;
    }


    function editSubjectTopic(Request $request)
    {
        $val = Validator::make($request->all(), [
            'topic' => 'string|required|min:3',
        ])->validate();

        Topic::where('id', $request->id)->update([
            'topic' => $val['topic'],
        ]);

        return back()->with('success', 'Topic has benn updated');
    }


    function addSubjectTopic(Request $request)
    {
        $val = Validator::make($request->all(), [
            'topic' => 'string|required|min:3',
        ])->validate();
        Topic::create([
            'topic' => $val['topic'],
            'subject_id' => $request->id
        ]);
        return back()->with('success', 'Topic has benn added');
    }




    function createProgram(Request $request)
    {
        $val = Validator::make($request->all(), [
            'year' => 'string|required',
            'subject' => 'string|required',
        ])->validate();
        $ck = count(Program::where([ 'type' => $request->type, 'year' => $val['year'], 'subject' => $val['subject'] ])->get());
        if($ck > 0) { return back()->with('error', 'Program already exist'); }
        Program::create([
            'year' => $val['year'],
            'subject' => $val['subject'],
            'type' => $request->type,
            'status' => 1
        ]);
        return back()->with('success', 'Program has benn added');
    }




    function editExamYear(Request $request)
    {
        $val = Validator::make($request->all(), [
            'year' => 'string|required|min:4',
        ])->validate();

        Year::where('id', $request->id)->update([
            'year' => $val['year'],
        ]);

        return back()->with('success', 'Year had been updated');
    }


    function addExamYear(Request $request)
    {
        $val = Validator::make($request->all(), [
            'year' => 'string|required|min:4',
        ])->validate();

        Year::create([
            'year' => $val['year'],
            'type_id' => $request->id,
        ]);
        return back()->with('success', 'Year had been added');
    }




    function addExamSubject(Request $request){
        $val = Validator::make($request->all(), [
            'subject' => 'string|required|min:2',
            'code' => 'string|required|min:2',
        ])->validate();

        Subject::create([
            'slug' => rand(111111,99999999).Str::slug($val['subject']),
            'subject' => $val['subject'],
            'code' => $val['code'],
            'type_id' => $request->id,
        ]);

        return back()->with('success', 'Subject has been added');
        // return response([
        //     'message' => 'Subject added '. $val['subject'],
        //     'success' => true,
        // ]);
    }


    public function editExamType(Request $request)
    {
        $val = Validator::make($request->all(), [
            'type' => 'string|required|min:2',
            'description' => 'string|required|min:2',
        ])->validate();

        Type::where('slug', $request->slug)->update([
            'slug' => rand(1111111,999999999).Str::slug($val['type']),
            'type' => $val['type'],
            'description' => $val['type'],
        ]);
        return back()->with('success', 'Exam has been updated');
    }



    public function createExamType(Request $request)
    {

        $val = Validator::make($request->all(), [
            'type' => 'string|required|min:2',
            'description' => 'string|required|min:2',
        ])->validate();

        Type::create([
            'slug' => rand(1111111,999999999).Str::slug($val['type']),
            'type' => $val['type'],
            'description' => $val['type'],
            'owner' => auth()->user()->id,
        ]);

        return back()->with('success', 'Exam has been added');
    }



    function fetchExamSubject($type)
    {
        $subjects = Subject::where('type_id', $type)->get(['slug', 'subject', 'code', 'updated_at']);
        return response()->json([
            $subjects
        ], 201);

    }

}
