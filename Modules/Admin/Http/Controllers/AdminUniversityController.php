<?php

namespace Modules\Admin\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Http\Controllers\Controller;
use Modules\Admin\Entities\AdminCountry;
use Modules\Admin\Entities\AdminUniversity;

class AdminUniversityController extends Controller
{

    private $title = 'University';
    private $sort_by = 'created_at';
    private $sort_order = 'desc';
    private $index_link = 'university.index';
    private $list_page = 'admin::university.list';
    private $create_form = 'admin::university.add';
    private $update_form = 'admin::university.edit';
    private $link = 'university';  
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if (!empty($_GET)) {
            $title = $request->input('title');
            $query = AdminUniversity::query();
            if ($title != '') {
                $query->where('title', 'like', '%' . $title . '%');
            }
            $list = $query->orderBy($this->sort_by, $this->sort_order)
                ->paginate(PAGES);
        } else {
            $list = AdminUniversity::orderby($this->sort_by,$this->sort_order)->paginate(PAGES);
        }
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
        $countries = AdminCountry::where('status', 1)->get();
        $result = array(
            'page_header'       => 'Create '.$this->title.' Detail',
            'link'              => $this->link,
            'countries'         => $countries
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
            'logo'             => 'required',
            'location'          => 'required',
            'country_id'        => 'required',
        ]);

        $crud = new AdminUniversity;
        $crud->title = $request->title;
        $crud->country_id = $request->country_id;
        $crud->location = $request->location;
        $crud->description = $request->description;
        $crud->facts_and_figure = $request->facts_and_figure;
        $crud->finance_and_intake = $request->finance_and_intake;
        $crud->facebook_link = $request->facebook_link;
        $crud->website_link = $request->website_link;
        $crud->twitter_link = $request->twitter_link;
        $crud->youtube_link = $request->youtube_link;
        $crud->video_url = $request->video_url;
        $crud->image = chunkfullurl($request->image);
        $crud->logo = chunkfullurl($request->logo);
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
        $countries = AdminCountry::where('status', 1)->get();
        $record = AdminUniversity::findOrFail($id);
        $result = array(
            'page_header'       => 'Edit '.$this->title.' Detail',
            'record'            => $record,
            'link'              => $this->link,
            'countries'         => $countries
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
            'logo'              => 'required',
            'location'          => 'required',
            'country_id'        => 'required',
        ]);

        $crud = AdminUniversity::findOrFail($id);
        $crud->title = $request->title;
        $crud->country_id = $request->country_id;
        $crud->location = $request->location;
        $crud->description = $request->description;
        $crud->facts_and_figure = $request->facts_and_figure;
        $crud->finance_and_intake = $request->finance_and_intake;
        $crud->facebook_link = $request->facebook_link;
        $crud->website_link = $request->website_link;
        $crud->twitter_link = $request->twitter_link;
        $crud->youtube_link = $request->youtube_link;
        $crud->video_url = $request->video_url;
        $crud->image = chunkfullurl($request->image);
        $crud->logo = chunkfullurl($request->logo);
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
        $crud = AdminUniversity::findOrFail($id);
        $crud->delete();
        Session::flash('success_message', DELETED);
        return redirect(route($this->index_link));
    }
}
