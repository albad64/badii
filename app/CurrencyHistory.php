<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use \DateTimeInterface;

class CurrencyHistory extends Model
{
    public $table = 'currency_histories';

    public static $searchable = [
        'date_validity',
        'conversion_rate',
    ];

    protected $dates = [
        'date_validity',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'currency_id',
        'date_validity',
        'conversion_rate',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }

    public function currency()
    {
        return $this->belongsTo(Currency::class, 'currency_id');
    }

    public function getDateValidityAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('panel.date_format')) : null;
    }

    public function setDateValidityAttribute($value)
    {
        $this->attributes['date_validity'] = $value ? Carbon::createFromFormat(config('panel.date_format'), $value)->format('Y-m-d') : null;
    }
}
