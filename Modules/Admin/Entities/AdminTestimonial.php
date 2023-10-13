<?php

namespace Modules\Admin\Entities;

use Illuminate\Database\Eloquent\Model;

class AdminTestimonial extends Model {
    
    protected $table = 'tbl_testimonial';
    protected $guarded = ['id'];    

    public function country(){
        return $this->hasOne(AdminCountry::class, 'id', 'country_id');
    }
}
