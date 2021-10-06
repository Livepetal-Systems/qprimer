<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('login', function () { return view('login'); });
Route::post('/loginUser', [\App\Http\Controllers\AuthController::class, 'loginUser'])->name('loginUser');


Route::get('/logOut', function () {
    session()->flush();
    return redirect('/login');
});


Route::get('/', function () { return redirect('/user'); });
Route::get('user', function () { return redirect('/control')->with('success', 'wlecome back'); });


Route::group(['prefix'=>'user', 'as'=>'user.', 'middleware'=> ['auth'] ], function (){

    Route::get('/', function () { return view('user.index'); });

    Route::get('/subscription', function () { return view('user.purchasedexams'); })->name('subscription');;
    Route::get('/history', function () { return view('user.history'); })->name('history');

    Route::get('/exam', function () { return view('user.exam'); })->name('exam');//->middleware('writing');
    Route::get('/services.php/{type}', function ($type) { return view('user.services', compact('type')); });
    Route::get('/services.php/{type}/{opt}/{q}', function ($type, $opt, $q) { return view('user.services', compact('type', 'opt', 'q')); });
    Route::post('/startExam',  [\App\Http\Controllers\CbtController::class, 'startExam'])->name('startExam');
    Route::post('/submitExam',  [\App\Http\Controllers\ApiController::class, 'answerProcessor'])->name('submitExam');
    Route::get('/currentQuestionSession',  [\App\Http\Controllers\ApiController::class, 'currentQuestionSession'])->name('currentQuestionSession');



    Route::get('/profile/edit', [\App\Http\Controllers\ViewController::class, 'userEditProfile']);
    Route::get('/profile/purchases', [\App\Http\Controllers\ViewController::class, 'userInvoice']);
    Route::get('/profile/security', [\App\Http\Controllers\ViewController::class, 'userSecurity']);


    Route::post('/uploadProfilePics',  [\App\Http\Controllers\AuthController::class, 'uploadProfilePics'])->name('uploadProfilePics');
    Route::post('/deleteProfilePics',  [\App\Http\Controllers\AuthController::class, 'deleteProfilePics'])->name('deleteProfilePics');
    Route::post('/updateProfile',  [\App\Http\Controllers\AuthController::class, 'updateProfile'])->name('updateProfile');


});


Route::group(['prefix'=>'control', 'as'=>'control.', 'middleware'=> ['auth', 'control'] ], function (){

    Route::get('/', function () { return view('control.index'); });
    Route::get('/exams', [\App\Http\Controllers\ExamController::class, 'examIndex'])->name('exams');
    Route::post('/createExamType', [\App\Http\Controllers\ExamController::class, 'createExamType'])->name('createExamType');
    Route::post('/uploadProgramPics', [\App\Http\Controllers\ExamController::class, 'uploadProgramPics'])->name('uploadProgramPics');
    Route::get('/exam/{slug}', [\App\Http\Controllers\ExamController::class, 'examInfoIndex']);
    Route::get('/subject/{slug}', [\App\Http\Controllers\ExamController::class, 'subjectIndex']);


    //subjects year and program Routes

    Route::post('/addExamSubject', [\App\Http\Controllers\ExamController::class, 'addExamSubject'])->name('addExamSubject');

    Route::post('/addExamYear', [\App\Http\Controllers\ExamController::class, 'addExamYear'])->name('addExamYear');
    Route::post('/editExamYear', [\App\Http\Controllers\ExamController::class, 'editExamYear'])->name('editExamYear');

    Route::post('/createProgram', [\App\Http\Controllers\ExamController::class, 'createProgram'])->name('createProgram');

    //topic routes
    Route::post('/addSubjectTopic', [\App\Http\Controllers\ExamController::class, 'addSubjectTopic'])->name('addSubjectTopic');
    Route::post('/editSubjectTopic', [\App\Http\Controllers\ExamController::class, 'editSubjectTopic'])->name('editSubjectTopic');

    //questions routes
    Route::get('/program/{sha}/{id}', [\App\Http\Controllers\ExamController::class, 'questionIndex'])->name('questionIndex');
    Route::get('/program/question/edit/{sha}/{id}/{question}', [\App\Http\Controllers\ExamController::class, 'questionEditIndex']);
    Route::post('/addProgramQuestion', [\App\Http\Controllers\ExamController::class, 'addProgramQuestion'])->name('addProgramQuestion');



    ///fetch routes
    Route::get('/fetchExamSubject/{type}', [\App\Http\Controllers\ExamController::class, 'fetchExamSubject'])->name('fetchExamSubject');


});

///testing routes
Route::get('/domeSomeQuestion', [\App\Http\Controllers\ApiController::class, 'domeSomeQuestion'])->name('domeSomeQuestion');
Route::get('/domeSomeExams', [\App\Http\Controllers\ApiController::class, 'domeSomeExams'])->name('domeSomeExams');
Route::get('/insertSubject', [\App\Http\Controllers\ApiController::class, 'insertSubject'])->name('insertSubject');
Route::get('/insertTopics', [\App\Http\Controllers\ApiController::class, 'insertTopics'])->name('insertTopics');
Route::get('/insertPrograms', [\App\Http\Controllers\ApiController::class, 'insertPrograms'])->name('insertPrograms');
Route::get('/insertQuestions', [\App\Http\Controllers\ApiController::class, 'insertQuestions'])->name('insertQuestions');
Route::get('/updateSlugs', [\App\Http\Controllers\ApiController::class, 'updateSlugs'])->name('updateSlugs');

Route::get('/fetchUserProgramViaJs/{user}', function ($user) { return getProgram($user); });


