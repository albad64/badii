<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use \DateTimeInterface;

class HouseHold extends Model
{
    use SoftDeletes;

    public $table = 'house_holds';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'resource_code_id',
        'prog',
        'relationship_type',
        'relative_first_name',
        'relative_last_name',
        'percentage_charged',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    const RELATIONSHIP_TYPE_SELECT = [
        'Coniuge'  => 'Coniuge',
        'Figlio'   => 'Figlio/a',
        'Fratello' => 'Fratello',
        'Sorella'  => 'Sorella',
        'Padre'    => 'Padre',
        'Madre'    => 'Madre',
        'Other'    => 'Other',
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
