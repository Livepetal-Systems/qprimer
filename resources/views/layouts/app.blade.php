<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>@yield('title')</title>

        <!-- Favicon icon-->
        <link rel="shortcut icon" type="image/x-icon" href="{{ asset('assets/img/favicon/favicon.png') }}">
        <!-- Libs CSS -->

        <link href="{{ asset('assets/libs/bootstrap-icons/font/bootstrap-icons.css') }}" rel="stylesheet" />
        <link href="{{ asset('assets/libs/dragula/dist/dragula.min.css') }}" rel="stylesheet" />
        <link href="{{ asset('assets/libs/%40mdi/font/css/materialdesignicons.min.css') }}" rel="stylesheet" />
        <link href="{{ asset('assets/libs/prismjs/themes/prism.css') }}" rel="stylesheet" />
        <link href="{{ asset('assets/libs/dropzone/dist/dropzone.css') }}" rel="stylesheet" />
        <link href="{{ asset('assets/libs/magnific-popup/dist/magnific-popup.css') }}" rel="stylesheet" />
        <link href="{{ asset('assets/libs/bootstrap-select/dist/css/bootstrap-select.min.css') }}" rel="stylesheet">
        <link href="{{ asset('assets/libs/%40yaireo/tagify/dist/tagify.css') }}" rel="stylesheet">
        <link href="{{ asset('assets/libs/tiny-slider/dist/tiny-slider.css') }}" rel="stylesheet">
        <link href="{{ asset('assets/libs/tippy.js/dist/tippy.css') }}" rel="stylesheet">
        <link href="{{ asset('assets/libs/datatables.net-bs5/css/dataTables.bootstrap5.min.css') }}" rel="stylesheet">
        <!-- Theme CSS -->

        <link rel="stylesheet" href="{{ asset('assets/css/theme.min.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/css/feather.css') }}">



    </head>
    <body>

        @include('layouts.includes.nav')
        @include('layouts.includes.alert')
        @yield('pagecontent')
        @include('layouts.includes.footer')

        <script src="{{ asset('assets/libs/jquery/dist/jquery.min.js') }}"></script>
        <script src="{{ asset('assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>
        <script src="{{ asset('assets/libs/odometer/odometer.min.js') }}"></script>
        <script src="{{ asset('assets/libs/jquery-slimscroll/jquery.slimscroll.min.js') }}"></script>
        <script src="{{ asset('assets/libs/magnific-popup/dist/jquery.magnific-popup.min.js') }}"></script>
        <script src="{{ asset('assets/libs/bootstrap-select/dist/js/bootstrap-select.min.js') }}"></script>
        <script src="{{ asset('assets/libs/flatpickr/dist/flatpickr.min.js') }}"></script>
        <script src="{{ asset('assets/libs/inputmask/dist/jquery.inputmask.min.js') }}"></script>
        <script src="{{ asset('assets/libs/apexcharts/dist/apexcharts.min.js') }}"></script>
        <script src="{{ asset('assets/libs/quill/dist/quill.min.js') }}"></script>
        <script src="{{ asset('assets/libs/file-upload-with-preview/dist/file-upload-with-preview.min.js') }}"></script>
        <script src="{{ asset('assets/libs/dragula/dist/dragula.min.js') }}"></script>
        <script src="{{ asset('assets/libs/bs-stepper/dist/js/bs-stepper.min.js') }}"></script>
        <script src="{{ asset('assets/libs/dropzone/dist/min/dropzone.min.js') }}"></script>
        <script src="{{ asset('assets/libs/jQuery.print/jQuery.print.js') }}"></script>
        <script src="{{ asset('assets/libs/prismjs/prism.js') }}"></script>
        <script src="{{ asset('assets/libs/prismjs/components/prism-scss.min.js') }}"></script>

        <script src="{{ asset('assets/libs/%40popperjs/core/dist/umd/popper.min.js') }}"></script>

        <script src="{{ asset('assets/libs/tiny-slider/dist/min/tiny-slider.js') }}"></script>
        <script src="{{ asset('assets/libs/tippy.js/dist/tippy-bundle.umd.min.js') }}"></script>
        <script src="{{ asset('assets/libs/typed.js/lib/typed.min.js') }}"></script>
        <script src="{{ asset('assets/libs/jsvectormap/dist/js/jsvectormap.min.js') }}"></script>
        <script src="{{ asset('assets/libs/jsvectormap/dist/maps/world.js') }}"></script>
        <script src="{{ asset('assets/libs/datatables.net/js/jquery.dataTables.min.js') }}"></script>
        <script src="{{ asset('assets/libs/datatables.net-bs5/js/dataTables.bootstrap5.min.js') }}"></script>
        <script src="{{ asset('assets/libs/datatables.net-responsive/js/dataTables.responsive.min.js') }}"></script>
        <script src="{{ asset('assets/libs/datatables.net-responsive-bs5/js/responsive.bootstrap5.min.js') }}"></script>
        <!-- clipboard -->
        <script src="{{ asset('assets/plug/ajax/libs/clipboard.js/1.5.12/clipboard.min.js') }}"></script>
        <!-- Theme JS -->
        <script src="{{ asset('assets/js/theme.min.js') }}"></script>
    </body>
</html>
