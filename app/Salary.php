<?php

namespace App;

use App\Traits\Auditable;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use \DateTimeInterface;

class Salary extends Model
{
    use SoftDeletes, Auditable;

    public $table = 'salaries';

    const INTERNAL_OFFICE_SELECT = [

    ];

    const INTERNAL_DEPARTMENT_SELECT = [

    ];

    const NCA_FREQUENCY_SELECT = [
        'Day'   => 'Day',
        'Month' => 'Month',
        'Year'  => 'Year',
    ];

    const VARIABLE_COMP_TARGET_SELECT = [
        'No'             => 'No',
        'Yes Fixed'      => 'Yes Fixed',
        'Yes Percentage' => 'Yes Percentage',
    ];

    protected $dates = [
        'start_date',
        'end_date',
        'staffing_agency_end_date',
        'nca_end_date',
        'expected_next_lsb_date',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'resource_code_id',
        'start_date',
        'end_date',
        'remote_job',
        'work_country_id',
        'week_working_string',
        'currency_id',
        'internal_department',
        'internal_office',
        'annual_base_salary',
        'vat_daily_fee',
        'vat_daily_cost',
        'staffing_agency_amount',
        'staffing_agency_end_date',
        'reimb_km',
        'nca',
        'nca_end_date',
        'nca_frequency',
        'nca_value',
        'expected_next_lsb_date',
        'monthly_lsb',
        'variable_comp_target',
        'variable_comp_value',
        'notes',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }

    public function resource_code()
    {
        return $this->belongsTo(Resource::class, 'resource_code_id');
    }

    public function getStartDateAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('panel.date_format')) : null;
    }

    public function setStartDateAttribute($value)
    {
        $this->attributes['start_date'] = $value ? Carbon::createFromFormat(config('panel.date_format'), $value)->format('Y-m-d') : null;
    }

    public function getEndDateAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('panel.date_format')) : null;
    }

    public function setEndDateAttribute($value)
    {
        $this->attributes['end_date'] = $value ? Carbon::createFromFormat(config('panel.date_format'), $value)->format('Y-m-d') : null;
    }

    public function work_country()
    {
        return $this->belongsTo(Country::class, 'work_country_id');
    }

    public function currency()
    {
        return $this->belongsTo(Currency::class, 'currency_id');
    }

    public function getStaffingAgencyEndDateAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('panel.date_format')) : null;
    }

    public function setStaffingAgencyEndDateAttribute($value)
    {
        $this->attributes['staffing_agency_end_date'] = $value ? Carbon::createFromFormat(config('panel.date_format'), $value)->format('Y-m-d') : null;
    }

    public function getNcaEndDateAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('panel.date_format')) : null;
    }

    public function setNcaEndDateAttribute($value)
    {
        $this->attributes['nca_end_date'] = $value ? Carbon::createFromFormat(config('panel.date_format'), $value)->format('Y-m-d') : null;
    }

    public function getExpectedNextLsbDateAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('panel.date_format')) : null;
    }

    public function setExpectedNextLsbDateAttribute($value)
    {
        $this->attributes['expected_next_lsb_date'] = $value ? Carbon::createFromFormat(config('panel.date_format'), $value)->format('Y-m-d') : null;
    }
}
