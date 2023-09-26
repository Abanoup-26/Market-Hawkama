@extends('layouts.frontend')
@php
    $cartprojects = session('cart', []);
    $cart_count = count($cartprojects);
    $cart;
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
                        <h2 class="title"> اتمام عملية الدفع </h2>
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

    <form class="row justify-content-center mt-5 " method="POST" action="{{ route('supporter.payments.store') }}"
        enctype="multipart/form-data">
        @csrf
        <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">
        <div class="form-group mt-2 col-md-7">
            <label class="required mb-2 fs-3 " for="name">الاسم</label>
            <input class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" type="text" name="name"
                id="name" value="{{ old('name', auth()->user()->name) }}" required>
            @if ($errors->has('name'))
                <div class="invalid-feedback">
                    {{ $errors->first('name') }}
                </div>
            @endif
            <span class="help-block">{{ trans('cruds.user.fields.name_helper') }}</span>
        </div>
        <div class="form-group mt-2 col-md-7">
            <label class="required mb-2 fs-3" for="email">البريد الالكتروني</label>
            <input class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}" type="email" name="email"
                id="email" value="{{ old('email', auth()->user()->email) }}" required>
            @if ($errors->has('email'))
                <div class="invalid-feedback">
                    {{ $errors->first('email') }}
                </div>
            @endif
            <span class="help-block">{{ trans('cruds.user.fields.email_helper') }}</span>
        </div>
        <div class="form-group mt-2 col-md-7">
            <label class="required mb-2 fs-3" for="phone_number">رقم الهاتف </label>
            <input class="form-control {{ $errors->has('phone_number') ? 'is-invalid' : '' }}" type="text"
                name="phone_number" id="phone_number" value="{{ old('phone_number', auth()->user()->phone_number) }}"
                required>
            @if ($errors->has('phone_number'))
                <div class="invalid-feedback">
                    {{ $errors->first('phone_number') }}
                </div>
            @endif
            <span class="help-block">{{ trans('cruds.user.fields.phone_number_helper') }}</span>
        </div>

        @php
            $total = 0;
            foreach ($cartprojects as $key => $value) {
                $total += $value['donation-amount'];
            }
        @endphp
        <div class="form-group mt-2 col-md-7">
            <label class="required mb-2 fs-3" for="donation">اجمالي التبرع </label>
            <input class="form-control {{ $errors->has('donation') ? 'is-invalid' : '' }}" type="number" name="donation"
                id="donation" value="{{ old('donation', $total) }}" step="0.01" required>
            @if ($errors->has('donation'))
                <div class="invalid-feedback">
                    {{ $errors->first('donation') }}
                </div>
            @endif
            <span class="help-block">{{ trans('cruds.payment.fields.donation_helper') }}</span>
        </div>

        <div class="form-group mt-2 col-md-7">
            <label class="required mb-2 fs-3">طريقة الدفع</label>
            <select class="form-control {{ $errors->has('payment_type') ? 'is-invalid' : '' }}" name="payment_type"
                id="payment_type" required>
                <option value disabled {{ old('payment_type', null) === null ? 'selected' : '' }}>
                    {{ trans('global.pleaseSelect') }}</option>
                @foreach (App\Models\Payment::PAYMENT_TYPE_SELECT as $key => $label)
                    <option value="{{ $key }}" {{ old('payment_type', '') === (string) $key ? 'selected' : '' }}>
                        {{ $label }}</option>
                @endforeach
            </select>
            @if ($errors->has('payment_type'))
                <div class="invalid-feedback">
                    {{ $errors->first('payment_type') }}
                </div>
            @endif
            <span class="help-block">{{ trans('cruds.payment.fields.payment_type_helper') }}</span>
        </div>
        <div class="form-group mt-2 col-md-7">
            <label class="mb-2 fs-3 "for="projects">المشاريع المحدده للتبرع </label>
            @foreach ($cartprojects as $key => $value)
                <div class="Project-{{ $key }}">
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
                            <h5 class="mb-0">مبلغ التبرع
                                <strong>${{ $value['donation-amount'] }}</strong>
                            </h5>
                        </div>
                    </div>
                </div>
                <input type="hidden" name="project_ids[]" value="{{ $key }}">

                <input class="form-control" type="number" name="project_donation_amounts[]"
                    value="{{ $value['donation-amount'] }}" step="0.01" readonly>
            @endforeach

        </div>


        <div class="form-group mt-2 row justify-content-center">
            <button class="btn btn-danger col-3" type="submit">
                دفع
            </button>
        </div>
    </form>
@endsection
