<?php

namespace Modules\Admin\Entities;

use Illuminate\Database\Eloquent\Model;

class AdminEvent extends Model {
    
    protected $table = 'tbl_events';
    protected $guarded = ['id'];    

}
