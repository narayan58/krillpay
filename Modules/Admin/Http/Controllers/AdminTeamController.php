<?php

namespace Modules\Admin\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Modules\Admin\Entities\AdminTeam;
use Modules\Admin\Http\Controllers\AdminLoginController;

class AdminTeamController extends Controller {

    private $title = 'Team';
    private $sort_by = 'name';
    private $sort_order = 'asc';
    private $index_link = 'team.index';
    private $list_page = 'admin::team.list';
    private $create_form = 'admin::team.add';
    private $update_form = 'admin::team.edit';
    private $link = 'team';
    private $user_id;


    public function index()
    {

        $list = AdminTeam::orderBy($this->sort_by, $this->sort_order)->get();
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
            'name' => 'required',
            'designation' => 'required',
            'image' => 'required',
        ]);
        $crud = new AdminTeam;
        $crud->name = $request->name;
        $crud->designation = $request->designation;
         $crud->linkedin_link = $request->linkedin_link;
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
    public function edit($id)
    {
        $record = AdminTeam::findOrFail($id);
        $list = AdminTeam::orderBy($this->sort_by, $this->sort_order)->get();
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
            'name'      => 'required',
            'designation'      => 'required',
            'image'      => 'required',
        ]);
        $crud = AdminTeam::findOrFail($id);
        $crud->name = $request->name;
        $crud->designation = $request->designation;
        $crud->linkedin_link = $request->linkedin_link;
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
    public function destroy($id)
    {
        $crud = AdminTeam::findOrFail($id);
        $crud->delete();
        Session::flash('success_message', DELETED);
        return redirect(route($this->index_link));
    }
}