@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.education.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.education.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label class="required" for="resource_code_id">{{ trans('cruds.education.fields.resource_code') }}</label>
                <select class="form-control select2 {{ $errors->has('resource_code') ? 'is-invalid' : '' }}" name="resource_code_id" id="resource_code_id" required>
                    @foreach($resource_codes as $id => $resource_code)
                        <option value="{{ $id }}" {{ old('resource_code_id') == $id ? 'selected' : '' }}>{{ $resource_code }}</option>
                    @endforeach
                </select>
                @if($errors->has('resource_code'))
                    <span class="text-danger">{{ $errors->first('resource_code') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.education.fields.resource_code_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="order_number">{{ trans('cruds.education.fields.order_number') }}</label>
                <input class="form-control {{ $errors->has('order_number') ? 'is-invalid' : '' }}" type="number" name="order_number" id="order_number" value="{{ old('order_number', '') }}" step="1" required>
                @if($errors->has('order_number'))
                    <span class="text-danger">{{ $errors->first('order_number') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.education.fields.order_number_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="graduated_year">{{ trans('cruds.education.fields.graduated_year') }}</label>
                <input class="form-control {{ $errors->has('graduated_year') ? 'is-invalid' : '' }}" type="number" name="graduated_year" id="graduated_year" value="{{ old('graduated_year', '') }}" step="1" required>
                @if($errors->has('graduated_year'))
                    <span class="text-danger">{{ $errors->first('graduated_year') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.education.fields.graduated_year_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required">{{ trans('cruds.education.fields.education_level') }}</label>
                <select class="form-control {{ $errors->has('education_level') ? 'is-invalid' : '' }}" name="education_level" id="education_level" required>
                    <option value disabled {{ old('education_level', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\Education::EDUCATION_LEVEL_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('education_level', '') === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('education_level'))
                    <span class="text-danger">{{ $errors->first('education_level') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.education.fields.education_level_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="education_area">{{ trans('cruds.education.fields.education_area') }}</label>
                <input class="form-control {{ $errors->has('education_area') ? 'is-invalid' : '' }}" type="text" name="education_area" id="education_area" value="{{ old('education_area', '') }}">
                @if($errors->has('education_area'))
                    <span class="text-danger">{{ $errors->first('education_area') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.education.fields.education_area_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="education_location">{{ trans('cruds.education.fields.education_location') }}</label>
                <input class="form-control {{ $errors->has('education_location') ? 'is-invalid' : '' }}" type="text" name="education_location" id="education_location" value="{{ old('education_location', '') }}">
                @if($errors->has('education_location'))
                    <span class="text-danger">{{ $errors->first('education_location') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.education.fields.education_location_helper') }}</span>
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