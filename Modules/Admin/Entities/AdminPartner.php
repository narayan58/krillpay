<?php

namespace Modules\Admin\Entities;

use Illuminate\Database\Eloquent\Model;

class AdminPartner extends Model {
	
    protected $table = 'tbl_partner';
    protected $guarded = ['id'];    
}
