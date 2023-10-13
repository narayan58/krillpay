<?php

namespace Modules\Admin\Entities;

use Illuminate\Database\Eloquent\Model;

class AdminTeam extends Model {
    
    protected $table = 'tbl_teams';
    protected $guarded = ['id'];  
}
