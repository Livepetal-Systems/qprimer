<nav class="navbar navbar-expand-md navbar-light shadow-sm mb-4 mb-lg-0 sidenav">
    <!-- Menu -->
    <a class="d-xl-none d-lg-none d-md-none text-inherit fw-bold" href="#">Menu</a>
    <!-- Button -->
    <button class="navbar-toggler d-md-none icon-shape icon-sm rounded bg-primary text-light" type="button"
        data-bs-toggle="collapse" data-bs-target="#sidenav" aria-controls="sidenav" aria-expanded="false"
        aria-label="Toggle navigation">
        <span class="fe fe-menu"></span>
    </button>
    <!-- Collapse -->
    <div class="collapse navbar-collapse" id="sidenav">
        <div class="navbar-nav flex-column">

            @if($user->role > 1)
                <span class="navbar-header">Accounts</span>
                <ul class="list-unstyled ms-n2 mb-0">
                    <li class="nav-item">
                        <a class="nav-link" href="/user/"><i class="fe fe-settings nav-icon"></i>User</a>
                    </li>
                    @if($user->role > 5)
                        <li class="nav-item">
                            <a class="nav-link" href="#"><i class="fe fe-user nav-icon"></i>Administrator</a>
                        </li>
                    @endif
                </ul>
                <br>
            @endif


            <span class="navbar-header">CBT Owner</span>
            <ul class="list-unstyled ms-n2 mb-4">
                <!-- Nav item -->
                <li class="nav-item">
                    <a class="nav-link" href="/control/"><i class="fe fe-home nav-icon"></i>Dashboard</a>
                </li>
                <!-- Nav item -->
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('control.exams') }}"><i class="fe fe-book nav-icon"></i>Created Exams</a>
                </li>
                {{-- <!-- Nav item -->
                <li class="nav-item">
                    <a class="nav-link" href="#"><i class="fe fe-star nav-icon"></i>Reviews</a>
                </li> --}}
                <!-- Nav item -->
                {{-- <li class="nav-item">
                    <a class="nav-link" href="#"><i class="fe fe-users nav-icon"></i>Students</a>
                </li> --}}
            </ul>

            <!-- Navbar header -->
            <span class="navbar-header">Account Settings</span>
            <ul class="list-unstyled ms-n2 mb-0">
                <li class="nav-item">
                    <a class="nav-link" href="/user/profile/edit"><i class="fe fe-settings nav-icon"></i>Edit Profile</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/user/profile/security"><i class="fe fe-user nav-icon"></i>Security</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#"><i class="fe fe-trash nav-icon"></i>Delete Profile</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/logOut"><i class="fe fe-power nav-icon"></i>Sign Out</a>
                </li>
            </ul>
        </div>
    </div>
</nav>