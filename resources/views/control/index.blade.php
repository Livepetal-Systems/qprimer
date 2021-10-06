@extends('layouts/app')
@section('title')
Instructor | Index
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
                <div class="row">
                    <div class="col-lg-4 col-md-12 col-12">
                        <!-- Card -->
                        <div class="card mb-4">
                            <div class="p-4">
                                <span class="fs-6 text-uppercase fw-semi-bold">Revenue</span>
                                <h2 class="mt-4 fw-bold mb-1 d-flex align-items-center h1 lh-1">
                                    $467.34
                                </h2>
                                <span class="d-flex justify-content-between align-items-center">
                                    <span>Earning this month</span>
                                    <span class="badge bg-success ms-2">$203.23</span>
                                </span>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-12 col-12">
                        <!-- Card -->
                        <div class="card mb-4">
                            <div class="p-4">
                                <span class="fs-6 text-uppercase fw-semi-bold">students Enrollments</span>
                                <h2 class="mt-4 fw-bold mb-1 d-flex align-items-center h1 lh-1">
                                    12,000
                                </h2>
                                <span class="d-flex justify-content-between align-items-center">
                                    <span>New this month</span>
                                    <span class="badge bg-info ms-2">120+</span>
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-12 col-12">
                        <!-- Card -->
                        <div class="card mb-4">
                            <div class="p-4">
                                <span class="fs-6 text-uppercase fw-semi-bold">Project Rating</span>
                                <h2 class="mt-4 fw-bold mb-1 d-flex align-items-center h1 lh-1">
                                    4.80
                                </h2>
                                <span class="d-flex justify-content-between align-items-center">
                                    <span>Rating this month</span>
                                    <span class="badge bg-warning ms-2">10+</span>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Card -->
                <div class="card mb-4">
                    <!-- Card header -->
                    <div class="card-header">
                        <h3 class="h4 mb-0">Earnings</h3>
                    </div>
                    <!-- Card body -->
                    <div class="card-body">
                        <div id="earning" class="apex-charts"></div>
                    </div>
                </div>

                <div class="card mb-4">
                    <!-- Card header -->
                    <div class="card-header border-bottom-0">
                        <h3 class="h4 mb-0">Best Selling Project</h3>
                    </div>
                    <!-- Table -->
                    <div class="table-responsive border-0">
                        <table class="table mb-0">
                            <!-- Table head -->
                            <thead class="table-light">
                                <tr>
                                    <th scope="col" class="border-0">PROJECT</th>
                                    <th scope="col" class="border-0">SALES</th>
                                    <th scope="col" class="border-0">AMOUNT</th>
                                    <th scope="col" class="border-0"></th>
                                </tr>
                            </thead>
                            <!-- Table body -->
                            <tbody>
                                <tr>
                                    <td class="align-middle border-top-0">
                                        <a href="#">
                                            <div class="d-lg-flex align-items-center">
                                                <img src="{{ asset('assets/img/course/course-laravel.jpg') }}" alt="" class="rounded img-4by3-lg" />
                                                <h5 class="mb-0 ms-lg-3 mt-2 mt-lg-0 text-primary-hover">
                                                    Building Scalable APIs with GraphQL
                                                </h5>
                                            </div>
                                        </a>
                                    </td>
                                    <td class="align-middle border-top-0">34</td>
                                    <td class="align-middle border-top-0">$3,145.23</td>
                                    <td class="text-muted align-middle border-top-0">
                                        <span class="dropdown dropstart">
                                            <a class="text-muted text-decoration-none" href="#" role="button" id="courseDropdown1"
                                                data-bs-toggle="dropdown" data-bs-offset="-20,20" aria-expanded="false">
                                                <i class="fe fe-more-vertical"></i>
                                            </a>
                                            <span class="dropdown-menu" aria-labelledby="courseDropdown1">
                                                <span class="dropdown-header">Setting </span>
                                                <a class="dropdown-item" href="#"><i class="fe fe-edit dropdown-item-icon"></i>Edit</a>
                                                <a class="dropdown-item" href="#"><i class="fe fe-trash dropdown-item-icon"></i>Remove</a>
                                            </span>
                                        </span>
                                    </td>
                                </tr>
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


@endsection