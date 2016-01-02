<?php

namespace Backoffice;

use Illuminate\Database\Eloquent\Model;

class Education extends Model
{
    protected $table = 'educations';
    protected $fillable = [
        'schoolname','startyear','graduationyear','degree','currentlyenrolled', 'state','city'
    ];
}
