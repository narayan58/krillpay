<?php

namespace Modules\Admin\Entities;

use Illuminate\Database\Eloquent\Model;

class AdminFaq extends Model {
    
    protected $table = 'tbl_faq';
    protected $guarded = ['id'];    

    public function country(){
        return $this->hasOne(AdminCountry::class, 'id', 'country_id');
    }
}
