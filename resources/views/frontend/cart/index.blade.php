@extends('layouts.frontend')
@php
    $cartprojects = session('cart', []);
    $cart_count = count($cartprojects);
@endphp
@section('cart-count')
    {{ $cart_count }}
@endsection
@section('content')
    <!-- breadcrumb-area -->
    <section class="breadcrumb-area breadcrumb-bg" data-background="{{ asset('frontend/img/bg/breadcrumb_bg.jpg') }}">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-10">
                    <div class="breadcrumb-content text-center">
                        <h2 class="title"> السوق الإليكتروني </h2>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ route('frontend.home') }}">الرئيسية</a></li>
                                <li class="breadcrumb-item active" aria-current="page">السوق الإليكتروني </li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- breadcrumb-area-end -->
    <!-- category-area -->
    <div class="cart pt-130 pb-70">


        <div class="container">
            <div class="row">
                <div class="col-lg-12 p-5 bg-white rounded shadow-sm mb-5">

                    <!-- Shopping cart table -->
                    <div class="table-responsive">
                        <table class="table border">
                            <thead>
                                <tr>
                                    <th scope="col" class="border-0 bg-light text-center">
                                        <div class="p-2 px-3 text-uppercase">المشاريع</div>
                                    </th>
                                    <th scope="col" class="border-0 bg-light text-center">
                                        <div class="py-2 text-uppercase">المستهدف </div>
                                    </th>
                                    <th scope="col" class="border-0 bg-light text-center">
                                        <div class="py-2 text-uppercase">المبلغ الذي تم جمعه </div>
                                    </th>
                                    <th scope="col" class="border-0 bg-light text-center">
                                        <div class="py-2 text-uppercase">المبلغ المحدد للتبرع</div>
                                    </th>

                                    <th scope="col" class="border-0 bg-light text-center">
                                        <div class="py-2 text-uppercase">حذف </div>
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($projects as $key => $value)
                                    <tr class="Project-{{ $key }}">
                                        <th scope="row" class="border-0 " style="width:40%;">
                                            <div class="p-2">
                                                @php
                                                    if (isset($value['image'][0])) {
                                                        $img = $value['image'][0]->getUrl();
                                                    } else {
                                                        $img = asset('frontend/img/blank.jpg');
                                                    }
                                                @endphp
                                                <img src="{{ $img }}" alt="" width="70"
                                                    class="img-fluid rounded shadow-sm m-3">
                                                <div class="ml-3 d-inline-block align-middle">
                                                    <h5 class="mb-0"> <a href="#"
                                                            class="text-dark d-inline-block align-middle">{{ $value['title'] }}</a>
                                                    </h5>
                                                </div>
                                            </div>
                                        </th>
                                        <td class="border-0 align-middle text-center"><strong>${{ $value['goal'] }}</strong>
                                        </td>
                                        <td class="border-0 align-middle text-center">
                                            <strong>${{ $value['collected'] }}</strong>
                                        </td>
                                        @if ($value['donation-amount'] == null)
                                            <li class="col-6">
                                                <button
                                                    style="border:inherit; background: inherit; color:black; font-weight: 600"
                                                    type="submit"><i class="far fa-hands"></i> تحديد
                                                </button>

                                            </li>

                                            <td class="border-0 align-middle text-center">
                                                <strong>لم يتم تحديد مبلغ</strong>
                                                <form class=" row justify-content-center"
                                                    action="{{ route('frontend.cart.add', $key) }}" method="POST">
                                                    @csrf
                                                    <li class="col-6 mt-2">
                                                        <input
                                                            class="form-control {{ $errors->has('donation_amount') ? 'is-invalid' : '' }}"
                                                            type="number" name="donation_amount" id="donation_amount"
                                                            value="{{ old('donation_amount', '') }}"
                                                            placeholder="مبلغ التبرع" required>
                                                    </li>

                                                    <li class="col-6 mt-2">
                                                        <button class="btn-primary" style="width: 80px">تحديد</button>
                                                    </li>
                                                </form>
                                            </td>
                                        @else
                                            <td class="border-0 align-middle text-center">
                                                <strong>${{ $value['donation-amount'] }}</strong>
                                            </td>
                                        @endif

                                        <td class="border-0 align-middle text-center"><a
                                                href="{{ route('frontend.cart.destroy', $key) }}" class="text-dark"><i
                                                    class="fa fa-trash"></i></a></td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <!-- End -->
                </div>
            </div>

            <div class="row py-5 p-4 bg-white rounded shadow-sm">
                <div class="col-lg-12">
                    <div class="bg-light rounded-pill px-4 py-3 text-uppercase font-weight-bold">ملخص الطلب</div>
                    <div class="p-4">

                        <ul class="list-unstyled mb-4">
                            @php
                                $total = 0;
                                foreach ($projects as $key => $value) {
                                    $total += $value['donation-amount'];
                                }
                            @endphp
                            <li class="d-flex justify-content-between py-3 border-bottom">
                                <strong class="text-muted">الإجمالي</strong>
                                <h5 class="font-weight-bold">${{ $total }}</h5>
                            </li>
                        </ul><a href="#" class="btn btn-dark rounded-pill py-2 btn-block">انتقال الى صفحة الدفع</a>
                    </div>
                </div>
            </div>

        </div>
    </div>


    <!-- category-area-end -->
@endsection
