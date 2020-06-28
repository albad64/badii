<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use \DateTimeInterface;

class Country extends Model
{
    use SoftDeletes;

    public $table = 'countries';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'name',
        'short_code',
        'region',
        'country_kpi',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }

    public function countryCurrencies()
    {
        return $this->hasMany(Currency::class, 'country_id', 'id');
    }

    public function countryCompanies()
    {
        return $this->belongsToMany(Company::class);
    }
}
