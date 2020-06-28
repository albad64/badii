<?php

namespace App;

use App\Traits\Auditable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use \DateTimeInterface;

class Holiday extends Model
{
    use SoftDeletes, Auditable;

    public $table = 'holidays';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    const STATUS_RADIO = [
        'Expected' => 'Expected',
        'Updating' => 'Updating',
        'Checked'  => 'Checked',
    ];

    const HOLIDAYS_TYPE_SELECT = [
        'Ferie'            => 'Ferie',
        'Riduzioni Orario' => 'Riduzioni Orario',
        'Ex-Festività'     => 'Ex-Festività',
    ];

    protected $fillable = [
        'resource_code_id',
        'holidays_type',
        'holiday_year',
        'holiday_month',
        'holiday_residual',
        'holiday_actual',
        'holiday_enjoyed',
        'status',
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
}
