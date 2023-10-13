<?php

namespace Modules\Admin\Http\Controllers;
use Illuminate\Http\Request;
use Modules\Admin\Entities\AdminPosts;
use Modules\Admin\Http\Controllers\AdminController;
use PrintHelper;

class AdminAjaxController extends AdminController {

    public function postDragDropSorting() {
        PrintHelper::dragDropSorting();
    }

    public function postUpdateField() {
        PrintHelper::updateField();
    }

    // public function moduleUrl(Request $request){
    //  if (!empty($request->all())) {
    //      $module = $request->module;
    //      $data = array();
    //      $status = 'success';
    //      if($module=='pages'){
    //          $data = AdminPosts::moduleUrl('tbl_pages');
    //      }elseif ($module=='category') {
    //          $data = AdminPosts::moduleUrl('tbl_category');
    //      }elseif ($module=='posts') {
    //          $data = AdminPosts::moduleUrl('tbl_posts');
    //      }else{
    //          $status = 'error';
    //      }
    //      return response()->json(['status'=> $status,'list' => json_encode($data)]);
    //  }else{
    //      return response()->json(['status'=> 'error','list' => 'try again later']);
    //  }
    // }

//    public function postDeleteData() {
//        PrintHelper::deleteData();
//    }
//
//    public function postDeleteImage() {
//        PrintHelper::deleteImage();
//    }

}
