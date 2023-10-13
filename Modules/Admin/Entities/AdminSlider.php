<?php

namespace Modules\Admin\Entities;

use Illuminate\Database\Eloquent\Model;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;

class AdminSlider extends Model {
    
    protected $table = 'tbl_slider';
    protected $guarded = ['id'];

    
    use HasSlug;

    public function getSlugOptions() : SlugOptions{
        return SlugOptions::create()
                ->generateSlugsFrom('title')
                ->saveSlugsTo('slug')
                ->doNotGenerateSlugsOnUpdate();
    }

}
