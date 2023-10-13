<?php

namespace Modules\Admin\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Http\Controllers\Controller;
use Modules\Admin\Entities\AdminEvent;

class AdminEventController extends Controller
{

    private $title = 'Event';
    private $sort_by = 'created_at';
    private $sort_order = 'desc';
    private $index_link = 'event.index';
    private $list_page = 'admin::event.list';
    private $create_form = 'admin::event.add';
    private $update_form = 'admin::event.edit';
    private $link = 'event';  
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $list = AdminEvent::orderby($this->sort_by,$this->sort_order)->paginate(PAGES);
        $result=array(
            'list'          =>$list,
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
            'title'             => 'required',
            'description'       => 'required',
            'image'             => 'required',
            'is_event'          => 'required',
            'location'          => 'required',
        ]);

        $crud = new AdminEvent;
        $crud->title = $request->title;
        $crud->location = $request->location;
        $crud->facebook_link = $request->facebook_link;
        $crud->description = $request->description;
        $crud->is_event = $request->is_event;
        $crud->date = $request->date;
        $crud->time = $request->time;
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
        $pages = AdminEvent::findOrFail($id);
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
            'title'             => 'required',
            'description'       => 'required',
            'image'             => 'required',
            'is_event'          => 'required',
            'location'          => 'required',
        ]);

        $crud = AdminEvent::findOrFail($id);
        $crud->title = $request->title;
        $crud->location = $request->location;
        $crud->facebook_link = $request->facebook_link;
        $crud->description = $request->description;
        $crud->is_event = $request->is_event;
        $crud->date = $request->date;
        $crud->time = $request->time;
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
        $crud = AdminEvent::findOrFail($id);
        $crud->delete();
        Session::flash('success_message', DELETED);
        return redirect(route($this->index_link));
    }
}
