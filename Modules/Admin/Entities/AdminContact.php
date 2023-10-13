<?php

namespace Modules\Admin\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class AdminContact extends Model {

    protected $table = 'tbl_feedback';
    protected $guarded = ['id'];
}
