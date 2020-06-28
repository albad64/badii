<?php

namespace App;

use App\Traits\Auditable;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;
use Spatie\MediaLibrary\Models\Media;
use \DateTimeInterface;

class Benefit extends Model implements HasMedia
{
    use SoftDeletes, HasMediaTrait, Auditable;

    public $table = 'benefits';

    const BENEFIT_TYPE_SELECT = [
        'Car'         => 'Car',
        'Company Car' => 'Company Car',
    ];

    const BENEFIT_EXTRA_TYPE_SELECT = [
        'Benefit' => 'Benefit',
        'Extra'   => 'Extra',
    ];

    protected $dates = [
        'assigned_date',
        'expired_date',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'resource_code_id',
        'benefit_extra_type',
        'benefit_type',
        'assigned_date',
        'expired_date',
        'currency_id',
        'total_cost',
        'optional_value',
        'fringe_benefit',
        'notes',
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

    public function resource_code()
    {
        return $this->belongsTo(Resource::class, 'resource_code_id');
    }

    public function getAssignedDateAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('panel.date_format')) : null;
    }

    public function setAssignedDateAttribute($value)
    {
        $this->attributes['assigned_date'] = $value ? Carbon::createFromFormat(config('panel.date_format'), $value)->format('Y-m-d') : null;
    }

    public function getExpiredDateAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('panel.date_format')) : null;
    }

    public function setExpiredDateAttribute($value)
    {
        $this->attributes['expired_date'] = $value ? Carbon::createFromFormat(config('panel.date_format'), $value)->format('Y-m-d') : null;
    }

    public function currency()
    {
        return $this->belongsTo(Currency::class, 'currency_id');
    }
}
