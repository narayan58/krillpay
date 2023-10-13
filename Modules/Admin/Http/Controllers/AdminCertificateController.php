<?php

namespace Modules\Admin\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Modules\Admin\Entities\AdminCertificate;

class AdminCertificateController extends Controller {

    private $title = 'Certificate';
    private $sort_by = 'created_at';
    private $sort_order = 'desc';
    private $index_link = 'certificate.index';
    private $list_page = 'admin::certificate.list';
    private $create_form = 'admin::certificate.add';
    private $update_form = 'admin::certificate.edit';
    private $link = 'certificate';

    public function index()
    {

        $list = AdminCertificate::orderBy($this->sort_by, $this->sort_order)->get();
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
            'image' => 'required',
        ]);
        $crud = new AdminCertificate;
        $crud->title = $request->title;
        $crud->certificate_type = $request->certificate_type;
        $crud->image = chunkfullurl($request->image);
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
        $record = AdminCertificate::findOrFail($id);
        $list = AdminCertificate::orderBy($this->sort_by, $this->sort_order)->get();
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
            'image'       => 'required',
        ]);
        $crud = AdminCertificate::findOrFail($id);
        $crud->title = $request->title;
        $crud->certificate_type = $request->certificate_type;
        $crud->image = chunkfullurl($request->image);
        $crud->status = $request->status;
        $crud->updated_by = session('admin')['userid'];
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
        $crud = AdminCertificate::findOrFail($id);
        $crud->delete();
        Session::flash('success_message', DELETED);
        return redirect(route($this->index_link));
    }
}