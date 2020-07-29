<?php

namespace App\Http\Controllers\Admin;

use App\Country;
use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyResourceRequest;
use App\Http\Requests\StoreResourceRequest;
use App\Http\Requests\UpdateResourceRequest;
use App\Resource;
use App\Team;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class ResourcesController extends Controller
{
    public function index(Request $request)
    {
        abort_if(Gate::denies('resource_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = Resource::with(['birth_country', 'address_country', 'alt_address_country', 'team'])->select(sprintf('%s.*', (new Resource)->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate      = 'resource_show';
                $editGate      = 'resource_edit';
                $deleteGate    = 'resource_delete';
                $crudRoutePart = 'resources';

                return view('partials.datatablesActions', compact(
                    'viewGate',
                    'editGate',
                    'deleteGate',
                    'crudRoutePart',
                    'row'
                ));
            });

            $table->editColumn('id', function ($row) {
                return $row->id ? $row->id : "";
            });
            $table->editColumn('resource_code', function ($row) {
                return $row->resource_code ? $row->resource_code : "";
            });
            $table->editColumn('first_name', function ($row) {
                return $row->first_name ? $row->first_name : "";
            });
            $table->editColumn('last_name', function ($row) {
                return $row->last_name ? $row->last_name : "";
            });

            $table->editColumn('status', function ($row) {
                return $row->status ? Resource::STATUS_SELECT[$row->status] : '';
            });
            $table->editColumn('title', function ($row) {
                return $row->title ? Resource::TITLE_SELECT[$row->title] : '';
            });
            $table->editColumn('gender', function ($row) {
                return $row->gender ? Resource::GENDER_SELECT[$row->gender] : '';
            });

            $table->editColumn('birth_city', function ($row) {
                return $row->birth_city ? $row->birth_city : "";
            });
            $table->addColumn('birth_country_name', function ($row) {
                return $row->birth_country ? $row->birth_country->name : '';
            });

            $table->editColumn('nationality', function ($row) {
                return $row->nationality ? Resource::NATIONALITY_SELECT[$row->nationality] : '';
            });
            $table->editColumn('marital_status', function ($row) {
                return $row->marital_status ? Resource::MARITAL_STATUS_SELECT[$row->marital_status] : '';
            });
            $table->editColumn('fiscal_code', function ($row) {
                return $row->fiscal_code ? $row->fiscal_code : "";
            });
            $table->editColumn('vat_number', function ($row) {
                return $row->vat_number ? $row->vat_number : "";
            });
            $table->editColumn('company_partner', function ($row) {
                return '<input type="checkbox" disabled ' . ($row->company_partner ? 'checked' : null) . '>';
            });
            $table->editColumn('protected_categories', function ($row) {
                return '<input type="checkbox" disabled ' . ($row->protected_categories ? 'checked' : null) . '>';
            });
            $table->editColumn('disability_percentage', function ($row) {
                return $row->disability_percentage ? $row->disability_percentage : "";
            });
            $table->editColumn('ice_person', function ($row) {
                return $row->ice_person ? $row->ice_person : "";
            });
            $table->editColumn('ice_phone', function ($row) {
                return $row->ice_phone ? $row->ice_phone : "";
            });
            $table->editColumn('ice_email', function ($row) {
                return $row->ice_email ? $row->ice_email : "";
            });
            $table->editColumn('address_street', function ($row) {
                return $row->address_street ? $row->address_street : "";
            });
            $table->editColumn('address_city', function ($row) {
                return $row->address_city ? $row->address_city : "";
            });
            $table->editColumn('address_postalcode', function ($row) {
                return $row->address_postalcode ? $row->address_postalcode : "";
            });
            $table->addColumn('address_country_name', function ($row) {
                return $row->address_country ? $row->address_country->name : '';
            });

            $table->editColumn('address_state', function ($row) {
                return $row->address_state ? Resource::ADDRESS_STATE_SELECT[$row->address_state] : '';
            });
            $table->editColumn('work_phone', function ($row) {
                return $row->work_phone ? $row->work_phone : "";
            });
            $table->editColumn('home_phone', function ($row) {
                return $row->home_phone ? $row->home_phone : "";
            });
            $table->editColumn('office_phone', function ($row) {
                return $row->office_phone ? $row->office_phone : "";
            });
            $table->editColumn('home_email', function ($row) {
                return $row->home_email ? $row->home_email : "";
            });
            $table->editColumn('work_email', function ($row) {
                return $row->work_email ? $row->work_email : "";
            });
            $table->editColumn('other_email', function ($row) {
                return $row->other_email ? $row->other_email : "";
            });
            $table->editColumn('alt_address_street', function ($row) {
                return $row->alt_address_street ? $row->alt_address_street : "";
            });
            $table->editColumn('alt_address_city', function ($row) {
                return $row->alt_address_city ? $row->alt_address_city : "";
            });
            $table->editColumn('alt_address_postalcode', function ($row) {
                return $row->alt_address_postalcode ? $row->alt_address_postalcode : "";
            });
            $table->addColumn('alt_address_country_name', function ($row) {
                return $row->alt_address_country ? $row->alt_address_country->name : '';
            });

            $table->editColumn('alt_address_state', function ($row) {
                return $row->alt_address_state ? $row->alt_address_state : "";
            });

            $table->rawColumns(['actions', 'placeholder', 'birth_country', 'company_partner', 'protected_categories', 'address_country', 'alt_address_country']);

            return $table->make(true);
        }

        $countries = Country::get();
        $countries = Country::get();
        $countries = Country::get();
        $teams     = Team::get();

        return view('admin.resources.index', compact('countries', 'countries', 'countries', 'teams'));
    }

    public function create()
    {
        abort_if(Gate::denies('resource_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $birth_countries = Country::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $address_countries = Country::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $alt_address_countries = Country::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.resources.create', compact('birth_countries', 'address_countries', 'alt_address_countries'));
    }

    public function store(StoreResourceRequest $request)
    {
        $resource = Resource::create($request->all());

        return redirect()->route('admin.resources.index');
    }

    public function edit(Resource $resource)
    {
        abort_if(Gate::denies('resource_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $birth_countries = Country::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $address_countries = Country::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $alt_address_countries = Country::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $resource->load('birth_country', 'address_country', 'alt_address_country', 'team');

        return view('admin.resources.edit', compact('birth_countries', 'address_countries', 'alt_address_countries', 'resource'));
    }

    public function update(UpdateResourceRequest $request, Resource $resource)
    {
        $resource->update($request->all());

        return redirect()->route('admin.resources.index');
    }

    public function show(Resource $resource)
    {
        abort_if(Gate::denies('resource_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $resource->load('birth_country', 'address_country', 'alt_address_country', 'team', 'resourceCodeHouseHolds', 'resourceCodeContracts', 'resourceCodeSalaries', 'resourceCodeBenefits', 'resourceCodeEducation', 'resourceCodeHolidays', 'resourceCodeJobExperiences', 'resourceCodeLanguages');

        return view('admin.resources.show', compact('resource'));
    }

    public function destroy(Resource $resource)
    {
        abort_if(Gate::denies('resource_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $resource->delete();

        return back();
    }

    public function massDestroy(MassDestroyResourceRequest $request)
    {
        Resource::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
