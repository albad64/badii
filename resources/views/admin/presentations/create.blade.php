@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.presentation.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.presentations.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label class="required" for="resource_code_id">{{ trans('cruds.presentation.fields.resource_code') }}</label>
                <select class="form-control select2 {{ $errors->has('resource_code') ? 'is-invalid' : '' }}" name="resource_code_id" id="resource_code_id" required>
                    @foreach($resource_codes as $id => $resource_code)
                        <option value="{{ $id }}" {{ old('resource_code_id') == $id ? 'selected' : '' }}>{{ $resource_code }}</option>
                    @endforeach
                </select>
                @if($errors->has('resource_code'))
                    <span class="text-danger">{{ $errors->first('resource_code') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.presentation.fields.resource_code_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="order_number">{{ trans('cruds.presentation.fields.order_number') }}</label>
                <input class="form-control {{ $errors->has('order_number') ? 'is-invalid' : '' }}" type="number" name="order_number" id="order_number" value="{{ old('order_number', '') }}" step="1" required>
                @if($errors->has('order_number'))
                    <span class="text-danger">{{ $errors->first('order_number') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.presentation.fields.order_number_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="event_host">{{ trans('cruds.presentation.fields.event_host') }}</label>
                <input class="form-control {{ $errors->has('event_host') ? 'is-invalid' : '' }}" type="text" name="event_host" id="event_host" value="{{ old('event_host', '') }}">
                @if($errors->has('event_host'))
                    <span class="text-danger">{{ $errors->first('event_host') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.presentation.fields.event_host_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="event_name">{{ trans('cruds.presentation.fields.event_name') }}</label>
                <input class="form-control {{ $errors->has('event_name') ? 'is-invalid' : '' }}" type="text" name="event_name" id="event_name" value="{{ old('event_name', '') }}">
                @if($errors->has('event_name'))
                    <span class="text-danger">{{ $errors->first('event_name') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.presentation.fields.event_name_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="event_location">{{ trans('cruds.presentation.fields.event_location') }}</label>
                <input class="form-control {{ $errors->has('event_location') ? 'is-invalid' : '' }}" type="text" name="event_location" id="event_location" value="{{ old('event_location', '') }}">
                @if($errors->has('event_location'))
                    <span class="text-danger">{{ $errors->first('event_location') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.presentation.fields.event_location_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="event_year">{{ trans('cruds.presentation.fields.event_year') }}</label>
                <input class="form-control {{ $errors->has('event_year') ? 'is-invalid' : '' }}" type="number" name="event_year" id="event_year" value="{{ old('event_year', '') }}" step="1">
                @if($errors->has('event_year'))
                    <span class="text-danger">{{ $errors->first('event_year') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.presentation.fields.event_year_helper') }}</span>
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