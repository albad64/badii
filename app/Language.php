<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use \DateTimeInterface;

class Language extends Model
{
    use SoftDeletes;

    public $table = 'languages';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'resource_code_id',
        'language_name',
        'fluency_level',
        'certificate_level',
        'year_level',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    const LANGUAGE_NAME_SELECT = [
        'English' => 'English',
        'French'  => 'French',
        'Italian' => 'Italian',
        'Spanish' => 'Spanish',
        'Russian' => 'Russian',
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
