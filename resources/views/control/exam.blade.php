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
                    <div class="card-header border-bottom-0 d-flex justify-content-between ">
                        <h3 class="h4 mb-0">Created Exam</h3>
                        <button class="btn btn-primary btn-xs addExamType">Add Exam</button>
                    </div>
                    <div class="table-responsive border-0">
                        @if($types->isEmpty())
                            <div class=" alert alert-danger mt-1 mr-1">No exam has been created so far</div>
                        @else
                            <table class="table mb-0">
                                <thead class="table-light">
                                    <tr>
                                        <th scope="col" class="border-0">#</th>
                                        <th scope="col" class="border-0">Exam Title</th>
                                        <th scope="col" class="border-0">Description</th>
                                        <th scope="col" class="border-0">Updated</th>
                                        <th scope="col" class="border-0"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($types as $type)
                                        <tr>
                                            <td> {{$loop->iteration}} </td>
                                            <td><a href="exam/{{$type->slug}}"> {{$type->type}} </a></td>
                                            <td> {{$type->description}} </td>
                                            <td> {{$type->updated_at}} </td>
                                            <td> {{$type->subjects->count()}} sub </td>
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




<div class="modal fade" id="addExamType" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable ">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="staticBackdropLabel">Add Exam</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal"
            aria-label="Close">
            &times;
          </button>
        </div>
        <div class="modal-body">
          <form  method="POST" action="{{ route('control.createExamType') }} " enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-lg-12">
                    <x-jet-validation-errors class="mb-4"/>
                    <div class="form-group">
                        <label>Exam Title</label>
                        <input type="text" class="form-control" name="type" value="{{ old('type') }}">
                    </div>
                    <div class="form-group">
                        <label>Description</label>
                        <textarea name="description" rows="3" class="form-control">{{ old('description') }}</textarea>
                    </div>
                    <button class="btn btn-primary mt-2 btn-sm float-right">Add</button>
                </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>


<script src="{{ asset('assets/libs/jquery/dist/jquery.min.js') }}"></script>
<script>
    $('.addExamType').on('click', function(){
        $('#addExamType').modal('show');
    });
</script>

@endsection
