<?php

namespace Modules\Admin\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use Modules\Admin\Entities\AdminCountry;
use Modules\Admin\Entities\AdminTestimonial;

class AdminTestimonialController extends Controller
{

    private $title = 'Testimonial';
    private $sort_by = 'created_at';
    private $sort_order = 'desc';
    private $index_link = 'testimonial.index';
    private $list_page = 'admin::testimonial.list';
    private $create_form = 'admin::testimonial.add';
    private $update_form = 'admin::testimonial.edit';
    private $link = 'testimonial';  
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $list = AdminTestimonial::orderBy($this->sort_by, $this->sort_order)
                ->paginate(PAGES);
        $result=array(
            'list'          => $list,
            'page_header'   =>'List of '.$this->title,
            'link'          => $this->link,
        );
        return view($this->list_page,$result);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(){
        $result = array(
            'page_header'       => 'Create '.$this->title.' Detail',
            'link'              => $this->link,
        );
        return view($this->create_form, $result);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request){
        $this->validate($request, [
            'name'              => 'required',
            'designation'             => 'required',
            'image'             => 'required',
        ]);

        $crud = new AdminTestimonial;
        $crud->name = $request->name;
        $crud->designation = $request->designation;
        $crud->description = $request->description;
        $crud->image = chunkfullurl($request->image);
        $crud->status = $request->status;
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
    public function edit($id){
        $pages = AdminTestimonial::findOrFail($id);
        $result = array(
            'page_header'       => 'Edit '.$this->title.' Detail',
            'record'            => $pages,
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
    public function update(Request $request, $id){
        $this->validate($request, [
            'name'              => 'required',
            'image'             => 'required',
        ]);

        $crud = AdminTestimonial::findOrFail($id);
        $crud->name = $request->name;
        $crud->designation = $request->designation;
        $crud->description = $request->description;
        $crud->image = chunkfullurl($request->image);
        $crud->status = $request->status;
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
    public function destroy($id){
        $crud = AdminTestimonial::findOrFail($id);
        $crud->delete();
        Session::flash('success_message', DELETED);
        return redirect(route($this->index_link));
    }
}
