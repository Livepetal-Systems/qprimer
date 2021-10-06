@extends('layouts/app')
@section('title')
Questions
@endsection

@section('pagecontent')

@php
    $page = $_GET['page'] ?? 1;
    $top = (session()->has('topic'))? session()->get('topic') : '';
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
                        <h3 class="h4 mb-0"> {{$program->typ->type.' '.$program->sub->subject.' '.$program->yer->year}}  Questions </h3>
                    </div>

                    <div class="card-body">
                        <form action="{{ route('control.addProgramQuestion') }}" method="post">
                            @csrf
                            <div class="row">
                                <div class="col-lg-12 col-12">
                                    <label>Topic</label>
                                    <select name="topic" class="form-control" required>
                                        <option selected disabled>--Select Topic --</option>
                                        @foreach ($program->sub->topics as $topic)
                                            <option @php echo ($top == $topic->id)? 'selected': '' @endphp value="{{$topic->id}}">{{$topic->topic}}</option>
                                        @endforeach
                                    </select>

                                    <label class="mt-3" >Question</label>
                                    <textarea name="question" class="form-control" rows="4" required></textarea>
                                </div>

                                <div class="col-lg-3 col-md-6 col-12 mt-3">
                                    <label >Option A:</label>
                                    <textarea name="a" class="form-control" rows="2"></textarea>
                                </div>

                                <div class="col-lg-3 col-md-6 col-12 mt-3">
                                    <label >Option B:</label>
                                    <textarea name="b" class="form-control" rows="2"></textarea>
                                </div>

                                <div class="col-lg-3 col-md-6 col-12 mt-3">
                                    <label >Option C:</label>
                                    <textarea name="c" class="form-control" rows="2"></textarea>
                                </div>
                                <div class="col-lg-3 col-md-6 col-12 mt-3">
                                    <label >Option D:</label>
                                    <textarea name="d" class="form-control" rows="2"></textarea>
                                </div>

                                <div class="col-6 mt-3">
                                    <label>Correct Option</label>
                                    <select name="ca" class="form-control" required>
                                        <option selected disabled>--Select Correct Option --</option>
                                        <option value="A">A</option>
                                        <option value="B">B</option>
                                        <option value="C">C</option>
                                        <option value="D">D</option>
                                    </select>

                                    <input type="hidden" name="program_id" value="{{$program->id}}" required>
                                </div>

                                <div class="col-6 mt-6">
                                    <button class="btn btn-primary " style="float: right">Submit</button>
                                </div>


                            </div>
                        </form>
                    </div>

                    <div class="table-responsive border-0">
                        <table class="table mb-0">
                            <thead class="table-light">
                                <tr>
                                    <th scope="col" class="border-0">#</th>
                                    <th scope="col" class="border-0">Question</th>
                                    <th scope="col" class="border-0">A</th>
                                    <th scope="col" class="border-0">B</th>
                                    <th scope="col" class="border-0">C</th>
                                    <th scope="col" class="border-0">D</th>
                                    <th scope="col" class="border-0">CA</th>
                                    <th scope="col" class="border-0">Updated</th>
                                    <th scope="col" class="border-0"></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($questions as $question)
                                    <tr>
                                        <td>{{$loop->iteration}}</td>
                                        <td>{!! $question->question !!}</td>
                                        <td>{!! $question->a !!}</td>
                                        <td>{!! $question->b !!}</td>
                                        <td>{!! $question->c !!}</td>
                                        <td>{!! $question->d !!}</td>
                                        <td>{!! $question->ca !!}</td>
                                        <td>{!! $question->updated_at !!}</td>
                                        <td>
                                            <a href="/control/program/question/edit/{{sha1($program->id)}}/{{$program->id}}/{{$question->id}}" class="btn btn-xs btn-primary uploadPics" data-id="{{$program->id}}"> <i class="fe fe-edit" aria-hidden="true"></i></a>
                                       </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                    <div class="pt-2 pb-2">
                        <!-- Pagination -->
                        <nav>
                            <ul class="pagination justify-content-center mb-0">
                                {{ $questions->links("pagination::bootstrap-4") }}
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<script src="{{ asset('assets/libs/jquery/dist/jquery.min.js') }}"></script>
<script>




</script>

@endsection
