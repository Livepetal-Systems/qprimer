@extends('layouts/app')
@section('title')
    My Exams
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
                            <h3 class="mb-0">Subscriptions</h3>
                        </div>
                        <!-- Card body -->
                        <div class="card-body">
                            <input type="hidden" id="myExamsJson" value=" {{ json_encode(getProgram(auth()->user()->id)) }} ">
                            <div class="row" id="displayMyExamsBody">
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>







    <div class="modal fade" id="show_subject_modal" data-backdrop="static" data-keyboard="false"
    tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable ">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title show_subject_title" id="staticBackdropLabel"></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"
                    aria-label="Close">
                    &times;
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-12">
                        <div class="table-responsive">
                            <table class="table table-sm table-striped">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Subject</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody id="displaySubjectsBody">

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<div class="modal fade" id="show_programs_modal" data-backdrop="static"
    data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable ">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title " id="staticBackdropLabel">Programs</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"
                    aria-label="Close">
                    &times;
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-12">
                        <div class="table-responsive">
                            <table class="table table-sm table-striped">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Subject</th>
                                        <th>Year</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody id="displayProgramsBody">

                                </tbody>
                            </table>
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
        $(function() {
            myexams = $('#myExamsJson').val();
            myexams = JSON.parse(myexams)
            // $.ajax({
            //     method: 'GET',
            //     url : '/fetchUserProgramViaJs/'+ '{{auth()->user()->id}}'
            // }).done( function (res) {
            //     console.log(res);
            // })
            body = $('#displayMyExamsBody');
            myexams.map((exam) => {
                const son = document.createElement('div')
                son.classList.add('col-lg-4');
                son.classList.add('col-md-6');
                body.append(son)
                info = exam['info']
                sonContent = `
                <div class="card  mb-4 card-hover">
                    <div class="card-body">
                        <h3 class="h4 mb-2 text-truncate-line-2 showProgram" data-subjects='${JSON.stringify(exam['subjects'])}' data-programs='${JSON.stringify(exam['program'])}' data-title="${info['title']}" ><a href="javascript:;" class="text-inherit">${info['title']}</a>
                        </h3>
                        <p><small class="text-sm">${info['description']}<small></p>
                    </div>
                    <div class="card-footer">
                        <div class="row align-items-center g-0">
                            <div class="col-auto">
                                <img src="{{ asset('assets/img/avatar/avatar-6.jpg') }}" class="rounded-circle avatar-xs"
                                    alt="">
                            </div>
                            <div class="col ms-2">
                                <span> ${info['owner']}</span>
                            </div>
                            <div class="col-auto">
                                <a href="#" class="removeBookmark">
                                    <i class="fas fa-bookmark"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            `
                son.innerHTML = sonContent
            })
        });




        $('body').on('click', '.showProgram', function() {
            subjects = $(this).data('subjects');
            $('.show_subject_title').html($(this).data('title'));
            $('#show_subject_modal').modal('show');
            $('#displaySubjectsBody').html(``);
            body = $('#displaySubjectsBody');

            subjects.map((subject, index) => {
                const son = document.createElement('tr')
                body.append(son)
                sonContent = `
                    <td>${index+1}</td>
                    <td>${subject['subject']} (${subject['code']})</td>
                    <td class="text-muted align-middle">
                        <span class="dropdown dropstart">
                            <a class="text-muted text-decoration-none" href="#" role="button"
                                id="courseDropdown2" data-bs-toggle="dropdown"
                                data-bs-offset="-20,20" aria-expanded="false">
                                <i class="fe fe-more-vertical"></i>
                            </a>
                            <span class="dropdown-menu" aria-labelledby="courseDropdown2">
                                <span class="dropdown-header">Menu </span>
                                <a class="dropdown-item" href="#"><i class="fe fe-edit dropdown-item-icon"></i>Topic</a>
                                <a class="dropdown-item disPlayPrograms" href="javascript:;" data-programs='${ JSON.stringify(subject.programs) }'><i class="fe fe-info dropdown-item-icon"></i>Take Exam</a>
                            </span>
                        </span>
                    </td>
            `
                son.innerHTML = sonContent
            })
        });


        $('body').on('click', '.disPlayPrograms', function() {
            programs = $(this).data('programs');
            $('#show_programs_modal').modal('show');
            $('#displayProgramsBody').html(``);
            body = $('#displayProgramsBody');
            programs.map((program, index) => {
                const son = document.createElement('tr')
                body.append(son)
                sonContent = `
                    <td>${index+1}</td>
                    <td>${program['subject']}</td>
                    <td>${program['year']}</td>
                    <td class="text-muted align-middle">
                        <form action="{{ route('user.startExam') }}" method="post">
                            @csrf @csrf
                            <button type="submit" name="program" value='${program['id']}' class="btn btn-xs btn-info">Proceed</button>
                        </form>
                    </td>
            `
                son.innerHTML = sonContent
            })
        });
    </script>


@endsection
