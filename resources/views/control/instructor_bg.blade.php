<div class="pt-16 rounded-top-md" style=" background: url({{ asset('assets/img/background/profile-bg.jpg') }}) no-repeat; background-size: cover; "></div>
<div
    class="d-flex align-items-end justify-content-between bg-white px-4 pt-2 pb-4 rounded-none rounded-bottom-md shadow-sm">
    <div class="d-flex align-items-center">
        <div class="me-2 position-relative d-flex justify-content-end align-items-end mt-n5">
            <img src="{{ asset('assets/img/avatar/'.proPics()) }}" class="avatar-xl rounded-circle border border-4 border-white position-relative"
                alt="" />
            <a href="#" class="position-absolute top-0 end-0" data-bs-toggle="tooltip" data-placement="top" title=""
                data-original-title="Verified">
                <img src="{{ asset('assets/img/svg/checked-mark.svg') }}" alt="" height="30" width="30" />
            </a>
        </div>
        <div class="lh-1">
            <h2 class="mb-0">{{ucfirst($user->lastname.' '.$user->firstname)}}</h2>
            <p class="mb-0 d-block">{{$user->email}}</p>
        </div>
    </div>
    <div>
        <a href="#" class="btn btn-primary btn-sm d-none d-md-block">Back To Dashboard</a>
    </div>
</div>