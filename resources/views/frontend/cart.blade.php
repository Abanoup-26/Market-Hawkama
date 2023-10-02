@extends('layouts.frontend')
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
                                @if (session('cart'))
                                    @foreach (session('cart') as $key => $value)
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
                                                    <img src="{{ $img }}" alt="" width="100"
                                                        height="150" class="img-fluid rounded shadow-sm m-3">
                                                    <div class="ml-3 d-inline-block align-middle">
                                                        <h5 class="mb-0"> <a href="#"
                                                                class="text-dark d-inline-block align-middle">{{ $value['title'] }}</a>
                                                        </h5>
                                                    </div>
                                                </div>
                                            </th>
                                            <td class="border-0 align-middle text-center"><strong>SAR
                                                    &nbsp;{{ number_format($value['goal']) }}</strong>
                                            </td>
                                            <td class="border-0 align-middle text-center">
                                                <strong>SAR &nbsp;{{ number_format($value['collected']) }}</strong>
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
                                                    <strong>SAR
                                                        &nbsp;{{ number_format($value['donation-amount']) }}</strong>
                                                </td>
                                            @endif

                                            <td class="border-0 align-middle text-center"><a
                                                    href="{{ route('frontend.cart.destroy', $key) }}" class="text-dark"><i
                                                        class="fa fa-trash"></i></a></td>
                                        </tr>
                                    @endforeach
                                @endif
                            </tbody>
                        </table>
                    </div>
                    <!-- End -->


                    <form action="{{ route('frontend.payment') }}" method="POST">
                        @csrf

                        <ul class="list-unstyled mb-4">
                            @php
                                $total = 0;
                                if (session('cart')) {
                                    foreach (session('cart') as $key => $value) {
                                        $total += $value['donation-amount'];
                                    }
                                }
                            @endphp
                            <li class="d-flex justify-content-between py-3 border-bottom">
                                <strong class="text-muted">الإجمالي</strong>
                                <h5 class="font-weight-bold">${{ $total }}</h5>
                            </li>
                        </ul>

                        @auth
                            <div class="row mb-5">
                                <div class="form-group col-md-3">
                                    <label class="required">{{ trans('cruds.payment.fields.payment_type') }}</label>
                                    @foreach (App\Models\Payment::PAYMENT_TYPE_RADIO as $key => $label)
                                        <div class="form-check {{ $errors->has('payment_type') ? 'is-invalid' : '' }}">
                                            <input class="form-check-input" type="radio"
                                                id="payment_type_{{ $key }}" name="payment_type"
                                                value="{{ $key }}"
                                                {{ old('payment_type', 'cash') === (string) $key ? 'checked' : '' }} required>
                                            <label class="form-check-label"
                                                for="payment_type_{{ $key }}">{{ $label }}</label>
                                        </div>
                                    @endforeach
                                    <span class="help-block">{{ trans('cruds.payment.fields.payment_type_helper') }}</span>
                                </div>
                            </div>
                        @else
                        @endauth

                        <div class="row justify-content-between">
                            @auth
                                <button type="submit" class="btn btn-dark rounded-pill py-3 btn-block  col-4">اتمام عملية الدفع
                                </button>
                            @else
                                <a href="{{ route('supporter.login') }}"
                                    class="btn btn-dark rounded-pill py-3 btn-block  col-4">اتمام عملية الدفع
                                </a>
                            @endauth
                            <a href="{{ route('frontend.home') }}"
                                class="btn btn-dark rounded-pill py-3 btn-block  col-4">العوده لتصفح المزيد من
                                المشاريع الخيريه
                            </a>
                        </div>
                    </form>

                </div>
            </div>

        </div>
    </div>


    <!-- category-area-end -->
@endsection
