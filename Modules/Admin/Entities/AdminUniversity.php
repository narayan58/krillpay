<?php

namespace Modules\Admin\Entities;

use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;
use Illuminate\Database\Eloquent\Model;

class AdminUniversity extends Model {
    
    protected $table = 'tbl_universities';
    protected $guarded = ['id'];    

    use HasSlug;

    public function getSlugOptions() : SlugOptions{
        return SlugOptions::create()
                ->generateSlugsFrom('title')
                ->saveSlugsTo('slug');
    }

}
