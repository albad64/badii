@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.holiday.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.holidays.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.holiday.fields.id') }}
                        </th>
                        <td>
                            {{ $holiday->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.holiday.fields.resource_code') }}
                        </th>
                        <td>
                            {{ $holiday->resource_code->resource_code ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.holiday.fields.holidays_type') }}
                        </th>
                        <td>
                            {{ App\Holiday::HOLIDAYS_TYPE_SELECT[$holiday->holidays_type] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.holiday.fields.holiday_year') }}
                        </th>
                        <td>
                            {{ $holiday->holiday_year }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.holiday.fields.holiday_month') }}
                        </th>
                        <td>
                            {{ $holiday->holiday_month }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.holiday.fields.holiday_residual') }}
                        </th>
                        <td>
                            {{ $holiday->holiday_residual }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.holiday.fields.holiday_actual') }}
                        </th>
                        <td>
                            {{ $holiday->holiday_actual }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.holiday.fields.holiday_enjoyed') }}
                        </th>
                        <td>
                            {{ $holiday->holiday_enjoyed }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.holiday.fields.status') }}
                        </th>
                        <td>
                            {{ App\Holiday::STATUS_RADIO[$holiday->status] ?? '' }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.holidays.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection