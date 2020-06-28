@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.companiesHoliday.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.companies-holidays.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.companiesHoliday.fields.id') }}
                        </th>
                        <td>
                            {{ $companiesHoliday->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.companiesHoliday.fields.company') }}
                        </th>
                        <td>
                            {{ $companiesHoliday->company->company ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.companiesHoliday.fields.level') }}
                        </th>
                        <td>
                            {{ $companiesHoliday->level }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.companiesHoliday.fields.seniority') }}
                        </th>
                        <td>
                            {{ $companiesHoliday->seniority }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.companiesHoliday.fields.days_for_month') }}
                        </th>
                        <td>
                            {{ $companiesHoliday->days_for_month }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.companies-holidays.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection