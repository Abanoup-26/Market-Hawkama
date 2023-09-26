@extends('layouts.app')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card mx-4">
                <div class="card-body p-4">
                    <h1>{{ trans('panel.site_title') }}</h1>
                    <p class="text-muted">{{ trans('global.login') }}</p>

                    @if (session('message'))
                        <div class="alert alert-info" role="alert">
                            {{ session('message') }}
                        </div>
                    @endif

                    @if (session('user_not_found'))
                        <div class="alert alert-danger" role="alert">
                            {{ session('user_not_found') }}
                        </div>
                    @endif

                    <form method="POST" action="{{ route('supporter.login') }}">
                        @csrf

                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text">
                                    <i class="fas fa-phone"></i>
                                </span>
                            </div>
                            <input type="number" name="phone_number"
                                class="form-control{{ $errors->has('phone_number') ? ' is-invalid' : '' }}" required
                                autofocus placeholder="{{ trans('global.user_phone_number') }}"
                                value="{{ old('phone_number', null) }}">
                            @if ($errors->has('phone_number'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('phone_number') }}
                                </div>
                            @endif
                        </div>

                        <div class="row justify-content-center">
                            <div class="col-3">
                                <button type="submit" class="btn btn-primary px-4">
                                    {{ trans('global.login') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
