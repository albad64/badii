@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.education.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.education.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.education.fields.id') }}
                        </th>
                        <td>
                            {{ $education->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.education.fields.resource_code') }}
                        </th>
                        <td>
                            {{ $education->resource_code->resource_code ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.education.fields.order_number') }}
                        </th>
                        <td>
                            {{ $education->order_number }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.education.fields.graduated_year') }}
                        </th>
                        <td>
                            {{ $education->graduated_year }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.education.fields.education_level') }}
                        </th>
                        <td>
                            {{ App\Education::EDUCATION_LEVEL_SELECT[$education->education_level] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.education.fields.education_area') }}
                        </th>
                        <td>
                            {{ $education->education_area }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.education.fields.education_location') }}
                        </th>
                        <td>
                            {{ $education->education_location }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.education.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection