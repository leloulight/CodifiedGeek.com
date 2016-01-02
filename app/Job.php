<?php

namespace Backoffice;

use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    protected $fillable = [
        'company','jobtitle','currentlyemployed','startdate','enddate','jobdescription','city','state'
    ];

    /**
     * A user owns an article
     * @return \Illuminate\Database\Eloquent\Relations\belongsTo
     */

    public function user() {
        return $this->belongsTo('Backoffice\User');
    }

    /**
     * One Job has many achievements
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function achievements() {
        return $this->hasMany('Backoffice\Achievement');
    }
}
