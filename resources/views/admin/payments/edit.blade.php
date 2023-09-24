@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.payment.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.payments.update", [$payment->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label class="required" for="user_id">{{ trans('cruds.payment.fields.user') }}</label>
                <select class="form-control select2 {{ $errors->has('user') ? 'is-invalid' : '' }}" name="user_id" id="user_id" required>
                    @foreach($users as $id => $entry)
                        <option value="{{ $id }}" {{ (old('user_id') ? old('user_id') : $payment->user->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('user'))
                    <div class="invalid-feedback">
                        {{ $errors->first('user') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.payment.fields.user_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="project_id">{{ trans('cruds.payment.fields.project') }}</label>
                <select class="form-control select2 {{ $errors->has('project') ? 'is-invalid' : '' }}" name="project_id" id="project_id" required>
                    @foreach($projects as $id => $entry)
                        <option value="{{ $id }}" {{ (old('project_id') ? old('project_id') : $payment->project->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('project'))
                    <div class="invalid-feedback">
                        {{ $errors->first('project') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.payment.fields.project_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="payment_orderid">{{ trans('cruds.payment.fields.payment_orderid') }}</label>
                <input class="form-control {{ $errors->has('payment_orderid') ? 'is-invalid' : '' }}" type="text" name="payment_orderid" id="payment_orderid" value="{{ old('payment_orderid', $payment->payment_orderid) }}">
                @if($errors->has('payment_orderid'))
                    <div class="invalid-feedback">
                        {{ $errors->first('payment_orderid') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.payment.fields.payment_orderid_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="donation_num">{{ trans('cruds.payment.fields.donation_num') }}</label>
                <input class="form-control {{ $errors->has('donation_num') ? 'is-invalid' : '' }}" type="text" name="donation_num" id="donation_num" value="{{ old('donation_num', $payment->donation_num) }}">
                @if($errors->has('donation_num'))
                    <div class="invalid-feedback">
                        {{ $errors->first('donation_num') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.payment.fields.donation_num_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="donation">{{ trans('cruds.payment.fields.donation') }}</label>
                <input class="form-control {{ $errors->has('donation') ? 'is-invalid' : '' }}" type="number" name="donation" id="donation" value="{{ old('donation', $payment->donation) }}" step="0.01" required>
                @if($errors->has('donation'))
                    <div class="invalid-feedback">
                        {{ $errors->first('donation') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.payment.fields.donation_helper') }}</span>
            </div>
            <div class="form-group">
                <label>{{ trans('cruds.payment.fields.payment_status') }}</label>
                @foreach(App\Models\Payment::PAYMENT_STATUS_RADIO as $key => $label)
                    <div class="form-check {{ $errors->has('payment_status') ? 'is-invalid' : '' }}">
                        <input class="form-check-input" type="radio" id="payment_status_{{ $key }}" name="payment_status" value="{{ $key }}" {{ old('payment_status', $payment->payment_status) === (string) $key ? 'checked' : '' }}>
                        <label class="form-check-label" for="payment_status_{{ $key }}">{{ $label }}</label>
                    </div>
                @endforeach
                @if($errors->has('payment_status'))
                    <div class="invalid-feedback">
                        {{ $errors->first('payment_status') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.payment.fields.payment_status_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required">{{ trans('cruds.payment.fields.payment_type') }}</label>
                <select class="form-control {{ $errors->has('payment_type') ? 'is-invalid' : '' }}" name="payment_type" id="payment_type" required>
                    <option value disabled {{ old('payment_type', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\Models\Payment::PAYMENT_TYPE_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('payment_type', $payment->payment_type) === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('payment_type'))
                    <div class="invalid-feedback">
                        {{ $errors->first('payment_type') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.payment.fields.payment_type_helper') }}</span>
            </div>
            <div class="form-group">
                <button class="btn btn-danger" type="submit">
                    {{ trans('global.save') }}
                </button>
            </div>
        </form>
    </div>
</div>



@endsection