<?php

namespace Modules\Admin\Entities;

use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;
use Illuminate\Database\Eloquent\Model;

class AdminStudyAbroad extends Model {
    
    protected $table = 'tbl_study_abroad';
    protected $guarded = ['id'];    

    use HasSlug;

    public function getSlugOptions() : SlugOptions{
        return SlugOptions::create()
                ->generateSlugsFrom('title')
                ->saveSlugsTo('slug')
                ->doNotGenerateSlugsOnUpdate();
    }

    public function country(){
        return $this->hasOne(AdminCountry::class, 'id', 'country_id');
    }
}
