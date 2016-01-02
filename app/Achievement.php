<?php

namespace Backoffice;

use Illuminate\Database\Eloquent\Model;

class Achievement extends Model
{
    protected $fillable = [
        'job_id','description','url',
    ];

    /**
     * A achievement belongs to a job
     * @return \Illuminate\Database\Eloquent\Relations\belongsTo
     */

    public function job() {
        return $this->belongsTo('Backoffice\Job');
    }
}
