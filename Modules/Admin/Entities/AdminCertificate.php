<?php

namespace Modules\Admin\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class AdminCertificate extends Model {

    protected $table = 'tbl_certificates';
    protected $guarded = ['id'];
}
