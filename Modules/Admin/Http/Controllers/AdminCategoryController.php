<?php

namespace Modules\Admin\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Modules\Admin\Entities\AdminCategory;
use Modules\Admin\Entities\RelationPostCategory;
use Modules\Admin\Http\Controllers\AdminLoginController;

class AdminCategoryController extends Controller {

    private $title = 'Category';
    private $sort_by = 'title';
    private $sort_order = 'asc';
    private $index_link = 'category.index';
    private $list_page = 'admin::category.list';
    private $create_form = 'admin::category.add';
    private $update_form = 'admin::category.edit';
    private $link = 'category';
    private $user_id;

    public function index()
    {

        $list = AdminCategory::orderBy($this->sort_by, $this->sort_order)->get();
        foreach($list as $item){
            $data=RelationPostCategory::where('category_id',$item->id)->first();
            if(!empty($data)){
                $item->can_delete = false;
            }else{
                $item->can_delete = true;
            }
        }
        // $list = AdminCategory::orderBy($this->sort_by, $this->sort_order)->paginate(PAGES);
        $result = array(
            'list'              => $list,
            'page_header'       => $this->title,
            'link'              => $this->link,
        );
        return view($this->list_page, $result);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return redirect(route($this->index_link));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
        ]);
        $crud = new AdminCategory;
        $crud->title = $request->title;
        $crud->sub_title = $request->sub_title;
        $crud->description = $request->description;
        $crud->status = $request->status;
        $crud->created_by = session('admin')['userid'];
        $crud->save();
        Session::flash('success_message', CREATED);
        return redirect(route($this->index_link));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $record = AdminCategory::findOrFail($id);
        $list = AdminCategory::orderBy($this->sort_by, $this->sort_order)->get();
        $result = array(
            'page_header'       => $this->title,
            'record'            => $record,
            'list'              => $list,
            'link'              => $this->link,
        );
        return view($this->update_form, $result);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'title'      => 'required',
            'slug'       => 'required',
        ]);
        $crud = AdminCategory::findOrFail($id);
        $crud->title = $request->title;
        $crud->description = $request->description;
        $crud->sub_title = $request->sub_title;
        $crud->slug = str_slug($request->slug);
        $crud->status = $request->status;
        $crud->created_by = session('admin')['userid'];
        $crud->save();
        Session::flash('success_message', UPDATED);
        return redirect(route($this->index_link));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $crud = AdminCategory::findOrFail($id);
        if ($crud) {
            $data=RelationPostCategory::where('category_id',$crud->id)->first();
             if(!empty($data))
            {
            Session::flash('success_message', 'Category is used, Unable to delete!');
            return back();
            }
        }
        $crud->delete();
        Session::flash('success_message', DELETED);
        return redirect(route($this->index_link));
    }
}