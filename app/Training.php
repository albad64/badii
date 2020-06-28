<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use \DateTimeInterface;

class Training extends Model
{
    use SoftDeletes;

    public $table = 'trainings';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'resource_code_id',
        'order_number',
        'training_supplier',
        'training_location',
        'training_description',
        'training_year',
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
