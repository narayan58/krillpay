<?php

namespace Modules\Admin\Entities;

use Illuminate\Database\Eloquent\Model;

class AdminValue extends Model {
	
    protected $table = 'tbl_value';
    protected $guarded = ['id'];    
}
