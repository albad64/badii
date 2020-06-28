@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.houseHold.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.house-holds.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.houseHold.fields.id') }}
                        </th>
                        <td>
                            {{ $houseHold->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.houseHold.fields.resource_code') }}
                        </th>
                        <td>
                            {{ $houseHold->resource_code->resource_code ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.houseHold.fields.prog') }}
                        </th>
                        <td>
                            {{ $houseHold->prog }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.houseHold.fields.relationship_type') }}
                        </th>
                        <td>
                            {{ App\HouseHold::RELATIONSHIP_TYPE_SELECT[$houseHold->relationship_type] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.houseHold.fields.relative_first_name') }}
                        </th>
                        <td>
                            {{ $houseHold->relative_first_name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.houseHold.fields.relative_last_name') }}
                        </th>
                        <td>
                            {{ $houseHold->relative_last_name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.houseHold.fields.percentage_charged') }}
                        </th>
                        <td>
                            {{ $houseHold->percentage_charged }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.house-holds.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection