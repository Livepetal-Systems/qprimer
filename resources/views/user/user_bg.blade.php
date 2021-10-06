<div class="pt-16 rounded-top-md" style="
                 background: url({{ asset('assets/img/background/profile-bg.jpg') }}) no-repeat;
                 background-size: cover;
                 "></div>
<div
    class="d-flex align-items-end justify-content-between bg-white px-4 pt-2 pb-4 rounded-none rounded-bottom-md shadow-sm">
    <div class="d-flex align-items-center">
        <div class="me-2 position-relative d-flex justify-content-end align-items-end mt-n5">
            <img src="{{ asset('assets/img/avatar/'.proPics()) }} "
                class="avatar-xl rounded-circle border border-4 border-white" alt="" />
        </div>
        <div class="lh-1">
            <h2 class="mb-0">
                {{ auth()->user()->lastname . ' ' . auth()->user()->firstname }}
            </h2>
            <p class="mb-0 d-block">{{ auth()->user()->email }} </p>
        </div>
    </div>
    <div>
        <a href="#" class="btn btn-outline-primary btn-sm d-none d-md-block">Take Exams</a>
    </div>
</div>
