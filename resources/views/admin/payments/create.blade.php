@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.payment.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.payments.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label class="required" for="user_id">{{ trans('cruds.payment.fields.user') }}</label>
                <select class="form-control select2 {{ $errors->has('user') ? 'is-invalid' : '' }}" name="user_id" id="user_id" required>
                    @foreach($users as $id => $entry)
                        <option value="{{ $id }}" {{ old('user_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
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
                <label for="payment_orderid">{{ trans('cruds.payment.fields.payment_orderid') }}</label>
                <input class="form-control {{ $errors->has('payment_orderid') ? 'is-invalid' : '' }}" type="text" name="payment_orderid" id="payment_orderid" value="{{ old('payment_orderid', '') }}">
                @if($errors->has('payment_orderid'))
                    <div class="invalid-feedback">
                        {{ $errors->first('payment_orderid') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.payment.fields.payment_orderid_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="donation_num">{{ trans('cruds.payment.fields.donation_num') }}</label>
                <input class="form-control {{ $errors->has('donation_num') ? 'is-invalid' : '' }}" type="text" name="donation_num" id="donation_num" value="{{ old('donation_num', '') }}">
                @if($errors->has('donation_num'))
                    <div class="invalid-feedback">
                        {{ $errors->first('donation_num') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.payment.fields.donation_num_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="donation">{{ trans('cruds.payment.fields.donation') }}</label>
                <input class="form-control {{ $errors->has('donation') ? 'is-invalid' : '' }}" type="number" name="donation" id="donation" value="{{ old('donation', '') }}" step="0.01" required>
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
                        <input class="form-check-input" type="radio" id="payment_status_{{ $key }}" name="payment_status" value="{{ $key }}" {{ old('payment_status', 'unpaid') === (string) $key ? 'checked' : '' }}>
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
                        <option value="{{ $key }}" {{ old('payment_type', '') === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
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
                <label for="projects">{{ trans('cruds.payment.fields.project') }}</label>
                <div style="padding-bottom: 4px">
                    <span class="btn btn-info btn-xs select-all" style="border-radius: 0">{{ trans('global.select_all') }}</span>
                    <span class="btn btn-info btn-xs deselect-all" style="border-radius: 0">{{ trans('global.deselect_all') }}</span>
                </div>
                <select class="form-control select2 {{ $errors->has('projects') ? 'is-invalid' : '' }}" name="projects[]" id="projects" multiple>
                    @foreach($projects as $id => $project)
                        <option value="{{ $id }}" {{ in_array($id, old('projects', [])) ? 'selected' : '' }}>{{ $project }}</option>
                    @endforeach
                </select>
                @if($errors->has('projects'))
                    <div class="invalid-feedback">
                        {{ $errors->first('projects') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.payment.fields.project_helper') }}</span>
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