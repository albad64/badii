@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.language.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.languages.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label class="required" for="resource_code_id">{{ trans('cruds.language.fields.resource_code') }}</label>
                <select class="form-control select2 {{ $errors->has('resource_code') ? 'is-invalid' : '' }}" name="resource_code_id" id="resource_code_id" required>
                    @foreach($resource_codes as $id => $resource_code)
                        <option value="{{ $id }}" {{ old('resource_code_id') == $id ? 'selected' : '' }}>{{ $resource_code }}</option>
                    @endforeach
                </select>
                @if($errors->has('resource_code'))
                    <span class="text-danger">{{ $errors->first('resource_code') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.language.fields.resource_code_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required">{{ trans('cruds.language.fields.language_name') }}</label>
                <select class="form-control {{ $errors->has('language_name') ? 'is-invalid' : '' }}" name="language_name" id="language_name" required>
                    <option value disabled {{ old('language_name', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\Language::LANGUAGE_NAME_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('language_name', '') === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('language_name'))
                    <span class="text-danger">{{ $errors->first('language_name') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.language.fields.language_name_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="fluency_level">{{ trans('cruds.language.fields.fluency_level') }}</label>
                <input class="form-control {{ $errors->has('fluency_level') ? 'is-invalid' : '' }}" type="text" name="fluency_level" id="fluency_level" value="{{ old('fluency_level', '') }}">
                @if($errors->has('fluency_level'))
                    <span class="text-danger">{{ $errors->first('fluency_level') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.language.fields.fluency_level_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="certificate_level">{{ trans('cruds.language.fields.certificate_level') }}</label>
                <input class="form-control {{ $errors->has('certificate_level') ? 'is-invalid' : '' }}" type="text" name="certificate_level" id="certificate_level" value="{{ old('certificate_level', '') }}">
                @if($errors->has('certificate_level'))
                    <span class="text-danger">{{ $errors->first('certificate_level') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.language.fields.certificate_level_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="year_level">{{ trans('cruds.language.fields.year_level') }}</label>
                <input class="form-control {{ $errors->has('year_level') ? 'is-invalid' : '' }}" type="text" name="year_level" id="year_level" value="{{ old('year_level', '') }}">
                @if($errors->has('year_level'))
                    <span class="text-danger">{{ $errors->first('year_level') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.language.fields.year_level_helper') }}</span>
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