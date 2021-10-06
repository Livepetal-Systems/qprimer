@php
    $user = auth()->user();
@endphp

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid px-0">
        <a class="navbar-brand" href="index.html"
            ><img src="{{ asset('assets/img/brand/logo/logotxt.png') }}" alt=""
        /></a>
        <!-- Mobile view nav wrap -->
        <ul
            class="navbar-nav navbar-right-wrap ms-auto d-lg-none d-flex nav-top-wrap"
        >
            <li class="dropdown stopevent">
                <a
                    class="btn btn-light btn-icon rounded-circle text-muted indicator indicator-primary"
                    href="#"
                    role="button"
                    data-bs-toggle="dropdown"
                >
                    <i class="fe fe-bell"> </i>
                </a>
                <div class="dropdown-menu dropdown-menu-end shadow">
                    <div>
                        <div
                            class="border-bottom px-3 pb-3 d-flex justify-content-between align-items-center"
                        >
                            <span class="h5 mb-0">Notifications</span>
                            <a href="# " class="text-muted"
                                ><span class="align-middle"
                                    ><i class="fe fe-settings me-1"></i></span
                            ></a>
                        </div>
                        <ul class="list-group list-group-flush notification-list-scroll">
                            <li class="list-group-item bg-light">
                                <div class="row">
                                    <div class="col">
                                        <a href="#" class="text-body">
                                        <div class="d-flex">
                                            <img
                                                src="{{ asset('assets/img/avatar/avatar-1.jpg') }}"
                                                alt=""
                                                class="avatar-md rounded-circle"
                                            />
                                            <div class="ms-3">
                                                <h5 class="fw-bold mb-1">Kristin Watson:</h5>
                                                <p class="mb-3">
                                                    Krisitn Watsan like your comment on course Javascript
                                                    Introduction!
                                                </p>
                                                <span class="fs-6 text-muted">
                                                    <span
                                                        ><span
                                                            class="fe fe-thumbs-up text-success me-1"
                                                        ></span
                                                        >2 hours ago,</span
                                                    >
                                                    <span class="ms-1">2:19 PM</span>
                                                </span>
                                            </div>
                                        </div>
                                        </a>
                                    </div>
                                    <div class="col-auto text-center me-2">
                                        <a
                                            href="#!"
                                            class="badge-dot bg-info"
                                            data-bs-toggle="tooltip"
                                            data-bs-placement="top"
                                            title="Mark as read"
                                        >
                                        </a>
                                        <div>
                                            <a
                                                href="#"
                                                data-bs-toggle="tooltip"
                                                data-bs-placement="top"

                                                title="Remove"
                                            >
                                                <i class="fe fe-x text-muted"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li class="list-group-item">
                                <div class="row">
                                    <div class="col">
                                        <a href="#" class="text-body">
                                        <div class="d-flex">
                                            <img
                                                src="{{ asset('assets/img/avatar/avatar-2.jpg') }}"
                                                alt=""
                                                class="avatar-md rounded-circle"
                                            />
                                            <div class="ms-3">
                                                <h5 class="fw-bold mb-1">Brooklyn Simmons</h5>
                                                <p class="mb-3">
                                                    Just launched a new Courses React for Beginner.
                                                </p>
                                                <span class="fs-6 text-muted">
                                                    <span
                                                        ><span
                                                            class="fe fe-thumbs-up text-success me-1"
                                                        ></span
                                                        >Oct 9,</span
                                                    >
                                                    <span class="ms-1">1:20 PM</span>
                                                </span>
                                            </div>
                                        </div>
                                        </a>
                                    </div>
                                    <div class="col-auto text-center me-2">
                                        <a
                                            href="#"
                                            class="badge-dot bg-secondary"
                                            data-bs-toggle="tooltip"
                                            data-bs-placement="top"

                                            title="Mark as unread"
                                        >
                                        </a>
                                    </div>
                                </div>
                            </li>
                            <li class="list-group-item">
                                <div class="row">
                                    <div class="col">
                                        <a href="#" class="text-body">
                                        <div class="d-flex">
                                            <img
                                                src="{{ asset('assets/img/avatar/avatar-3.jpg') }}"
                                                alt=""
                                                class="avatar-md rounded-circle"
                                            />
                                            <div class="ms-3">
                                                <h5 class="fw-bold mb-1">Jenny Wilson</h5>
                                                <p class="mb-3">
                                                    Krisitn Watsan like your comment on course Javascript
                                                    Introduction!
                                                </p>
                                                <span class="fs-6 text-muted">
                                                    <span
                                                        ><span class="fe fe-thumbs-up text-info me-1"></span
                                                        >Oct 9,</span
                                                    >
                                                    <span class="ms-1">1:56 PM</span>
                                                </span>
                                            </div>
                                        </div>
                                        </a>
                                    </div>
                                    <div class="col-auto text-center me-2">
                                        <a
                                            href="#"
                                            class="badge-dot bg-secondary"
                                            data-bs-toggle="tooltip"
                                            data-bs-placement="top"

                                            title="Mark as unread"
                                        >
                                        </a>
                                    </div>
                                </div>
                            </li>
                            <li class="list-group-item">
                                <div class="row">
                                    <div class="col">
                                        <a href="#" class="text-body">
                                        <div class="d-flex">
                                            <img
                                                src="{{ asset('assets/img/avatar/avatar-4.jpg') }}"
                                                alt=""
                                                class="avatar-md rounded-circle"
                                            />
                                            <div class="ms-3">
                                                <h5 class="fw-bold mb-1">Sina Ray</h5>
                                                <p class="mb-3">
                                                    You earn new certificate for complete the Javascript
                                                    Beginner course.
                                                </p>
                                                <span class="fs-6 text-muted">
                                                    <span
                                                        ><span class="fe fe-award text-warning me-1"></span
                                                        >Oct 9,</span
                                                    >
                                                    <span class="ms-1">1:56 PM</span>
                                                </span>
                                            </div>
                                        </div>
                                        </a>
                                    </div>
                                    <div class="col-auto text-center me-2">
                                        <a
                                            href="#"
                                            class="badge-dot bg-secondary"
                                            data-bs-toggle="tooltip"
                                            data-bs-placement="top"

                                            title="Mark as unread"
                                        >
                                        </a>
                                    </div>
                                </div>
                            </li>
                        </ul>
                        <div class="border-top px-3 pt-3 pb-0">
                            <a
                                href="pages/notification-history.html"
                                class="text-link fw-semi-bold"
                                >See all Notifications</a
                            >
                        </div>
                    </div>
                </div>
            </li>
            <li class="dropdown ms-2">
                <a
                    class="rounded-circle"
                    href="#"
                    role="button"
                    data-bs-toggle="dropdown"
                >
                    <div class="avatar avatar-md avatar-indicators avatar-online">
                        <img
                            alt="avatar"
                            src="{{ asset('assets/img/avatar/avatar-1.jpg') }}"
                            class="rounded-circle"
                        />
                    </div>
                </a>
                <div class="dropdown-menu dropdown-menu-end shadow">
                    <div class="dropdown-item">
                        <div class="d-flex">
                            <div class="avatar avatar-md avatar-indicators avatar-online">
                                <img
                                    alt="avatar"
                                    src="{{ asset('assets/img/avatar/avatar-1.jpg') }}"
                                    class="rounded-circle"
                                />
                            </div>
                            <div class="ms-3 lh-1">
                                <h5 class="mb-1">Annette Black</h5>
                                <p class="mb-0 text-muted">annette@geeksui.com</p>
                            </div>
                        </div>
                    </div>
                    <div class="dropdown-divider"></div>
                    <ul class="list-unstyled">
                        <li class="dropdown-submenu">
                            <a
                                class="dropdown-item dropdown-list-group-item dropdown-toggle"
                                href="#"
                            >
                                <i class="fe fe-circle me-2"></i>Status
                            </a>
                            <ul class="dropdown-menu">
                                <li>
                                    <a class="dropdown-item" href="#">
                                        <span class="badge-dot bg-success me-2"></span>Online
                                    </a>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="#">
                                        <span class="badge-dot bg-secondary me-2"></span>Offline
                                    </a>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="#">
                                        <span class="badge-dot bg-warning me-2"></span>Away
                                    </a>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="#">
                                        <span class="badge-dot bg-danger me-2"></span>Busy
                                    </a>
                                </li>
                            </ul>
                        </li>

                        <li>
                            <a class="dropdown-item" href="pages/profile-edit.html">
                                <i class="fe fe-user me-2"></i>Profile
                            </a>
                        </li>
                        <li>
                            <a
                                class="dropdown-item"
                                href="pages/student-subscriptions.html"
                            >
                                <i class="fe fe-star me-2"></i>Subscription
                            </a>
                        </li>
                        <li>
                            <a class="dropdown-item" href="#">
                                <i class="fe fe-settings me-2"></i>Settings
                            </a>
                        </li>
                    </ul>
                    <div class="dropdown-divider"></div>
                    <ul class="list-unstyled">
                        <li>
                            <a class="dropdown-item" href="index.html">
                                <i class="fe fe-power me-2"></i>Sign Out
                            </a>
                        </li>
                    </ul>
                </div>
            </li>
        </ul>
        <!-- Button -->
        <button
            class="navbar-toggler collapsed"
            type="button"
            data-bs-toggle="collapse"
            data-bs-target="#navbar-default"
            aria-controls="navbar-default"
            aria-expanded="false"
            aria-label="Toggle navigation"
        >
            <span class="icon-bar top-bar mt-0"></span>
            <span class="icon-bar middle-bar"></span>
            <span class="icon-bar bottom-bar"></span>
        </button>
        <!-- Collapse -->
        <div class="collapse navbar-collapse" id="navbar-default">
            <ul class="navbar-nav">
                <li class="nav-item dropdown">
                    <a
                        class="nav-link dropdown-toggle"
                        href="#"
                        id="navbarBrowse"
                        data-bs-toggle="dropdown"
                        aria-haspopup="true"
                        aria-expanded="false"
                        data-bs-display="static"
                    >
                        Browse
                    </a>
                    <ul
                        class="dropdown-menu dropdown-menu-arrow"
                        aria-labelledby="navbarBrowse"
                    >
                        <li class="dropdown-submenu dropend">
                            <a
                                class="dropdown-item dropdown-list-group-item dropdown-toggle"
                                href="#"
                            >
                                Web Development
                            </a>
                            <ul class="dropdown-menu">
                                <li>
                                    <a
                                        class="dropdown-item"
                                        href="pages/course-category.html"
                                    >
                                        Bootstrap</a
                                    >
                                </li>
                                <li>
                                    <a
                                        class="dropdown-item"
                                        href="pages/course-category.html"
                                    >
                                        React
                                    </a>
                                </li>
                                <li>
                                    <a
                                        class="dropdown-item"
                                        href="pages/course-category.html"
                                    >
                                        GraphQl</a
                                    >
                                </li>
                                <li>
                                    <a
                                        class="dropdown-item"
                                        href="pages/course-category.html"
                                    >
                                        Gatsby</a
                                    >
                                </li>
                                <li>
                                    <a
                                        class="dropdown-item"
                                        href="pages/course-category.html"
                                    >
                                        Grunt</a
                                    >
                                </li>
                                <li>
                                    <a
                                        class="dropdown-item"
                                        href="pages/course-category.html"
                                    >
                                        Svelte</a
                                    >
                                </li>
                                <li>
                                    <a
                                        class="dropdown-item"
                                        href="pages/course-category.html"
                                    >
                                        Meteor</a
                                    >
                                </li>
                                <li>
                                    <a
                                        class="dropdown-item"
                                        href="pages/course-category.html"
                                    >
                                        HTML5</a
                                    >
                                </li>
                                <li>
                                    <a
                                        class="dropdown-item"
                                        href="pages/course-category.html"
                                    >
                                        Angular</a
                                    >
                                </li>
                            </ul>
                        </li>
                    </ul>
                </li>
            </ul>

            <form class="mt-3 mt-lg-0 ms-lg-3 d-flex align-items-center">
                <span class="position-absolute ps-3 search-icon">
                    <i class="fe fe-search"></i>
                </span>
                <input
                    type="search"
                    class="form-control ps-6"
                    placeholder="Search Project"

                />
            </form>
            <ul class="navbar-nav navbar-right-wrap ms-auto d-none d-lg-block">

                @if(auth()->user()->level  == 1)
                    <li class="dropdown ms-2 d-inline-block">
                        <div class="ms-auto mt-3 mt-lg-0">
                            <a href="#" class="text-white shadow-sm me-1">Instruct on Techie</a>
                        </div>
                    </li>
                @endif

                @if(!auth()->user())
                    <li class="dropdown ms-2 d-inline-block">
                        <div class="ms-auto mt-3 mt-lg-0">
                            <a href="#" class="text-white shadow-sm me-1">Instruct on Techie</a>
                        </div>
                    </li>
                @endif


                @if(auth()->user())
{{--
                    <li class="dropdown d-inline-block stopevent">
                        <a class="btn btn-light btn-icon rounded-circle text-muted indicator indicator-primary"
                            href="#" role="button" id="dropdownNotificationSecond" data-bs-toggle="dropdown" aria-expanded="false" >
                            <i class="fe fe-bell"> </i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end dropdown-menu-lg" aria-labelledby="dropdownNotificationSecond" >
                            <div>
                                <div class="border-bottom px-3 pb-3 d-flex justify-content-between align-items-center" >
                                    <span class="h5 mb-0">Notifications</span>
                                    <a href="# " class="text-muted" >
                                        <span class="align-middle" >
                                            <i class="fe fe-settings me-1"></i>
                                        </span>
                                    </a>
                                </div>
                                <ul class="list-group list-group-flush notification-list-scroll ">
                                    <li class="list-group-item bg-light">
                                        <div class="row">
                                            <div class="col">
                                                <a class="text-body" href="#">
                                                <div class="d-flex">
                                                    <img
                                                        src="{{ asset('assets/img/avatar/avatar-1.jpg') }}"
                                                        alt=""
                                                        class="avatar-md rounded-circle"
                                                    />
                                                    <div class="ms-3">
                                                        <h5 class="fw-bold mb-1">Kristin Watson:</h5>
                                                        <p class="mb-3">
                                                            Krisitn Watsan like your comment on course
                                                            Javascript Introduction!
                                                        </p>
                                                        <span class="fs-6 text-muted">
                                                            <span
                                                                ><span
                                                                    class="fe fe-thumbs-up text-success me-1"
                                                                ></span
                                                                >2 hours ago,</span
                                                            >
                                                            <span class="ms-1">2:19 PM</span>
                                                        </span>
                                                    </div>
                                                </div>
                                                </a>
                                            </div>
                                            <div class="col-auto text-center me-2">

                                                <a
                                                    href="#"
                                                    class="badge-dot bg-info"
                                                    data-bs-toggle="tooltip"
                                                    data-bs-placement="top"

                                                    title="Mark as read"
                                                >
                                                </a>
                                                <div>
                                                    <a
                                                        href="#"
                                                        class="bg-transparent"
                                                        data-bs-toggle="tooltip"
                                                        data-bs-placement="top"

                                                        title="Remove"
                                                    >
                                                        <i class="fe fe-x text-muted"></i>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="list-group-item">
                                        <div class="row">
                                            <div class="col">
                                                <a class="text-body" href="#">
                                                <div class="d-flex">
                                                    <img
                                                        src="{{ asset('assets/img/avatar/avatar-2.jpg') }}"
                                                        alt=""
                                                        class="avatar-md rounded-circle"
                                                    />
                                                    <div class="ms-3">
                                                        <h5 class="fw-bold mb-1">Brooklyn Simmons</h5>
                                                        <p class="mb-3">
                                                            Just launched a new Courses React for Beginner.
                                                        </p>
                                                        <span class="fs-6 text-muted">
                                                            <span
                                                                ><span
                                                                    class="fe fe-thumbs-up text-success me-1"
                                                                ></span
                                                                >Oct 9,</span
                                                            >
                                                            <span class="ms-1">1:20 PM</span>
                                                        </span>
                                                    </div>
                                                </div>
                                                </a>
                                            </div>
                                            <div class="col-auto text-center me-2">
                                                <a
                                                    href="#"
                                                    class="badge-dot bg-secondary"
                                                    data-bs-toggle="tooltip"
                                                    data-bs-placement="top"

                                                    title="Mark as unread"
                                                >
                                                </a>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="list-group-item">
                                        <div class="row">
                                            <div class="col">
                                                <a class="text-body" href="#">
                                                <div class="d-flex">
                                                    <img
                                                        src="{{ asset('assets/img/avatar/avatar-3.jpg') }}"
                                                        alt=""
                                                        class="avatar-md rounded-circle"
                                                    />
                                                    <div class="ms-3">
                                                        <h5 class="fw-bold mb-1">Jenny Wilson</h5>
                                                        <p class="mb-3">
                                                            Krisitn Watsan like your comment on course
                                                            Javascript Introduction!
                                                        </p>
                                                        <span class="fs-6 text-muted">
                                                            <span
                                                                ><span
                                                                    class="fe fe-thumbs-up text-info me-1"
                                                                ></span
                                                                >Oct 9,</span
                                                            >
                                                            <span class="ms-1">1:56 PM</span>
                                                        </span>
                                                    </div>
                                                </div>
                                                </a>
                                            </div>
                                            <div class="col-auto text-center me-2">
                                                <a
                                                    href="#"
                                                    class="badge-dot bg-secondary"
                                                    data-bs-toggle="tooltip"
                                                    data-bs-placement="top"

                                                    title="Mark as unread"
                                                >
                                                </a>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="list-group-item">
                                        <div class="row">
                                            <div class="col">
                                                <a class="text-body" href="#">
                                                <div class="d-flex">
                                                    <img
                                                        src="{{ asset('assets/img/avatar/avatar-4.jpg') }}"
                                                        alt=""
                                                        class="avatar-md rounded-circle"
                                                    />
                                                    <div class="ms-3">
                                                        <h5 class="fw-bold mb-1">Sina Ray</h5>
                                                        <p class="mb-3">
                                                            You earn new certificate for complete the Javascript
                                                            Beginner course.
                                                        </p>
                                                        <span class="fs-6 text-muted">
                                                            <span
                                                                ><span
                                                                    class="fe fe-award text-warning me-1"
                                                                ></span
                                                                >Oct 9,</span
                                                            >
                                                            <span class="ms-1">1:56 PM</span>
                                                        </span>
                                                    </div>
                                                </div>
                                                </a>
                                            </div>
                                            <div class="col-auto text-center me-2">
                                                <a
                                                    href="#"
                                                    class="badge-dot bg-secondary"
                                                    data-bs-toggle="tooltip"
                                                    data-bs-placement="top"

                                                    title="Mark as unread"
                                                >
                                                </a>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                                <div class="border-top px-3 pt-3 pb-0">
                                    <a
                                        href="pages/notification-history.html"
                                        class="text-link fw-semi-bold"
                                        >See all Notifications</a
                                    >
                                </div>
                            </div>
                        </div>
                    </li>
                     --}}
                    <li class="dropdown ms-2 d-inline-block">
                        <a
                            class="rounded-circle"
                            href="#"
                            data-bs-toggle="dropdown"
                            data-bs-display="static"
                            aria-expanded="false"
                        >
                            <div class="avatar avatar-md avatar-indicators avatar-online">
                                <img
                                    alt="avatar"
                                    src="{{ asset('assets/img/avatar/'.proPics()) }}"
                                    class="rounded-circle"
                                />
                            </div>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end">
                            <div class="dropdown-item">
                                <div class="d-flex">
                                    <div class="avatar avatar-md avatar-indicators avatar-online">
                                        <img
                                            alt="avatar"
                                            src="{{ asset('assets/img/avatar/'.proPics()) }}"
                                            class="rounded-circle"
                                        />
                                    </div>
                                    <div class="ms-3 lh-1">
                                        <h5 class="mb-1">{{$user->lastname.' '.$user->firstname}}</h5>
                                        <p class="mb-0 text-muted">{{$user->email}}</p>
                                    </div>
                                </div>
                            </div>
                            <div class="dropdown-divider"></div>
                            <ul class="list-unstyled">
                                <li>
                                    <a class="dropdown-item" href="/user/profile/edit" >
                                        <i class="fe fe-user me-2"></i>Profile
                                    </a>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="/user/profile/payments" >
                                        <i class="fe fe-star me-2"></i>Payments
                                    </a>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="#">
                                        <i class="fe fe-settings me-2"></i>Settings
                                    </a>
                                </li>
                            </ul>
                            <div class="dropdown-divider"></div>
                            <ul class="list-unstyled">
                                <li>
                                    <a class="dropdown-item" href="/logOut">
                                        <i class="fe fe-power me-2"></i>Sign Out
                                    </a>
                                </li>
                            </ul>
                        </div>


                    </li>


                @else

                    <li class="dropdown ms-2 d-inline-block">
                        <div class="ms-auto mt-3 mt-lg-0">
                            <a href="login.php" class="btn btn-white shadow-sm me-1">Sign In</a>
                            <a href="signup.php" class="btn btn-primary">Sign Up</a>
                        </div>
                    </li>

                @endif



            </ul>
        </div>
    </div>
</nav>
