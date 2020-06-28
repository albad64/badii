@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.training.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.trainings.update", [$training->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label class="required" for="resource_code_id">{{ trans('cruds.training.fields.resource_code') }}</label>
                <select class="form-control select2 {{ $errors->has('resource_code') ? 'is-invalid' : '' }}" name="resource_code_id" id="resource_code_id" required>
                    @foreach($resource_codes as $id => $resource_code)
                        <option value="{{ $id }}" {{ ($training->resource_code ? $training->resource_code->id : old('resource_code_id')) == $id ? 'selected' : '' }}>{{ $resource_code }}</option>
                    @endforeach
                </select>
                @if($errors->has('resource_code'))
                    <span class="text-danger">{{ $errors->first('resource_code') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.training.fields.resource_code_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="order_number">{{ trans('cruds.training.fields.order_number') }}</label>
                <input class="form-control {{ $errors->has('order_number') ? 'is-invalid' : '' }}" type="number" name="order_number" id="order_number" value="{{ old('order_number', $training->order_number) }}" step="1" required>
                @if($errors->has('order_number'))
                    <span class="text-danger">{{ $errors->first('order_number') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.training.fields.order_number_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="training_supplier">{{ trans('cruds.training.fields.training_supplier') }}</label>
                <input class="form-control {{ $errors->has('training_supplier') ? 'is-invalid' : '' }}" type="text" name="training_supplier" id="training_supplier" value="{{ old('training_supplier', $training->training_supplier) }}">
                @if($errors->has('training_supplier'))
                    <span class="text-danger">{{ $errors->first('training_supplier') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.training.fields.training_supplier_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="training_location">{{ trans('cruds.training.fields.training_location') }}</label>
                <input class="form-control {{ $errors->has('training_location') ? 'is-invalid' : '' }}" type="text" name="training_location" id="training_location" value="{{ old('training_location', $training->training_location) }}">
                @if($errors->has('training_location'))
                    <span class="text-danger">{{ $errors->first('training_location') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.training.fields.training_location_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="training_description">{{ trans('cruds.training.fields.training_description') }}</label>
                <input class="form-control {{ $errors->has('training_description') ? 'is-invalid' : '' }}" type="text" name="training_description" id="training_description" value="{{ old('training_description', $training->training_description) }}">
                @if($errors->has('training_description'))
                    <span class="text-danger">{{ $errors->first('training_description') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.training.fields.training_description_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="training_year">{{ trans('cruds.training.fields.training_year') }}</label>
                <input class="form-control {{ $errors->has('training_year') ? 'is-invalid' : '' }}" type="number" name="training_year" id="training_year" value="{{ old('training_year', $training->training_year) }}" step="1">
                @if($errors->has('training_year'))
                    <span class="text-danger">{{ $errors->first('training_year') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.training.fields.training_year_helper') }}</span>
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