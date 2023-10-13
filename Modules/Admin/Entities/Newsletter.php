<?php

namespace Modules\Admin\Entities;

use Illuminate\Database\Eloquent\Model;

class Newsletter extends Model {

    protected $table = 'tbl_newsletter_list';
    protected $guarded = ['id'];    

}
