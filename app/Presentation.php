<?php

namespace App;

use App\Traits\Auditable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use \DateTimeInterface;

class Presentation extends Model
{
    use SoftDeletes, Auditable;

    public $table = 'presentations';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'resource_code_id',
        'order_number',
        'event_host',
        'event_name',
        'event_location',
        'event_year',
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
