<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use \DateTimeInterface;

class Contract extends Model
{
    use SoftDeletes;

    public $table = 'contracts';

    const CCNL_SELECT = [
        'CCNL Commercio' => 'CCNL Commercio',
    ];

    const US_CATEGORY_SELECT = [
        'Exempt'     => 'Exempt',
        'Not Exempt' => 'Not Exempt',
    ];

    const CONTRACT_TIME_SELECT = [
        'Part time' => 'Part time',
        'Full time' => 'Full time',
    ];

    const CONTRACT_DURATION_SELECT = [
        'Permanent' => 'Permanent',
        'Temporary' => 'Temporary',
    ];

    protected $dates = [
        'start_date',
        'end_date',
        'termination_date',
        'end_trial_period_date',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    const CLB_CATEGORY_SELECT = [
        'Dirigente' => 'Dirigente',
        'Impiegato' => 'Impiegato',
        'Operaio'   => 'Operaio',
        'Quadro'    => 'Quadro',
    ];

    const AREA_TYPE_SELECT = [
        'Struttura' => 'Struttura',
        'Operativo' => 'Operativo',
        'Condiviso' => 'Condiviso',
        'Vendite'   => 'Vendite',
    ];

    const HEAD_OFFICE_SELECT = [
        'IT - Florence Headquartes' => 'IT - Florence Headquartes',
        'IT - Milan'                => 'IT - Milan',
        'US - Boston'               => 'US - Boston',
    ];

    const TERMINATION_CODE_SELECT = [
        'Consensual'      => 'Consensual',
        'Contract Expiry' => 'Contract Expiry',
        'Dismissal'       => 'Dismissal',
        'Resignation'     => 'Resignation',
        'Resolution'      => 'Resolution',
    ];

    const CONTRACT_TYPE_SELECT = [
        'Employee'          => 'Employee',
        'Self Employed'     => 'Self Employed',
        'Contractors'       => 'Contractors',
        'Internal'          => 'Internal',
        'Staffing Agency'   => 'Staffing Agency',
        'Managing Director' => 'Managing Director',
        'Project Base Work' => 'Project Base Work',
    ];

    const CLB_LEVEL_SELECT = [
        'Livello VII' => 'Livello VII',
        'Livello VI'  => 'Livello VI',
        'Livello V'   => 'Livello V',
        'Livello IV'  => 'Livello IV',
        'Livello III' => 'Livello III',
        'Livello II'  => 'Livello II',
        'Livello I'   => 'Livello I',
        'Quadro'      => 'Quadro',
        'Dirigente'   => 'Dirigente',
    ];

    protected $fillable = [
        'resource_code_id',
        'start_date',
        'end_date',
        'company_id',
        'head_office',
        'contract_type',
        'contract_duration',
        'contract_time',
        'area_type',
        'termination_date',
        'termination_code',
        'calculation_lps',
        'ccnl',
        'clb_category',
        'clb_level',
        'us_category',
        'end_trial_period_date',
        'weekly_working_hours',
        'report_resource_code_id',
        'hr_canteen_charge',
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

    public function company()
    {
        return $this->belongsTo(Company::class, 'company_id');
    }

    public function getTerminationDateAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('panel.date_format')) : null;
    }

    public function setTerminationDateAttribute($value)
    {
        $this->attributes['termination_date'] = $value ? Carbon::createFromFormat(config('panel.date_format'), $value)->format('Y-m-d') : null;
    }

    public function getEndTrialPeriodDateAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('panel.date_format')) : null;
    }

    public function setEndTrialPeriodDateAttribute($value)
    {
        $this->attributes['end_trial_period_date'] = $value ? Carbon::createFromFormat(config('panel.date_format'), $value)->format('Y-m-d') : null;
    }

    public function report_resource_code()
    {
        return $this->belongsTo(Resource::class, 'report_resource_code_id');
    }
}
