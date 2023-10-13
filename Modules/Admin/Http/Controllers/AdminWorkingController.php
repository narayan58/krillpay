<?php

namespace Modules\Admin\Http\Controllers;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use Modules\Admin\Entities\AdminWorking;

class AdminWorkingController extends Controller
{

    private $title = 'How We Work';
    private $sort_by = 'created_at';
    private $sort_order = 'desc';
    private $index_link = 'working.index';
    private $list_page = 'admin::working.list';
    private $create_form = 'admin::working.add';
    private $update_form = 'admin::working.edit';
    private $link = 'working';

    public function index(Request $request)
    {
        if (!empty($_GET)) {
            $title = $request->input('title');
            $query = AdminWorking::query();
            if ($title != '') {
                $query->where('title', 'like', '%' . $title . '%');
            }
            $list = $query->orderBy($this->sort_by, $this->sort_order)
                ->paginate(PAGES);
        } else {
            $list = AdminWorking::orderBy($this->sort_by, $this->sort_order)
                ->paginate(PAGES);
        }
        $result = array(
            'list'              => $list,
            'page_header'       => 'List of ' . $this->title,
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
        $result = array(
            'page_header'       => 'Add ' . $this->title . ' Detail',
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
    public function store(Request $request)
    {
        $this->validate($request, [
            'title'              => 'required',
            'description'        => 'required',
            'image'         => 'required',
        ]);

        $crud = new AdminWorking;
        $crud->title = $request->title;
        $crud->description = $request->description;
        $crud->image = chunkfullurl($request->image);
        $crud->created_by = session('admin')['userid'];
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
        $record = AdminWorking::where('id', $id)->first();
        $result = array(
            'page_header'       => 'Edit ' . $this->title . ' Detail',
            'record'            => $record,
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
            'title'              => 'required',
            'description'        => 'required',
            'image'         => 'required',
        ]);

        $crud = AdminWorking::findOrFail($id);
        $crud->title = $request->title;
        $crud->description = $request->description;
        $crud->image = chunkfullurl($request->image);
        $crud->updated_by = session('admin')['userid'];
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
        $crud = AdminWorking::findOrFail($id);
        $crud->delete();
        Session::flash('success_message', DELETED);
        return redirect(route($this->index_link));
    }
}
