<?php

namespace Modules\Admin\Entities;

use Illuminate\Database\Eloquent\Model;

class AdminGroup extends Model {
	
    protected $table = 'tbl_admin_groups';
    protected $guarded = ['id'];

    public function adminuser(){
        return $this->hasOne(AdminUser::class,'user_group_id');
    }
}
