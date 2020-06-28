@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.currency.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.currencies.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label class="required" for="code">{{ trans('cruds.currency.fields.code') }}</label>
                <input class="form-control {{ $errors->has('code') ? 'is-invalid' : '' }}" type="text" name="code" id="code" value="{{ old('code', '') }}" required>
                @if($errors->has('code'))
                    <span class="text-danger">{{ $errors->first('code') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.currency.fields.code_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="description">{{ trans('cruds.currency.fields.description') }}</label>
                <input class="form-control {{ $errors->has('description') ? 'is-invalid' : '' }}" type="text" name="description" id="description" value="{{ old('description', '') }}" required>
                @if($errors->has('description'))
                    <span class="text-danger">{{ $errors->first('description') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.currency.fields.description_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="symbol">{{ trans('cruds.currency.fields.symbol') }}</label>
                <input class="form-control {{ $errors->has('symbol') ? 'is-invalid' : '' }}" type="text" name="symbol" id="symbol" value="{{ old('symbol', '') }}" required>
                @if($errors->has('symbol'))
                    <span class="text-danger">{{ $errors->first('symbol') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.currency.fields.symbol_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="country_id">{{ trans('cruds.currency.fields.country') }}</label>
                <select class="form-control select2 {{ $errors->has('country') ? 'is-invalid' : '' }}" name="country_id" id="country_id">
                    @foreach($countries as $id => $country)
                        <option value="{{ $id }}" {{ old('country_id') == $id ? 'selected' : '' }}>{{ $country }}</option>
                    @endforeach
                </select>
                @if($errors->has('country'))
                    <span class="text-danger">{{ $errors->first('country') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.currency.fields.country_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="order_number">{{ trans('cruds.currency.fields.order_number') }}</label>
                <input class="form-control {{ $errors->has('order_number') ? 'is-invalid' : '' }}" type="number" name="order_number" id="order_number" value="{{ old('order_number', '99') }}" step="1" required>
                @if($errors->has('order_number'))
                    <span class="text-danger">{{ $errors->first('order_number') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.currency.fields.order_number_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="decimal_digits">{{ trans('cruds.currency.fields.decimal_digits') }}</label>
                <input class="form-control {{ $errors->has('decimal_digits') ? 'is-invalid' : '' }}" type="number" name="decimal_digits" id="decimal_digits" value="{{ old('decimal_digits', '2') }}" step="1">
                @if($errors->has('decimal_digits'))
                    <span class="text-danger">{{ $errors->first('decimal_digits') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.currency.fields.decimal_digits_helper') }}</span>
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