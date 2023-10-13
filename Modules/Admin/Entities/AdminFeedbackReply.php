<?php

namespace Modules\Admin\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class AdminFeedbackReply extends Model {

    protected $table = 'tbl_feedback_reply';
    protected $guarded = ['id'];
}
