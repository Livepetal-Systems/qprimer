@extends('layouts/app')
@section('title')
Purchases
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
                <div class="card mb-4">
                    <!-- Card header -->
                    <div class="card-header border-bottom-0">
                        <h3 class="mb-0">Purchases.</h3>
                        <p class="mb-0">You can find all of your Purchases.</p>
                    </div>
                    <!-- Table -->
                    <div class="table-invoice table-responsive border-0">
                        <table class="table mb-0 text-nowrap">
                            <thead class="table-light">
                                <tr>
                                    <th scope="col" class="border-bottom-0">ORDER ID</th>
                                    <th scope="col" class="border-bottom-0">DATE</th>
                                    <th scope="col" class="border-bottom-0">AMOUNT</th>
                                    <th scope="col" class="border-bottom-0">STATUS</th>
                                    <th scope="col" class="border-bottom-0"></th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td><a href="invoice-details.html">#1008</a></td>
                                    <td>17 April 2020, 10:45pm</td>
                                    <td>$39.00</td>
                                    <td><span class="badge bg-danger">Pending</span></td>
                                    <td>
                                        <a href="../assets/images/pdf/invoiceFile.pdf" class="fe fe-download" download></a>
                                    </td>
                                </tr>
                                <tr>
                                    <td><a href="invoice-details.html">#1007</a></td>
                                    <td>17 April 2020, 10:45pm</td>
                                    <td>$39.00</td>
                                    <td>
                                        <span class="badge bg-success">Complete</span>
                                    </td>
                                    <td>
                                        <a href="../assets/images/pdf/invoiceFile.pdf" class="fe fe-download" download></a>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>


<script src="{{ asset('assets/libs/jquery/dist/jquery.min.js') }}"></script>
<script src="{{ asset('assets/js/img.js') }}"></script>

<script>
    $(function () {
       
       $('.updatePicture').on('click', function() {
            $('#updatePicture_modal').modal('show'); 
       });

    });
</script>

@endsection