@extends('layouts/app')
@section('title')
Exam Hitory
@endsection

@section('pagecontent')

@php
    $user = auth()->user();
@endphp

<link rel="stylesheet" href="{{ asset('assets/css/custom.css') }}">

<div class="pt-5 pb-5">
    <div class="container">
            <!-- User info -->
        <div class="row align-items-center">
            <div class="col-xl-12 col-lg-12 col-md-12 col-12">
                <!-- Bg -->
                @include('user/user_bg')
            </div>
        </div>
        <div class="row mt-0 mt-md-4">
            <div class="col-lg-3 col-md-4 col-12">
                <!-- Side navbar -->
                @include('user/user_nav')
            </div>
            <div class="col-lg-9 col-md-8 col-12">
                <!-- Card -->
                <div class="card mb-4">
                    <!-- Card header -->
                    <div class="card-header border-bottom-0">
                        <h3 class="h4 mb-0">RECENT PRATICE HISTORY</h3>
                    </div>
                    <!-- Table -->
                    <?php 
                        $historys = getHistory(auth()->user()->id);
                    ?>
                    <div class="table-responsive border-0">
                        <table class="table mb-0">
                            <!-- Table head -->
                            <thead class="table-light">
                                <tr>
                                    <th scope="col" class="border-0">EXAM</th>
                                    <th scope="col" class="border-0">SUBJECT</th>
                                    <th scope="col" class="border-0">SCORE</th>
                                    <th scope="col" class="border-0">Date</th>
                                    <th scope="col" class="border-0"></th>
                                    <th scope="col" class="border-0"></th>
                                    <th scope="col" class="border-0"></th>
                                </tr>
                            </thead>
                            <!-- Table body -->
                            <tbody>
                                @foreach ($historys as $his)
                                    <tr>
                                        <td class="align-middle border-top-0">
                                            <h5>
                                                {{$his['type']}}
                                            </h5>
                                        </td> 
                                        <td class="align-middle">{{$his['subject'].' '.$his['year']}}</td>
                                        <td class="align-middle">{{number_format(100 * ($his['total_correct'] / $his['total_questions']), 1 ) }}%</td>
                                        <td colspan="3">{{date('D j M, y | H : i A',  strtotime($his['date']) )}}</td>
                                        <td class="text-muted align-middle">
                                            <span class="dropdown dropstart">
                                                <a class="text-muted text-decoration-none" href="#" role="button"
                                                    id="courseDropdown2" data-bs-toggle="dropdown"
                                                    data-bs-offset="-20,20" aria-expanded="false">
                                                    <i class="fe fe-more-vertical"></i>
                                                </a>
                                                <span class="dropdown-menu" aria-labelledby="courseDropdown2">
                                                    <span class="dropdown-header">Menu</span>
                                                    <a class="dropdown-item" href="#"><i
                                                            class="fe fe-edit dropdown-item-icon"></i>Retake</a>
                                                    <a class="dropdown-item" href="#"><i
                                                            class="fe fe-info dropdown-item-icon"></i>More Info</a>
                                                </span>
                                            </span>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>


<script src="{{ asset('assets/libs/jquery/dist/jquery.min.js') }}"></script>
<script src="{{ asset('assets/js/img.js') }}"></script>

<script>
    $(function () {
       
       $('.updatePicture').on('click', function() {
            $('#updatePicture_modal').modal('show'); 
       });

    });
</script>

@endsection
