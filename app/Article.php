<?php

namespace Backoffice;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    //
    protected $fillable = [
        'title','body','user_id','image','thumbimage'
    ];

    /**
     * A user owns an article
     * @return \Illuminate\Database\Eloquent\Relations\belongsTo
     */

    public function user() {
        return $this->belongsTo('Backoffice\User');
    }
}
