<?php

namespace Modules\Admin\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Modules\Admin\Entities\AdminFailLoginLogs;
use Modules\Admin\Entities\AdminSetting;
use Modules\Admin\Entities\AdminSuccessLoginLogs;
use Modules\Admin\Http\Controllers\AdminController;
use Modules\Admin\Http\Controllers\AdminLoginController;

class AdminSiteSettingController extends AdminController {
    
    public function successLogin(){
        $user_id = AdminLoginController::id();
    	$loginlist = AdminSuccessLoginLogs::getSuccessLoginList($user_id);
    	$result = array(
    		'page_header' 		=> 'Login Logs', 
    		'list' 				=> $loginlist, 
    	);
        return view('admin::logs.successlogin', $result);
    }

    public function failLogin(){
    	$failLogins = AdminFailLoginLogs::orderBy('created_at','desc')->paginate(20);
    	$result = array(
    		'page_header' 		=> 'Fail Login Logs', 
    		'list' 				=> $failLogins, 
    	);
        return view('admin::logs.faillogin', $result);
    }

    function setting(){
        $settingdata = AdminSetting::find(1);
        $result = array(
            'page_header'       => 'Site Setting Management',
            'settingdata'       => $settingdata,
        );
        return view('admin::setting', $result);
    }

    function updateSetting(Request $request){
        $inputs = $request->all();
        $user_id = AdminLoginController::id();
        $data = AdminSetting::findOrFail(1);
        $inputs['updated_by'] = $user_id;
        $data->fill($inputs);
        $data->save();
        Session::flash('success_message', "Successfully Updated !!!");
        return redirect(route('setting'));
    }
}
