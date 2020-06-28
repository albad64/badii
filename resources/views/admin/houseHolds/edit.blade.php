@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.houseHold.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.house-holds.update", [$houseHold->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label class="required" for="resource_code_id">{{ trans('cruds.houseHold.fields.resource_code') }}</label>
                <select class="form-control select2 {{ $errors->has('resource_code') ? 'is-invalid' : '' }}" name="resource_code_id" id="resource_code_id" required>
                    @foreach($resource_codes as $id => $resource_code)
                        <option value="{{ $id }}" {{ ($houseHold->resource_code ? $houseHold->resource_code->id : old('resource_code_id')) == $id ? 'selected' : '' }}>{{ $resource_code }}</option>
                    @endforeach
                </select>
                @if($errors->has('resource_code'))
                    <span class="text-danger">{{ $errors->first('resource_code') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.houseHold.fields.resource_code_helper') }}</span>
            </div>
            <div class="form-group">
<<<<<<< HEAD
                <label class="required" for="prog">{{ trans('cruds.houseHold.fields.prog') }}</label>
                <input class="form-control {{ $errors->has('prog') ? 'is-invalid' : '' }}" type="number" name="prog" id="prog" value="{{ old('prog', $houseHold->prog) }}" step="1" required>
=======
                <label for="prog">{{ trans('cruds.houseHold.fields.prog') }}</label>
                <input class="form-control {{ $errors->has('prog') ? 'is-invalid' : '' }}" type="number" name="prog" id="prog" value="{{ old('prog', $houseHold->prog) }}" step="1">
>>>>>>> quickadminpanel_2020_06_28_07_35_51
                @if($errors->has('prog'))
                    <span class="text-danger">{{ $errors->first('prog') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.houseHold.fields.prog_helper') }}</span>
            </div>
            <div class="form-group">
<<<<<<< HEAD
                <label class="required">{{ trans('cruds.houseHold.fields.relationship_type') }}</label>
                <select class="form-control {{ $errors->has('relationship_type') ? 'is-invalid' : '' }}" name="relationship_type" id="relationship_type" required>
=======
                <label>{{ trans('cruds.houseHold.fields.relationship_type') }}</label>
                <select class="form-control {{ $errors->has('relationship_type') ? 'is-invalid' : '' }}" name="relationship_type" id="relationship_type">
>>>>>>> quickadminpanel_2020_06_28_07_35_51
                    <option value disabled {{ old('relationship_type', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\HouseHold::RELATIONSHIP_TYPE_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('relationship_type', $houseHold->relationship_type) === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('relationship_type'))
                    <span class="text-danger">{{ $errors->first('relationship_type') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.houseHold.fields.relationship_type_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="relative_first_name">{{ trans('cruds.houseHold.fields.relative_first_name') }}</label>
                <input class="form-control {{ $errors->has('relative_first_name') ? 'is-invalid' : '' }}" type="text" name="relative_first_name" id="relative_first_name" value="{{ old('relative_first_name', $houseHold->relative_first_name) }}">
                @if($errors->has('relative_first_name'))
                    <span class="text-danger">{{ $errors->first('relative_first_name') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.houseHold.fields.relative_first_name_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="relative_last_name">{{ trans('cruds.houseHold.fields.relative_last_name') }}</label>
                <input class="form-control {{ $errors->has('relative_last_name') ? 'is-invalid' : '' }}" type="text" name="relative_last_name" id="relative_last_name" value="{{ old('relative_last_name', $houseHold->relative_last_name) }}">
                @if($errors->has('relative_last_name'))
                    <span class="text-danger">{{ $errors->first('relative_last_name') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.houseHold.fields.relative_last_name_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="percentage_charged">{{ trans('cruds.houseHold.fields.percentage_charged') }}</label>
                <input class="form-control {{ $errors->has('percentage_charged') ? 'is-invalid' : '' }}" type="number" name="percentage_charged" id="percentage_charged" value="{{ old('percentage_charged', $houseHold->percentage_charged) }}" step="0.01">
                @if($errors->has('percentage_charged'))
                    <span class="text-danger">{{ $errors->first('percentage_charged') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.houseHold.fields.percentage_charged_helper') }}</span>
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