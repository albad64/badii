<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;
use Spatie\MediaLibrary\Models\Media;
use \DateTimeInterface;

class PmpDetail extends Model implements HasMedia
{
    use SoftDeletes, HasMediaTrait;

    public $table = 'pmp_details';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'pmp_id',
        'number_detail',
        'sub_objective_detail',
        'weight',
        'kpi_description',
        'target',
        'notes',
        'mid_year_evaluation',
        'mid_year_weight',
        'mid_year_notes',
        'end_year_evaluation',
        'end_year_weight',
        'end_year_notes',
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

    public function pmp()
    {
        return $this->belongsTo(Pmp::class, 'pmp_id');
    }
}
