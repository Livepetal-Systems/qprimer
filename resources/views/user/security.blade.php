@extends('layouts/app')
@section('title')
Security
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
                <div class="card">
                    <!-- Card header -->
                    <div class="card-header">
                        <h3 class="mb-0">Security</h3>
                        <p class="mb-0">
                            Change your password here.
                        </p>
                    </div>
                    <!-- Card body -->
                    <div class="card-body">
                        <div>
                            <h4 class="mb-0">Change Password</h4>
                            <p>
                                We will email you a confirmation when changing your
                                password, so please expect that email after submitting.
                            </p>
                            <!-- Form -->
                            <form class="row">
                                <div class="col-lg-6 col-md-12 col-12">
                                        <!-- Current password -->
                                    <div class="mb-3">
                                        <label class="form-label" for="currentpassword">Current password</label>
                                        <input id="currentpassword" type="password" name="currentpassword" class="form-control"
                                            placeholder="" required/>
                                    </div>
                                        <!-- New password -->
                                    <div class="mb-3 password-field">
                                        <label class="form-label" for="newpassword">New password</label>
                                        <input id="newpassword" type="password" name="newpassword" class="form-control mb-2"
                                            placeholder="" required />
                                        <div class="row align-items-center g-0">
                                            <div class="col-6">
                                                <span data-bs-toggle="tooltip" data-placement="right"
                                                    title="Test it by typing a password in the field below. To reach full strength, use at least 6 characters, a capital letter and a digit, e.g. 'Test01'">Password
                                                    strength
                                                    <i class="fas fa-question-circle ms-1"></i></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                            <!-- Confirm new password -->
                                        <label class="form-label" for="confirmpassword">Confirm New Password</label>
                                        <input id="confirmpassword" type="password" name="confirmpassword" class="form-control mb-2"
                                            placeholder="" required />
                                    </div>
                                        <!-- Button -->
                                    <button type="submit" class="btn btn-primary">
                                        Save Password
                                    </button>
                                    <div class="col-6"></div>
                                </div>
                            </form>
                        </div>
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