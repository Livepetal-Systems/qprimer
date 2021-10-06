
<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">


<!-- Favicon icon-->
<link rel="shortcut icon" type="image/x-icon" href="../assets/images/favicon/favicon.ico">


<!-- Libs CSS -->

<link href="assets/fonts/feather/feather.css" rel="stylesheet" />
<link href="assets/libs/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet" />
<link href="assets/libs/dragula/dist/dragula.min.css" rel="stylesheet" />
<link href="assets/libs/%40mdi/font/css/materialdesignicons.min.css" rel="stylesheet" />
<link href="assets/libs/prismjs/themes/prism.css" rel="stylesheet" />
<link href="assets/libs/dropzone/dist/dropzone.css" rel="stylesheet" />
<link href="assets/libs/magnific-popup/dist/magnific-popup.css" rel="stylesheet" />
<link href="assets/libs/bootstrap-select/dist/css/bootstrap-select.min.css" rel="stylesheet">
<link href="assets/libs/%40yaireo/tagify/dist/tagify.css" rel="stylesheet">
<link href="assets/libs/tiny-slider/dist/tiny-slider.css" rel="stylesheet">
<link href="assets/libs/tippy.js/dist/tippy.css" rel="stylesheet">
<link href="assets/libs/datatables.net-bs5/css/dataTables.bootstrap5.min.css" rel="stylesheet">





<!-- Theme CSS -->
<link rel="stylesheet" href="../assets/css/theme.min.css">
  <title>CBT | Sign in</title>
</head>

<body>
  <!-- Page content -->
  <div class="container d-flex flex-column">
    <div class="row align-items-center justify-content-center g-0 min-vh-100">
      <div class="col-lg-5 col-md-8 py-8 py-xl-0">
        <!-- Card -->
        <div class="card shadow ">
          <!-- Card body -->
          <div class="card-body p-6">
            <div class="mb-4">
              <a href="#"><img src="assets/img/brand/logo/logo.png" class="mb-4" alt=""></a>
              <h1 class="mb-1 fw-bold">Sign in</h1>
              <span>Don’t have an account? <a href="#" class="ms-1">Sign up</a></span>
            </div>
            <!-- Form -->
            <form>
                @include('layouts/includes/alert')
                <div id="alert"></div>

              	<!-- Username -->
              <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" name="email" class="form-control" id="login_email" placeholder="Email address here" required>
              </div>
              	<!-- Password -->
              <div class="mb-3">
                  <input type="hidden" class="allLink" value="{{ env('APILINK') }}">
                <label for="password" class="form-label">Password</label>
                <input type="password" name="password"  id="login_password" class="form-control" placeholder="**************" required>
              </div>
              	<!-- Checkbox -->
              <div class="d-lg-flex justify-content-between align-items-center mb-4">
                <div class="form-check">
                  <input type="checkbox" class="form-check-input" id="rememberme">
                  <label class="form-check-label " for="rememberme">Remember me</label>
                </div>

              </div>
              <div>
                	<!-- Button -->
                <div class="d-grid">
                    <button class="btn btn-primary"  id="login">Sign in</button>
                </div>
              </div>

            </form>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Scripts -->
  <!-- Libs JS -->
<script src="assets/libs/jquery/dist/jquery.min.js"></script>
<script src="assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
<script src="assets/libs/odometer/odometer.min.js"></script>
<script src="assets/libs/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<script src="assets/libs/magnific-popup/dist/jquery.magnific-popup.min.js"></script>
<script src="assets/libs/bootstrap-select/dist/js/bootstrap-select.min.js"></script>
<script src="assets/libs/flatpickr/dist/flatpickr.min.js"></script>
<script src="assets/libs/inputmask/dist/jquery.inputmask.min.js"></script>
<script src="assets/libs/apexcharts/dist/apexcharts.min.js"></script>
<script src="assets/libs/quill/dist/quill.min.js"></script>
<script src="assets/libs/file-upload-with-preview/dist/file-upload-with-preview.min.js"></script>
<script src="assets/libs/dragula/dist/dragula.min.js"></script>
<script src="assets/libs/bs-stepper/dist/js/bs-stepper.min.js"></script>
<script src="assets/libs/dropzone/dist/min/dropzone.min.js"></script>
<script src="assets/libs/jQuery.print/jQuery.print.js"></script>
<script src="assets/libs/prismjs/prism.js"></script>
<script src="assets/libs/prismjs/components/prism-scss.min.js"></script>
<script src="assets/libs/%40yaireo/tagify/dist/tagify.min.js"></script>
<script src="assets/libs/tiny-slider/dist/min/tiny-slider.js"></script>
<script src="assets/libs/%40popperjs/core/dist/umd/popper.min.js"></script>
<script src="assets/libs/tippy.js/dist/tippy-bundle.umd.min.js"></script>
<script src="assets/libs/typed.js/lib/typed.min.js"></script>
<script src="assets/libs/jsvectormap/dist/js/jsvectormap.min.js"></script>
<script src="assets/libs/jsvectormap/dist/maps/world.js"></script>
<script src="assets/libs/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="assets/libs/datatables.net-bs5/js/dataTables.bootstrap5.min.js"></script>
<script src="assets/libs/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
<script src="assets/libs/datatables.net-responsive-bs5/js/responsive.bootstrap5.min.js"></script>




<!-- clipboard -->
<script src="cdnjs.cloudflare.com/ajax/libs/clipboard.js/1.5.12/clipboard.min.js"></script>


<!-- Theme JS -->
<script src="../assets/js/theme.min.js"></script>
<script src="assets/js/custom.js"></script>

<script>
    $(function () {

        //validating login form input on submit
        $('#login').on('click', function (e) {
            e.preventDefault();

            const email = $('#login_email').val();
            const password = $('#login_password').val();

            if(email == '' || password == ''){
                report('Email/Password cannot be empty', '#alert', 1)
            }else{
                $('#alert').html('');
                $.ajax({
                    method: 'POST',
                    url: link,
                    data : {
                        LoginUserApi : '',
                        email : email,
                        password : password,
                    },
                    beforeSend: () => {
                        $('#login').html(`Processing....`)
                        $('#login').attr('disabled', 'disabled')
                    }
                }).done( function (res) {
                    console.log(res);
                    res = JSON.parse(res);
                    $('#alert').fadeIn();
                    if(res.success){
                        report(res.message, '#alert', 1)
                        $.ajax({
                            url : 'loginUser',
                            method : 'POST',
                            data : {
                                "_token": "{{ csrf_token() }}",
                                live_id : res.data.sn,
                                firstname : res.data.firstname,
                                lastname : res.data.lastname,
                                email : res.data.email,
                                password : res.data.pass,
                                phone : res.data.phone,
                            },

                            beforeSend: () => {
                                $('#alert').html(`Authenticating.....`)
                                $('#alert').attr('class', 'alert alert-success')
                            }
                        }).done( function (res) {
                            console.log(res);
                            if(res.success){
                                if(res.data == null || res.data == '')
                                {
                                    report('You are Logging in for the first time, please retry', '#alert')
                                    $('#login').html(`Login`);
                                    $('#login').removeAttr('disabled')

                                }else{
                                    report(res.message + '...Redirecting', '#alert')
                                    setTimeout(function(){
                                        window.location.href = '/user/'
                                    }, 1500)
                                }
                            }
                        });
                    }else{
                        report(res.message, '#alert', 1)
                        $('#login').html(`Sign In`);
                        $('#login').removeAttr('disabled')
                    }
                });
            }
        });

    });

</script>

</body>
</html>
