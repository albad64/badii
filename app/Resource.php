<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;
use Spatie\MediaLibrary\Models\Media;
use \DateTimeInterface;

class Resource extends Model implements HasMedia
{
    use SoftDeletes, HasMediaTrait;

    public $table = 'resources';

    protected $appends = [
        'photo',
    ];

    const ADDRESS_STATE_SELECT = [

    ];

    const GENDER_SELECT = [
        'Male'   => 'Male',
        'Female' => 'Female',
    ];

    const STATUS_SELECT = [
        'Inactive' => 'Inactive',
        'Active'   => 'Active',
    ];

    const TITLE_SELECT = [
        'Mr.'  => 'Mr.',
        'Mrs.' => 'Mrs.',
        'Miss' => 'Miss',
    ];

    const NATIONALITY_SELECT = [
        'Italian' => 'Italian',
        'English' => 'English',
        'Russian' => 'Russian',
    ];

    protected $dates = [
        'hired_date',
        'termination_date',
        'birth_date',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    const MARITAL_STATUS_SELECT = [
        'Single'    => 'Single',
        'Married'   => 'Married',
        'Separated' => 'Separated',
        'Divorced'  => 'Divorced',
    ];

    protected $fillable = [
        'resource_code',
        'first_name',
        'last_name',
        'hired_date',
        'termination_date',
        'status',
        'title',
        'gender',
        'birth_date',
        'birth_city',
        'birth_country_id',
        'nationality',
        'marital_status',
        'fiscal_code',
        'vat_number',
        'company_partner',
        'protected_categories',
        'disability_percentage',
        'ice_person',
        'ice_phone',
        'ice_email',
        'address_street',
        'address_city',
        'address_postalcode',
        'address_country_id',
        'address_state',
        'work_phone',
        'home_phone',
        'office_phone',
        'home_email',
        'work_email',
        'other_email',
        'suite_users',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }

    public function registerMediaConversions(Media $media = null)
    {
        $this->addMediaConversion('thumb')->width(50)->height(50);
    }

    public function resourceCodeHouseHolds()
    {
        return $this->hasMany(HouseHold::class, 'resource_code_id', 'id');
    }

    public function resourceCodeContracts()
    {
        return $this->hasMany(Contract::class, 'resource_code_id', 'id');
    }

    public function resourceCodeSalaries()
    {
        return $this->hasMany(Salary::class, 'resource_code_id', 'id');
    }

    public function resourceCodeBenefits()
    {
        return $this->hasMany(Benefit::class, 'resource_code_id', 'id');
    }

    public function getHiredDateAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('panel.date_format')) : null;
    }

    public function setHiredDateAttribute($value)
    {
        $this->attributes['hired_date'] = $value ? Carbon::createFromFormat(config('panel.date_format'), $value)->format('Y-m-d') : null;
    }

    public function getTerminationDateAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('panel.date_format')) : null;
    }

    public function setTerminationDateAttribute($value)
    {
        $this->attributes['termination_date'] = $value ? Carbon::createFromFormat(config('panel.date_format'), $value)->format('Y-m-d') : null;
    }

    public function getPhotoAttribute()
    {
        $file = $this->getMedia('photo')->last();

        if ($file) {
            $file->url       = $file->getUrl();
            $file->thumbnail = $file->getUrl('thumb');
        }

        return $file;
    }

    public function getBirthDateAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('panel.date_format')) : null;
    }

    public function setBirthDateAttribute($value)
    {
        $this->attributes['birth_date'] = $value ? Carbon::createFromFormat(config('panel.date_format'), $value)->format('Y-m-d') : null;
    }

    public function birth_country()
    {
        return $this->belongsTo(Country::class, 'birth_country_id');
    }

    public function address_country()
    {
        return $this->belongsTo(Country::class, 'address_country_id');
    }
}
