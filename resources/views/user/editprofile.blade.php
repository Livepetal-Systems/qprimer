@extends('layouts/app')
@section('title')
    Edit Profile
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
                            <h3 class="mb-0">Profile Details</h3>
                            <p class="mb-0">
                                You have full control to manage your own account setting.
                            </p>
                        </div>
                        <!-- Card body -->
                        <div class="card-body">
                            <div class="d-lg-flex align-items-center justify-content-between">
                                <div class="d-flex align-items-center mb-4 mb-lg-0">
                                    <img src="{{ asset('assets/img/avatar/' . proPics()) }}" id="img-uploaded"
                                        class="avatar-xl rounded-circle" alt="" />
                                    <div class="ms-3">
                                        <h4 class="mb-0">Your avatar</h4>
                                        <p class="mb-0">
                                            PNG or JPG no bigger than 800px wide and tall.
                                        </p>
                                    </div>
                                </div>
                                <div>
                                    <form class="form-inline" action="{{ route('user.deleteProfilePics') }}" method="POST">@csrf
                                        <a href="#" class="btn btn-outline-white btn-sm updatePicture">Update</a>
                                        <input type="hidden" name="id" value="{{ auth()->user()->id }}">
                                        <button type="submit" class="btn btn-outline-danger btn-sm" onclick="return confirm('Your picture will be removed')" >Remove</button>
                                    </form>
                                </div>
                            </div>
                            <hr class="my-5" />
                            <div>
                                <h4 class="mb-0">Personal Details</h4>
                                <!-- Form -->
                                <form method="POST" action="{{ route('user.updateProfile') }}" autocomplete="off"
                                    class="row">
                                    @csrf
                                    <!-- First name -->
                                    <div class="mb-3 col-12 col-md-6">
                                        <label class="form-label" for="fname">First Name</label>
                                        <input type="hidden" name="id" value="{{ auth()->user()->id }}">
                                        <input type="text" name="firstname" value="{{ auth()->user()->firstname }}"
                                            class="form-control" placeholder="First Name" required />
                                    </div>
                                    <!-- Last name -->
                                    <div class="mb-3 col-12 col-md-6">
                                        <label class="form-label" for="lname">Last Name</label>
                                        <input type="text" name="lastname" value="{{ auth()->user()->lastname }}"
                                            class="form-control" placeholder="Last Name" required />
                                    </div>
                                    <div class="col-12">
                                        <!-- Button -->
                                        <button class="btn btn-primary" type="submit">
                                            Update Profile
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="updatePicture_modal" tabindex="-1" role="dialog" aria-labelledby="taskModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="taskModalLabel">Chanage Picture</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                        &times;
                    </button>
                </div>
                <div class="modal-body">
                    <form method="POST" action="{{ route('user.uploadProfilePics') }}" enctype="multipart/form-data"
                        class="row">@csrf
                        <div class="mb-2 col-12">
                            <input type="hidden" name="id" value="{{ auth()->user()->id }}">
                            <div class="card-body">
                                <div class="custom-file-container" data-upload-id="courseCoverImg" id="courseCoverImg">
                                    <label class="form-label">Avatar
                                        <a href="javascript:void(0)" class="custom-file-container__image-clear"
                                            title="Clear Image"></a></label>
                                    <label class="custom-file-container__custom-file">
                                        <input type="file" class="custom-file-container__custom-file__custom-file-input"
                                            accept="image/*" name="photo" />
                                        <span class="custom-file-container__custom-file__custom-file-control"></span>
                                    </label>
                                    <small class="mt-3 d-block">Upload your profile image here. Important guidelines: .jpg,
                                        .jpeg, or .png. no text on the image.</small>
                                    <div class="custom-file-container__image-preview"></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 mt-5">
                            <div class=" d-flex justify-content-end">
                                <button type="button" class="btn btn-outline-secondary
                                    me-2" data-bs-dismiss="modal">Cancel</button>
                                <button type="submit" class="btn btn-primary">Upload</button>
                            </div>
                        </div>

                    </form>
                </div>

            </div>
        </div>
    </div>


    <script src="{{ asset('assets/libs/jquery/dist/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/js/img.js') }}"></script>

    <script>
        $(function() {

            $('.updatePicture').on('click', function() {
                $('#updatePicture_modal').modal('show');
            });

        });
    </script>

@endsection
