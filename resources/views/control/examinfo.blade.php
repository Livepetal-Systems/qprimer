@extends('layouts/app')
@section('title')
Exam
@endsection

@section('pagecontent')

@php
    $user = auth()->user();
@endphp

<div class="pt-5 pb-5">
    <div class="container">
        <!-- User info -->
        <div class="row align-items-center">
            <div class="col-xl-12 col-lg-12 col-md-12 col-12">
                <!-- Bg -->
                @include('control.instructor_bg')
            </div>
        </div>

    <!-- Content -->

        <div class="row mt-0 mt-md-4">
            <div class="col-lg-3 col-md-4 col-12">
                <!-- User profile -->
                @include('control.instructor_nav')
            </div>
            <div class="col-lg-9 col-md-8 col-12">
                <div class="card mb-4">
                    <!-- Card header -->
                    <div class="card-header d-flex justify-content-between ">
                        <h3 class="h4 mb-0">{{$type->type}} </h3>
                        <button class="btn btn-primary btn-xs editExamType">Edit Info</button>
                    </div>
                    <div class="card-body">
                        <p>{{ $type->description }}</p>


                        <div class="row">
                            <div class="col-lg-6 col-md-12 col-12">
                                <div class="card-header border-bottom-0 d-flex justify-content-between ">
                                    <h3 class="h4 mb-0">Exam Subjects</h3>
                                    <button class="btn btn-primary btn-xs addExamSubject">Add subject</button>
                                </div>
                                <div class="table-responsive border-0">
                                    @if($type->subjects->isEmpty())
                                        <div class=" alert alert-danger mt-1 mr-1">No subject For this exam</div>
                                    @else
                                        <table class="table table-sm table-striped mb-0">
                                            <thead class="table-light">
                                                <tr>
                                                    <th scope="col" class="border-0">#</th>
                                                    <th scope="col" class="border-0">Subject</th>
                                                    <th scope="col" class="border-0"></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($type->subjects->take(10) as $subject)
                                                    <tr>
                                                        <td> {{$loop->iteration}} </td>
                                                        <td> <a href="/control/subject/{{$subject->slug}}"> {{$subject->subject}} ({{$subject->code}}) </a> </td>
                                                        <td> {{$subject->topics->count()}} topics </td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    @endif
                                </div>
                            </div>

                            <div class="col-lg-6 col-md-12 col-12">
                                <div class="card-header border-bottom-0 d-flex justify-content-between ">
                                    <h3 class="h4 mb-0">Exam Years</h3>
                                    <button class="btn btn-primary btn-xs addExamYear">Add Year / Block</button>
                                </div>
                                <div class="table-responsive border-0">
                                    @if($type->years->isEmpty())
                                        <div class=" alert alert-danger mt-1 mr-1">No exam year added</div>
                                    @else
                                        <table class="table table-sm table-striped mb-0">
                                            <thead class="table-light">
                                                <tr>
                                                    <th scope="col" class="border-0">#</th>
                                                    <th scope="col" class="border-0">year</th>
                                                    <th scope="col" class="border-0"></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($type->years->take(10) as $year)
                                                    <tr>
                                                        <td> {{$loop->iteration}} </td>
                                                        <td> {{$year->year}} </td>
                                                        <td> <a href="javascript:;" id="edit_year" data-id="{{$year->id}}" data-year="{{$year->year}}"> Edit </a> </td>
                                                    </tr>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    @endif
                                </div>
                            </div>



                            <div class="col-lg-12 col-md-12 col-12">
                                <div class="card-header border-bottom-0 d-flex justify-content-between ">
                                    <h3 class="h4 mb-0">Programs </h3>
                                    <button class="btn btn-primary btn-xs createProgram">Create Program</button>
                                </div>
                                <div class="table-responsive border-0">
                                    @php
                                        $programs = \App\Models\Program::where('type', $type->id)->orderby('id', 'desc')->paginate(20);
                                    @endphp
                                    @if($type->programs->isEmpty())
                                        <div class=" alert alert-danger mt-1 mr-1">No program created</div>
                                    @else
                                        <table class="table mb-0">
                                            <thead class="table-light">
                                                <tr>
                                                    <th scope="col" class="border-0">#</th>
                                                    <th scope="col" class="border-0">Subject</th>
                                                    <th scope="col" class="border-0">Year</th>
                                                    <th scope="col" class="border-0">Questions</th>
                                                    <th scope="col" class="border-0"></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($programs as $program)
                                                    <tr>
                                                        <td> {{$loop->iteration}} </td>
                                                        <td> {{$program->sub->subject}} </td>
                                                        <td> {{$program->yer->year}} </td>
                                                        <td> {{$program->questions->count()}} questions </td>
                                                        <td > <div class="d-flex justify-content-between"> <a href="/control/program/{{sha1($program->id)}}/{{$program->id}}" class="btn btn-xs btn-info"><i class="fe fe-plus" aria-hidden="true"></i></a>
                                                             <button class="btn btn-xs btn-primary uploadPics" data-id="{{$program->id}}"> <i class="fe fe-upload" aria-hidden="true"></i></a> </div>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    @endif
                                </div>

                                <div class="pt-2 pb-2">
                                    <!-- Pagination -->
                                    <nav>
                                        <ul class="pagination justify-content-center mb-0">
                                            {{ $programs->links("pagination::bootstrap-4") }}
                                        </ul>
                                    </nav>
                                </div>


                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<input type="hidden" class="exam_id" value="{{$type->id}}">



<div class="modal fade" id="editExamType" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable ">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="staticBackdropLabel">Update Exam</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal"
            aria-label="Close">
            &times;
          </button>
        </div>
        <div class="modal-body">
          <form  method="POST" action enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-lg-12">
                    <x-jet-validation-errors class="mb-4"/>
                    <div class="form-group">
                        <label>Exam Title</label>
                        <input type="text" class="form-control" name="type" value="{{ $type->type }}">
                    </div>
                    <div class="form-group">
                        <label>Description</label>
                        <textarea name="description" rows="3" class="form-control">{{ $type->description }}</textarea>
                    </div>
                    <button class="btn btn-primary mt-2 btn-sm float-right">Update</button>
                </div>
            </div>
          </form>
        </div>
      </div>
    </div>
</div>



<div class="modal fade" id="addExamSubject" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable ">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="staticBackdropLabel">Add Exam Subjects</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal"
            aria-label="Close">
            &times;
          </button>
        </div>
        <div class="modal-body">
          <form action="{{ route('control.addExamSubject') }}"  method="POST" action enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-lg-12">
                    <x-jet-validation-errors class="mb-4"/>
                    <div id="add_subject_alert"></div>
                    <div class="form-group">
                        <label>Subject</label>
                        <input type="hidden" name="id" value="{{$type->id}}">
                        <input type="text" class="form-control" name="subject" id="add_subject_subject" value="{{ old('subject') }}">
                        <input type="hidden" class="csrf" value="{{ csrf_token() }}">
                    </div>
                    <div class="form-group">
                        <label>Short Form</label>
                        <input type="hidden" class="allLink">
                        <input type="text" class="form-control" name="code" id="add_subject_code" value="{{ old('code') }}">
                    </div>
                    <button type="submit" class="btn btn-primary mt-2 btn-sm float-right" id="add_subject_button">Add</button>
                </div>
            </div>
          </form>
        </div>
      </div>
    </div>
</div>


<div class="modal fade" id="addExamYear" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable ">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="staticBackdropLabel">Add Exam Year</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal"
            aria-label="Close">
            &times;
          </button>
        </div>
        <div class="modal-body">
          <form action="{{ route('control.addExamYear') }}"  method="POST" action enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-lg-12">
                    <x-jet-validation-errors class="mb-4"/>
                    <div class="form-group">
                        <label>Year</label>
                        <input type="hidden" name="id" value="{{$type->id}}">
                        <input type="text" class="form-control" name="year" placeholder="e.g 2020"  value="{{ old('year') }}">
                        <input type="hidden" class="csrf" value="{{ csrf_token() }}">
                    </div>
                    <button type="submit" class="btn btn-primary mt-2 btn-sm float-right" >Add</button>
                </div>
            </div>
          </form>
        </div>
      </div>
    </div>
</div>


<div class="modal fade" id="editExamYear" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable ">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="staticBackdropLabel">Edit Exam Year</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal"
            aria-label="Close">
            &times;
          </button>
        </div>
        <div class="modal-body">
          <form action="{{ route('control.editExamYear') }}"  method="POST" action enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-lg-12">
                    <x-jet-validation-errors class="mb-4"/>
                    <div class="form-group">
                        <label>Year</label>
                        <input type="hidden" name="id" class="edit_exam_year_id" >
                        <input type="text" class="form-control edit_exam_year_year" name="year" placeholder="e.g 2020"  value="{{ old('year') }}">
                    </div>
                    <button type="submit" class="btn btn-primary mt-2 btn-sm float-right" >Update</button>
                </div>
            </div>
          </form>
        </div>
      </div>
    </div>
</div>



<div class="modal fade" id="createProgram" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable ">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="staticBackdropLabel">Create Program</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal"
            aria-label="Close">
            &times;
          </button>
        </div>
        <div class="modal-body">
          <form action="{{ route('control.createProgram') }}"  method="POST" action enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-lg-12">
                    <x-jet-validation-errors class="mb-4"/>
                    <div class="form-group">
                        <label>Subject</label>
                        <select name="subject" class="form-control">
                            <option selected disabled> --Select Subject-- </option>
                            @foreach ($type->subjects as $subject)
                                <option value="{{$subject->id}}">{{$subject->subject}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label>Year</label>
                        <input type="hidden" name="type" value="{{$type->id}} ">
                        <select name="year" class="form-control">
                            <option selected disabled> --Select Year-- </option>
                            @foreach ($type->years as $year)
                                <option value="{{$year->id}}">{{$year->year}}</option>
                            @endforeach
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary mt-2 btn-sm float-right" >Create</button>
                </div>
            </div>
          </form>
        </div>
      </div>
    </div>
</div>


<div class="modal fade" id="pushPictures" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable ">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="staticBackdropLabel">Upload Images</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">&times;</button>
        </div>
        <div class="modal-body">
          <form action="{{ route('control.uploadProgramPics') }}"  method="POST" action enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-lg-12">
                    <x-jet-validation-errors class="mb-4"/>
                    <div class="form-group">
                        <label>Select Files</label>
                        <input type="file" name="photos[]" class="form-control" multiple accept="*">
                        <input type="hidden" name="id" class="form-control uploadPics">
                    </div>
                    <button type="submit" class="btn btn-primary mt-2 btn-sm float-right" >Create</button>
                </div>
            </div>
          </form>
        </div>
      </div>
    </div>
</div>



<script src="{{ asset('assets/libs/jquery/dist/jquery.min.js') }}"></script>
<script src="{{ asset('assets/js/custom.js') }}"></script>
<script src="{{ asset('assets/js/examinfo.js') }}"></script>
<script>


    $('body').on('click', '.uploadPics', function(){
        id = $(this).data('id');
        $('#pushPictures').modal('show');
        $('.uploadPics').val(id);
        console.log(id);
    });



    $('.createProgram').on('click', function(){
        $('#createProgram').modal('show');
    });

    $('.editExamType').on('click', function(){
        $('#editExamType').modal('show');
    });


    $('.addExamSubject').on('click', function(){
        $('#addExamSubject').modal('show');
    });


    $('.addExamYear').on('click', function(){
        $('#addExamYear').modal('show');
    });


    $('body').on('click', '#edit_year', function () {
        $('.edit_exam_year_id').val( $(this).data('id') )
        $('.edit_exam_year_year').val( $(this).data('year') )
        $('#editExamYear').modal('show');
    })







</script>

@endsection
