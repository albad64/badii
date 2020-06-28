@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.language.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.languages.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.language.fields.id') }}
                        </th>
                        <td>
                            {{ $language->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.language.fields.resource_code') }}
                        </th>
                        <td>
                            {{ $language->resource_code->resource_code ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.language.fields.language_name') }}
                        </th>
                        <td>
                            {{ App\Language::LANGUAGE_NAME_SELECT[$language->language_name] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.language.fields.fluency_level') }}
                        </th>
                        <td>
                            {{ $language->fluency_level }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.language.fields.certificate_level') }}
                        </th>
                        <td>
                            {{ $language->certificate_level }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.language.fields.year_level') }}
                        </th>
                        <td>
                            {{ $language->year_level }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.languages.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection