<?php

namespace Modules\Admin\Entities;

use Illuminate\Database\Eloquent\Model;

class AdminFailLoginLogs extends Model {
	
    protected $table = 'tbl_login_fail_logs';
    protected $guarded = ['id'];
}
