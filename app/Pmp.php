<?php

namespace App;

use App\Traits\Auditable;
use App\Traits\MultiTenantModelTrait;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use \DateTimeInterface;

class Pmp extends Model
{
    use SoftDeletes, MultiTenantModelTrait, Auditable;

    public $table = 'pmps';

    protected $dates = [
        'objective_mid_review_date',
        'objective_end_eval_date',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'resource_code_id',
        'pmp_year',
        'current_grade_id',
        'expected_grade_id',
        'objective_value',
        'objective_mid_review_date',
        'objective_end_eval_date',
        'overall_mid_year_evaluation',
        'overall_end_year_evaluation',
        'created_at',
        'updated_at',
        'deleted_at',
        'team_id',
    ];

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }

    public function pmpPmpDetails()
    {
        return $this->hasMany(PmpDetail::class, 'pmp_id', 'id');
    }

    public function resource_code()
    {
        return $this->belongsTo(Resource::class, 'resource_code_id');
    }

    public function current_grade()
    {
        return $this->belongsTo(JobGrade::class, 'current_grade_id');
    }

    public function expected_grade()
    {
        return $this->belongsTo(JobGrade::class, 'expected_grade_id');
    }

    public function getObjectiveMidReviewDateAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('panel.date_format')) : null;
    }

    public function setObjectiveMidReviewDateAttribute($value)
    {
        $this->attributes['objective_mid_review_date'] = $value ? Carbon::createFromFormat(config('panel.date_format'), $value)->format('Y-m-d') : null;
    }

    public function getObjectiveEndEvalDateAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('panel.date_format')) : null;
    }

    public function setObjectiveEndEvalDateAttribute($value)
    {
        $this->attributes['objective_end_eval_date'] = $value ? Carbon::createFromFormat(config('panel.date_format'), $value)->format('Y-m-d') : null;
    }

    public function team()
    {
        return $this->belongsTo(Team::class, 'team_id');
    }
}
