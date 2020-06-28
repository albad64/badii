<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use \DateTimeInterface;

class Company extends Model
{
    use SoftDeletes;

    public $table = 'companies';

    public static $searchable = [
        'company',
    ];

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'company',
        'company_name',
        'currency_id',
        'invoice_prefix',
        'project_prefix',
        'legal_working_hours',
        'monthly_instalments',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }

    public function companyCompaniesBankHolidays()
    {
        return $this->hasMany(CompaniesBankHoliday::class, 'company_id', 'id');
    }

    public function currency()
    {
        return $this->belongsTo(Currency::class, 'currency_id');
    }

    public function countries()
    {
        return $this->belongsToMany(Country::class);
    }
}