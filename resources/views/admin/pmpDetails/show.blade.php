@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.pmpDetail.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.pmp-details.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.pmpDetail.fields.id') }}
                        </th>
                        <td>
                            {{ $pmpDetail->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.pmpDetail.fields.pmp') }}
                        </th>
                        <td>
                            {{ $pmpDetail->pmp->pmp_year ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.pmpDetail.fields.number_detail') }}
                        </th>
                        <td>
                            {{ $pmpDetail->number_detail }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.pmpDetail.fields.sub_objective_detail') }}
                        </th>
                        <td>
                            {!! $pmpDetail->sub_objective_detail !!}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.pmpDetail.fields.weight') }}
                        </th>
                        <td>
                            {{ $pmpDetail->weight }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.pmpDetail.fields.kpi_description') }}
                        </th>
                        <td>
                            {{ $pmpDetail->kpi_description }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.pmpDetail.fields.target') }}
                        </th>
                        <td>
                            {{ $pmpDetail->target }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.pmpDetail.fields.notes') }}
                        </th>
                        <td>
                            {!! $pmpDetail->notes !!}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.pmpDetail.fields.mid_year_evaluation') }}
                        </th>
                        <td>
                            {{ $pmpDetail->mid_year_evaluation }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.pmpDetail.fields.mid_year_weight') }}
                        </th>
                        <td>
                            {{ $pmpDetail->mid_year_weight }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.pmpDetail.fields.mid_year_notes') }}
                        </th>
                        <td>
                            {{ $pmpDetail->mid_year_notes }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.pmpDetail.fields.end_year_evaluation') }}
                        </th>
                        <td>
                            {{ $pmpDetail->end_year_evaluation }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.pmpDetail.fields.end_year_weight') }}
                        </th>
                        <td>
                            {{ $pmpDetail->end_year_weight }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.pmpDetail.fields.end_year_notes') }}
                        </th>
                        <td>
                            {{ $pmpDetail->end_year_notes }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.pmp-details.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection