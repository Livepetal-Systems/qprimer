@extends('layouts/app')
@section('title')
Subject
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
                        <h3 class="h4 mb-0"> {{$subject->type->type}} {{$subject->subject}} Topics </h3>
                        <button class="btn btn-primary btn-xs addTopic">Add Topic</button>
                    </div>
                    <div class="table-responsive border-0">
                        @if($subject->topics->isEmpty())
                            <div class=" alert alert-danger mt-1 mr-1">No topic to show</div>
                        @else
                            <table class="table mb-0">
                                <thead class="table-light">
                                    <tr>
                                        <th scope="col" class="border-0">#</th>
                                        <th scope="col" class="border-0">Topic</th>
                                        <th scope="col" class="border-0">Questions</th>
                                        <th scope="col" class="border-0">Updated</th>
                                        <th scope="col" class="border-0"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($subject->topics as $topic)
                                        <tr>
                                            <td>{{$loop->iteration}} </td>
                                            <td>{{$topic->topic}} </td>
                                            <td>{{$topic->questions->count()}} questions </td>
                                            <td>{{$topic->updated_at}} </td>
                                            <td><a href="javascript:;" class="editTopic" data-id="{{$topic->id}}" data-topic="{{$topic->topic}}">Edit</a> </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



<div class="modal fade" id="addTopic" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable ">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="staticBackdropLabel">Add Topics For {{$subject->type->type}} {{$subject->subject}} </h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal"
            aria-label="Close">
            &times;
          </button>
        </div>
        <div class="modal-body">
          <form action="{{ route('control.addSubjectTopic') }}"  method="POST" action enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-lg-12">
                    <x-jet-validation-errors class="mb-4"/>
                    <div class="form-group">
                        <label>Topic</label>

                        <input type="text" class="form-control" name="topic" value="{{ old('topic') }}">
                        <input type="hidden" name="id" value="{{ $subject->id }}">
                    </div>
                    <button type="submit" class="btn btn-primary mt-2 btn-sm float-right" id="add_subject_button">Add</button>
                </div>
            </div>
          </form>
        </div>
      </div>
    </div>
</div>



<div class="modal fade" id="editTopic" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable ">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="staticBackdropLabel">Edit Topic For {{$subject->type->type}} {{$subject->subject}} </h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal"
            aria-label="Close">
            &times;
          </button>
        </div>
        <div class="modal-body">
          <form action="{{ route('control.editSubjectTopic') }}"  method="POST" action enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-lg-12">
                    <x-jet-validation-errors class="mb-4"/>
                    <div class="form-group">
                        <label>Topic</label>

                        <input type="text" class="form-control edit_topic_topic" name="topic" value="{{ old('topic') }}">
                        <input type="hidden" name="id" class="edit_topic_id">
                    </div>
                    <button type="submit" class="btn btn-primary mt-2 btn-sm float-right">Update</button>
                </div>
            </div>
          </form>
        </div>
      </div>
    </div>
</div>



<script src="{{ asset('assets/libs/jquery/dist/jquery.min.js') }}"></script>
<script>


    $('.addTopic').on('click', function(){
        $('#addTopic').modal('show');
    });


    $('body').on('click', '.editTopic', function () {
        $('.edit_topic_id').val( $(this).data('id') )
        $('.edit_topic_topic').val( $(this).data('topic') )
        $('#editTopic').modal('show');
    })


    

    
    

</script>

@endsection
