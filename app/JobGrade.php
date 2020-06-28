<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use \DateTimeInterface;

class JobGrade extends Model
{
    public $table = 'job_grades';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'job_grade_name',
        'organizational_area',
        'job_grade',
        'job_level',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    const ORGANIZATIONAL_AREA_RADIO = [
        'Operations'        => 'Operations',
        'Sales & Marketing' => 'Sales & Marketing',
        'Staff'             => 'Staff',
    ];

    const JOB_LEVEL_SELECT = [
        'Company Mngt - Associate Manager' => 'Company Mngt - Associate Manager',
        'External Mngt - Entry'            => 'External Mngt - Entry',
    ];

    const JOB_GRADE_SELECT = [
        '1'  => '1',
        '2'  => '2',
        '3'  => '3',
        '4'  => '4',
        '5'  => '5',
        '6'  => '6',
        '7'  => '7',
        '8'  => '8',
        '9'  => '9',
        '10' => '10',
        '11' => '11',
        '12' => '12',
    ];

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}
