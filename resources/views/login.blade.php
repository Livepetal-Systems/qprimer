<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

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
                        <form action="{{ route('login.user') }}" method="post">@csrf
                            @include('layouts/includes/alert')

                            <!-- Username -->
                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" name="email" class="form-control" id="login_email"
                                    placeholder="Email address here" required>
                            </div>
                            <!-- Password -->
                            <div class="mb-3">
                                <input type="hidden" class="allLink" value="{{ env('APILINK') }}">
                                <label for="password" class="form-label">Password</label>
                                <input type="password" name="password" id="login_password" class="form-control"
                                    placeholder="**************" required>
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
                                    <button class="btn btn-primary" id="login">Sign in</button>
                                </div>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="../assets/js/theme.min.js"></script>

</body>

</html>
