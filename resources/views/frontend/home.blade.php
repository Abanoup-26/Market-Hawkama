@extends('layouts.frontend')
@section('content')
    <!-- breadcrumb-area -->
    <section class="breadcrumb-area breadcrumb-bg" data-background="{{ asset('frontend/img/bg/breadcrumb_bg.jpg') }}">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-10">
                    <div class="breadcrumb-content text-center">
                        <h2 class="title"> متجر دعم</h2>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ route('frontend.home') }}">الرئيسية</a></li>
                                <li class="breadcrumb-item active" aria-current="page">مشروعات دعم</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- breadcrumb-area-end -->

    <!-- project-area -->
    <section class="project-area pt-100 pb-100">
        <div class="container text-center">
            <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 row-cols-xl-3 row-cols-xxl-3">
                <!---for  Projects loop-->
                @foreach ($projects as $project)
                    @include('partials.project')
                @endforeach
            </div>
            <!-- Pagination Links -->
            @include('partials.pagination')
            <!-- End Pagination Links -->
        </div>
    </section>
    <!-- project-area-end -->
@endsection
