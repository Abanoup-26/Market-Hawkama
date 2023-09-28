@extends('layouts.frontend')
@section('content')
    <!-- breadcrumb-area -->
    <section class="breadcrumb-area breadcrumb-bg" data-background="{{ asset('frontend/img/bg/breadcrumb_bg.jpg') }}">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-10">
                    <div class="breadcrumb-content text-center">
                        <h2 class="title">{{ $project->title }} </h2>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ route('frontend.home') }}">الرئيسية</a></li>
                                <li class="breadcrumb-item active" aria-current="page">{{ $project->title }} </li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- breadcrumb-area-end -->
    <!-- shop-details-area -->
    <section class="shop-details-area pt-130 pb-100">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-5 col-md-9">
                    <div class="shop-details-img-wrap">
                        <div class="tab-content" id="myTabContent">
                            @foreach ($project->media as $key => $value)
                                @php
                                    $number = $key + 1;
                                @endphp
                                <div class="tab-pane show {{ $key == 0 ? ' active' : '' }}" id="item-{{ $number }}"
                                    role="tabpanel" aria-labelledby="item-{{ $number }}-tab">
                                    <div class="shop-details-img">
                                        <img src="{{ $value->getUrl() }}" alt="">
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                            @foreach ($project->media as $key => $value)
                                @php
                                    $number = $key + 1;
                                @endphp
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link{{ $key == 0 ? ' active' : '' }}"
                                        id="item-{{ $number }}-tab" data-bs-toggle="tab"
                                        data-bs-target="#item-{{ $number }}" type="button" role="tab"
                                        aria-controls="item-{{ $number }}" aria-selected="true"><img
                                            src="{{ $value->getUrl() }}" alt=""></button>
                                </li>
                            @endforeach

                        </ul>
                    </div>
                </div>
                <div class="col-lg-7">
                    <div class="shop-details-content">
                        <div class="content-top">
                            <span>{{ $project->goal }} ر.س</span>
                            <span class="">تم دعم
                                <br>
                                {{ $project->collected }} ر.س</span>
                            <span class="">المتبقي
                                <br>
                                {{ $project->goal - $project->collected }} ر.س </span>
                        </div>
                        <div class="shop-details-price">
                            <div class="progress">
                                <div class="progress-bar" role="progressbar"
                                    style="width: {{ $project->rate_percentage }}%;"
                                    aria-valuenow="{{ $project->rate_percentage }}" aria-valuemin="0" aria-valuemax="100">
                                </div>
                            </div>
                        </div>
                        <p class="fs-5"> {{ $project->short_description }} </p>

                        <div class="shop-details-quantity">
                            <ul>
                                <li>
                                    <label for="color">مبلغ التبرع</label>
                                    <select id="donation_amount" name="donation_amount" class="form-select"
                                        aria-label="Default select example">
                                        <option value="">اختيار مبلغ التبرع</option>
                                        @foreach (config('donations') as $donation => $amount)
                                            <option value="{{ $amount }}">{{ $donation }}</option>
                                        @endforeach
                                    </select>
                                </li>

                                <li>
                                    <label for="qty">المبلغ يدوى</label>
                                    <input id="donation_amount" type="number" placeholder="مبلغ التبرع">
                                </li>
                        </div>
                        </li>
                        </ul>
                    </div>
                    <div class="shop-details-cart">
                        <ul>
                            <li><a href="#" class="btn"><i class="far fa-shopping-basket"></i>أضف للسلة</a>
                            </li>
                            <li><a href="#" class="btn"><i class="far fa-heart"></i>اهداء</a></li>
                            <li><a href="#" class="btn"><i class="far fa-money-bill-al"></i>تبرع الان</a>
                            </li>
                        </ul>
                    </div>
                    <div class="shop-details-social">
                        <span>شاركها واكسب الأجر :</span>
                        <ul>
                            <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                            <li><a href="#"><i class="fab fa-google-plus-g"></i></a></li>
                            <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                            <li><a href="#"><i class="fab fa-instagram"></i></a></li>
                            <li><a href="#"><i class="fab fa-linkedin-in"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </section>
    <!-- shop-details-area-end -->

    <!-- product-description -->
    <div class="product-description-wrap gray-bg pt-100 pb-100">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <nav>
                        <div class="nav nav-tabs" id="nav-tab" role="tablist">
                            <button class="nav-link active" id="nav-description-tab" data-bs-toggle="tab"
                                data-bs-target="#nav-description" type="button" role="tab"
                                aria-controls="nav-description" aria-selected="true">وصف الفرصة</button>

                        </div>
                    </nav>
                    <div class="tab-content" id="nav-tabContent">
                        <div class="tab-pane fade show active" id="nav-description" role="tabpanel"
                            aria-labelledby="nav-description-tab">
                            <div class="product-desc-content">
                                <p>{!! $project->description !!}</p>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- product-description-end -->
@endsection
