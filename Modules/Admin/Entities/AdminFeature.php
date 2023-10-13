<?php

namespace Modules\Admin\Entities;

use Illuminate\Database\Eloquent\Model;

class AdminFeature extends Model {
	
    protected $table = 'tbl_features';
    protected $guarded = ['id'];    
}
