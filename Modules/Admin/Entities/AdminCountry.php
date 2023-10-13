<?php

namespace Modules\Admin\Entities;

use Illuminate\Database\Eloquent\Model;

class AdminCountry extends Model {
    
    protected $table = 'tbl_country';
    protected $guarded = ['id'];    

    public function universities(){
        return $this->hasMany(AdminUniversity::class, 'country_id', 'id');
    }

    public function faqs(){
        return $this->hasMany(AdminFaq::class, 'country_id', 'id')->where('status', 1);
    }

    public function scholarshipOffers(){
        return $this->hasMany(AdminScholarshipOffer::class, 'country_id', 'id')->where('status', 1);
    }
}
