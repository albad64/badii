@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.currencyHistory.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.currency-histories.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label class="required" for="currency_id">{{ trans('cruds.currencyHistory.fields.currency') }}</label>
                <select class="form-control select2 {{ $errors->has('currency') ? 'is-invalid' : '' }}" name="currency_id" id="currency_id" required>
                    @foreach($currencies as $id => $currency)
                        <option value="{{ $id }}" {{ old('currency_id') == $id ? 'selected' : '' }}>{{ $currency }}</option>
                    @endforeach
                </select>
                @if($errors->has('currency'))
                    <span class="text-danger">{{ $errors->first('currency') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.currencyHistory.fields.currency_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="date_validity">{{ trans('cruds.currencyHistory.fields.date_validity') }}</label>
                <input class="form-control date {{ $errors->has('date_validity') ? 'is-invalid' : '' }}" type="text" name="date_validity" id="date_validity" value="{{ old('date_validity') }}" required>
                @if($errors->has('date_validity'))
                    <span class="text-danger">{{ $errors->first('date_validity') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.currencyHistory.fields.date_validity_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="conversion_rate">{{ trans('cruds.currencyHistory.fields.conversion_rate') }}</label>
                <input class="form-control {{ $errors->has('conversion_rate') ? 'is-invalid' : '' }}" type="number" name="conversion_rate" id="conversion_rate" value="{{ old('conversion_rate', '1') }}" step="0.000001">
                @if($errors->has('conversion_rate'))
                    <span class="text-danger">{{ $errors->first('conversion_rate') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.currencyHistory.fields.conversion_rate_helper') }}</span>
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