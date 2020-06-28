@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.currencyHistory.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.currency-histories.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.currencyHistory.fields.id') }}
                        </th>
                        <td>
                            {{ $currencyHistory->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.currencyHistory.fields.currency') }}
                        </th>
                        <td>
                            {{ $currencyHistory->currency->code ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.currencyHistory.fields.date_validity') }}
                        </th>
                        <td>
                            {{ $currencyHistory->date_validity }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.currencyHistory.fields.conversion_rate') }}
                        </th>
                        <td>
                            {{ $currencyHistory->conversion_rate }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.currency-histories.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection