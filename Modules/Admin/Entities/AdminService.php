<?php

namespace Modules\Admin\Entities;

use Illuminate\Database\Eloquent\Model;

class AdminService extends Model {
	
    protected $table = 'tbl_service';
    protected $guarded = ['id'];    
}
