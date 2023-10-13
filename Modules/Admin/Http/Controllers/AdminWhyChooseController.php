<?php

namespace Modules\Admin\Http\Controllers;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use Modules\Admin\Entities\AdminWhyChoose;

class AdminWhyChooseController extends Controller
{

    private $title = 'Why Choose NHP';
    private $sort_by = 'created_at';
    private $sort_order = 'desc';
    private $index_link = 'why-choose.index';
    private $list_page = 'admin::why-choose.list';
    private $create_form = 'admin::why-choose.add';
    private $update_form = 'admin::why-choose.edit';
    private $link = 'why-choose';

    public function index(Request $request)
    {
        if (!empty($_GET)) {
            $title = $request->input('title');
            $query = AdminWhyChoose::query();
            if ($title != '') {
                $query->where('title', 'like', '%' . $title . '%');
            }
            $list = $query->orderBy($this->sort_by, $this->sort_order)
                ->paginate(PAGES);
        } else {
            $list = AdminWhyChoose::orderBy($this->sort_by, $this->sort_order)
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
            'icon'         => 'required',
        ]);

        $crud = new AdminWhyChoose;
        $crud->title = $request->title;
        $crud->description = $request->description;
        $crud->icon = $request->icon;
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
        $record = AdminWhyChoose::where('id', $id)->first();
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
            'icon'         => 'required',
        ]);

        $crud = AdminWhyChoose::findOrFail($id);
        $crud->title = $request->title;
        $crud->description = $request->description;
        $crud->icon = $request->icon;
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
        $crud = AdminWhyChoose::findOrFail($id);
        $crud->delete();
        Session::flash('success_message', DELETED);
        return redirect(route($this->index_link));
    }
}
