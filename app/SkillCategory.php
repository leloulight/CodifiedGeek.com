<?php

namespace Backoffice;

use Illuminate\Database\Eloquent\Model;

class SkillCategory extends Model
{
    protected $fillable = [
        'title','description'
    ];

    /**
     * one skillcategory can have many skills
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function skills() {
        return $this->hasMany('Backoffice\Skill');
    }
}
