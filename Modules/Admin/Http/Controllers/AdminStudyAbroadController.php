<?php

namespace Modules\Admin\Http\Controllers;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use Modules\Admin\Entities\AdminCountry;
use Modules\Admin\Entities\AdminStudyAbroad;

class AdminStudyAbroadController extends Controller
{

    private $title = 'Study Abroad';
    private $sort_by = 'created_at';
    private $sort_order = 'desc';
    private $index_link = 'study-abroad.index';
    private $list_page = 'admin::study-abroad.list';
    private $create_form = 'admin::study-abroad.add';
    private $update_form = 'admin::study-abroad.edit';
    private $link = 'study-abroad';

    public function index(Request $request)
    {
        $countrylist = AdminCountry::orderBy($this->sort_by, $this->sort_order)->get();
        if (!empty($_GET)) {
            $title = $request->input('title');
            $country = $request->input('country');
            $query = AdminStudyAbroad::with('country');
            if ($title != '') {
                $query->where('title', 'like', '%' . $title . '%');
            }
            if ($country != '') {
                $query->where('country_id', $country);
            }
            $list = $query->orderBy($this->sort_by, $this->sort_order)
                ->paginate(PAGES);
        } else {
            $list = AdminStudyAbroad::orderBy($this->sort_by, $this->sort_order)
                ->paginate(PAGES);
        }
        $result = array(
            'countrylist'      => $countrylist,
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
        $countrylist = AdminCountry::orderBy('title', 'asc')->where('status', 1)->get();
        $result = array(
            'countrylist'      => $countrylist,
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
            'sub_title'          => 'required',
            'description'        => 'required',
            'country_id'         => 'required',
            'image'         => 'required',
        ]);

        $crud = new AdminStudyAbroad;
        $crud->title = $request->title;
        $crud->heading_title = $request->heading_title;
        $crud->sub_title = $request->sub_title;
        $crud->description = $request->description;
        $crud->req_document_desc = $request->req_document_desc;
        $crud->application_procedure_desc = $request->application_procedure_desc;
        $crud->visa_procedure_fee_desc = $request->visa_procedure_fee_desc;
        $crud->country_id = $request->country_id;
        $crud->image = chunkfullurl($request->image);
        $crud->banner_image = chunkfullurl($request->banner_image);
        $crud->meta_title = $request->meta_title;
        $crud->meta_keywords = $request->meta_keywords;
        $crud->meta_description = $request->meta_description;
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
        $countrylist = AdminCountry::orderBy('title', 'asc')->where('status', 1)->get();
        $record = AdminStudyAbroad::with('country')->where('id', $id)->first();
        $result = array(
            'page_header'       => 'Edit ' . $this->title . ' Detail',
            'record'            => $record,
            'countrylist'       => $countrylist,
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
            'slug'              => 'required',
            'title'              => 'required',
            'sub_title'          => 'required',
            'description'        => 'required',
            'country_id'         => 'required',
            'image'         => 'required',
        ]);

        $crud = AdminStudyAbroad::findOrFail($id);
        $crud->title = $request->title;
        $crud->slug = Str::slug($request->slug);
        $crud->heading_title = $request->heading_title;
        $crud->sub_title = $request->sub_title;
        $crud->description = $request->description;
        $crud->req_document_desc = $request->req_document_desc;
        $crud->application_procedure_desc = $request->application_procedure_desc;
        $crud->visa_procedure_fee_desc = $request->visa_procedure_fee_desc;
        $crud->country_id = $request->country_id;
        $crud->image = chunkfullurl($request->image);
        $crud->banner_image = chunkfullurl($request->banner_image);
        $crud->meta_title = $request->meta_title;
        $crud->meta_keywords = $request->meta_keywords;
        $crud->meta_description = $request->meta_description;
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
        $crud = AdminStudyAbroad::findOrFail($id);
        $crud->delete();
        Session::flash('success_message', DELETED);
        return redirect(route($this->index_link));
    }
}
