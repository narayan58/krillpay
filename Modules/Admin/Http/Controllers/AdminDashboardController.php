<?php

namespace Modules\Admin\Http\Controllers;

use Illuminate\Http\Request;
use Modules\Admin\Http\Controllers\AdminController;

class AdminDashboardController extends AdminController {

    public function dashboard(){
        $result = array(
            'page_header' => 'Dashboard'
        );
        return view('admin::home',$result);
    }

    public function mediaLibrary(){
    	$result = array(
            'page_header' => 'Media Library'
        );
        return view('admin::medialibrary', $result);
    }

}