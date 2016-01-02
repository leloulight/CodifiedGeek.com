<?php

namespace Backoffice;

use Illuminate\Database\Eloquent\Model;

class Skill extends Model
{
    protected $fillable = [
        'skill_category_id','skilltitle','abbreviation','yearsexp'
    ];

    /**
     * this skill belongs to a skillcategory
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function SkillCategory() {
        return $this->belongsTo('Backoffice\SkillCategory');
    }
}
