<?php

namespace Modules\Admin\Http\Controllers;

use Illuminate\Http\Request;
use Modules\Admin\Http\Controllers\AdminController;

class AdminMenuController extends AdminController {
    
    public function index(){
    	return view('admin::menu.index');
    }

}
