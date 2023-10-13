<?php

namespace Modules\Admin\Entities;

use Illuminate\Database\Eloquent\Model;

class AdminScholarshipOffer extends Model {
    
    protected $table = 'tbl_scholarship_offers';
    protected $guarded = ['id'];    

    public function country(){
        return $this->hasOne(AdminCountry::class, 'id', 'country_id');
    }
}
