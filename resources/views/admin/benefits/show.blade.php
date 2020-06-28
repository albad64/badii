@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.benefit.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.benefits.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.benefit.fields.id') }}
                        </th>
                        <td>
                            {{ $benefit->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.benefit.fields.resource_code') }}
                        </th>
                        <td>
                            {{ $benefit->resource_code->resource_code ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.benefit.fields.benefit_extra_type') }}
                        </th>
                        <td>
                            {{ App\Benefit::BENEFIT_EXTRA_TYPE_SELECT[$benefit->benefit_extra_type] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.benefit.fields.benefit_type') }}
                        </th>
                        <td>
                            {{ App\Benefit::BENEFIT_TYPE_SELECT[$benefit->benefit_type] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.benefit.fields.assigned_date') }}
                        </th>
                        <td>
                            {{ $benefit->assigned_date }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.benefit.fields.expired_date') }}
                        </th>
                        <td>
                            {{ $benefit->expired_date }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.benefit.fields.currency') }}
                        </th>
                        <td>
                            {{ $benefit->currency->code ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.benefit.fields.total_cost') }}
                        </th>
                        <td>
                            {{ $benefit->total_cost }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.benefit.fields.optional_value') }}
                        </th>
                        <td>
                            {{ $benefit->optional_value }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.benefit.fields.fringe_benefit') }}
                        </th>
                        <td>
                            {{ $benefit->fringe_benefit }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.benefit.fields.notes') }}
                        </th>
                        <td>
                            {!! $benefit->notes !!}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.benefits.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection