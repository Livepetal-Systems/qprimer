@extends('layouts/app')
@section('title')
    User | Examination
@endsection

@section('pagecontent')
@php
    $program = session()->get('program');
    $info = session()->get('p_info');
    $que = session()->get('que');
    //print_r($que); exit;
@endphp
    <!-- Page Content -->
    <div class="pt-5 pb-5">
        <div class="container">
            {{-- bg --}}

            <!-- Content -->

            <div class="row mt-0 mt-md-4">

                <div class="col-lg-12 col-md-12 col-12" style="display:block" id="exam">
                    <!-- Card -->
                    <div class="card mb-2">
                        <!-- Card header -->
                        <div class="card-header">
                            <div class="mb-lg-0 mb-3">
                                <h3 class="mb-1" style="float: left;">{{$info['type']}} {{$info['subject']}} {{$info['year']}} Exam: <?php $data = $info;
                                    $total = $data['total_question'];
                                    echo $total; ?> Questions
                                </h3>
                                <div style="float: right;">
                                    <div class="form-check form-switch">
                                        <table>
                                            <tr>
                                                <th style="padding-right: 40px;"><label class="form-check-label"
                                                        for="swicthOne">Auto Next</label></th>
                                                <td>
                                                    <input type="checkbox" class="form-check-input" id="swicthOne"
                                                        value="1" checked />
                                                </td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>
                            </div><br><br>
                            <div id='topnav' style="display:none;" class="table-responsive">
                                <table>
                                    <tr>
                                        <?php $i=1; while($i<=$total){ $e=$i++; ?>
                                        <td><span id="q<?= $e ?>" class="btn btn-xs btn-outline-primary m-1"
                                                onclick="nextQ(<?= $e ?>)"><?= $e ?></span></td>
                                        <?php } ?>
                                    </tr>
                                </table>
                            </div>
                        </div>
                        <!-- Card body -->
                        <div class="card-body">
                            <!-- List group -->


                            <?php function options($y,$e,$v,$a){ ?>
                            <div class="form-check">
                                <input type="radio" onchange="newOpt('<?= $a ?>',<?= $e ?>)"
                                    id="customRadio<?= $a . $e ?>" name="customRadio<?= $e ?>"
                                    class="form-check-input" />
                                <label class="form-check-label" for="customRadio<?= $a . $e ?>"><span
                                        class="h4"><?= $y[$v][$a] ?></span>
                                </label>

                            </div>
                            <?php } $y = $que; $i=1;  while($i<=$total){ $e=$i++; $v=$e-1;  ?>
                                <div id="<?= $e ?>" style="display: none;">
                                    <span class="h4" style="float: left;">Q<?= $e ?>.</span> <span
                                        class="h4"><?= $y[$v]['questions'] ?></span>
                                    <?= options($y, $e, $v, 'a') . options($y, $e, $v, 'b') . options($y, $e, $v, 'c') . options($y, $e, $v, 'd') ?>

                                </div>
                            <?php } ?>
                        </div>


                        <!-- button -->
                        <div class="card-footer">
                            <!-- Pagination  -->
                            <div class="table-responsive">
                                <span style="float:left; display:none" id="progress"
                                    class="btn btn-sm btn-outline-primary"><span id="page"></span>/<?= $total ?></span>
                                <span style="float:right" id="submit"></span>
                                <nav>
                                    <ul class="pagination justify-content-center mb-0" id="qnav">
                                        <li id="a1" class="page-item">
                                            <a class="page-link mx-1 rounded" href="javascript:;" onclick="nextQ(0)"><i
                                                    class="mdi mdi-chevron-left"></i> Information</a>
                                        </li>
                                        <!-- 
           <li class="page-item">
            <a class="page-link mx-1 rounded" href="javascript:;">1</a>
           </li> -->

                                        <li id="a4" class="page-item">
                                            <a class="page-link mx-1 rounded" href="javascript:;"
                                                onclick="startExam()">Start Exam <i class="mdi mdi-chevron-right"></i>
                                            </a>
                                            
                                        </li>
                                    </ul>
                                </nav>
                            </div>

                        </div>

                    </div>
                </div>
                <div class="col-12" style="display:none" id="rev">


                    <div class="row" id="examstat">
                    </div>


                    <div class="card mb-2">
                        <!-- Card header -->
                        <div class="card-header">
                            <div class="mb-lg-0 mb-3">
                                <h3 class="mb-1">Exam Review</h3>
                                <span>Manage your performance</span>
                            </div>
                        </div>
                        <!-- header -->
                        <div class="card-body" id="review">12345</div>

                    </div>

                </div>
            </div>
        </div>

        <!-- Scripts -->
        <!-- Libs JS -->
        <script src="../assets/libs/jquery/dist/jquery.min.js"></script>


        <script type="text/javascript">
            document.getElementById('options').onchange = function() {
                var i = 1;
                var myDiv = document.getElementById(i);
                while (myDiv) {
                    myDiv.style.display = 'none';
                    myDiv = document.getElementById(++i);
                }
                document.getElementById(this.value).style.display = 'block';
            };

            function nextQ(v) {
                total = <?= $total ?>;
                if (v == 0 || v > total) {} else {
                    var i = 1;
                    var myDiv = document.getElementById(i);
                    var topnav = document.getElementById('topnav');
                    var a = v - 1;
                    var b = v + 1;
                    // alert(b);
                    while (myDiv) {
                        myDiv.style.display = 'none';

                        // 'a'+myDiv.classList.remove("active");
                        myDiv = document.getElementById(++i);
                    }
                    document.getElementById(v).style.display = 'block';
                    topnav.style.display = 'block';
                    // if(a==0){var a = '';}
                    if (b > total) {
                        var b = 0;
                    }
                    $('#qnav').html(
                        '<li class="page-item"><a class="page-link mx-1 rounded" href="javascript:;" onclick="nextQ(' + a +
                        ')"><i class="mdi mdi-chevron-left"></i> Previous: ' + a +
                        '</a></li><li class="page-item active" style="margin: 0 10px;"><a class="page-link mx-1 rounded" href="javascript:;">' +
                        v +
                        '</a></li><li class="page-item"><a class="page-link mx-1 rounded" href="javascript:;" onclick="nextQ(' +
                        b + ')">Next: ' + b + ' <i class="mdi mdi-chevron-right"></i> </a></li>');

                }
            };

            function newOpt(x, y) {
                total = <?= $total ?>;
                var myQ = document.getElementById('q' + y);
                var progress = document.getElementById('progress');
                //	 var v = document.getElementById('swicthOne').value;
                var v = 1;
                n = y + 1;
                myQ.classList.add("active");
                $.ajax({
                    type: 'get',
                    url: 'services.php/newoption/'+ x +'/'+ y
                }).done(function(data) {
                    $('#page').html(data);
                    progress.style.display = 'block';
                    if (data == total) {
                        progress.classList.add("active");
                        $('#submit').html(
                            '<span onclick="endExam()" class="btn btn-sm btn-outline-primary active">Submit Exam</span>'
                        );
                    }
                    if (document.getElementById('swicthOne').checked) {
                        nextQ(n);
                    }
                })
            }

            function startExam() {
                nextQ(1);
            }



            function endExam() {
                var rev = document.getElementById('rev');
                var exam = document.getElementById('exam');
                exam.style.display = 'none';
                rev.style.display = 'block';
                $.ajax({
                    type: 'get',
                    url: 'services.php/submitexam'
                }).done(function(data) {
                    $('#page').html(data);
                    $('#review').html(data);
                })
                $('#examstat').load('services.php/stat');
                $.ajax({
                    type: 'get',
                    url: '/user/currentQuestionSession'
                }).done(function(res) {
                    info = <?= json_encode(session()->get('p_info')) ?>;
                    console.log(info,res);
                    $.ajax({
                        type: 'post',
                        url: '/user/submitExam',
                        data: {
                            "_token": "{{ csrf_token() }}",
                            questions: res,
                            info: info,
                        }
                    }).done(function(res) {
                        console.log(res);
                    })
                });

                

            }

            
        </script>

@endsection