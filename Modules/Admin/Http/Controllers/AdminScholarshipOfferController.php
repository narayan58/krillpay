<?php

namespace Modules\Admin\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use Modules\Admin\Entities\AdminCountry;
use Modules\Admin\Entities\AdminScholarshipOffer;

class AdminScholarshipOfferController extends Controller
{

    private $title = 'Scholarship Offer';
    private $sort_by = 'created_at';
    private $sort_order = 'desc';
    private $index_link = 'scholarship-offer.index';
    private $list_page = 'admin::scholarship-offer.list';
    private $create_form = 'admin::scholarship-offer.add';
    private $update_form = 'admin::scholarship-offer.edit';
    private $link = 'scholarship-offer';  
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $countrylist = AdminCountry::orderBy($this->sort_by, $this->sort_order)->get();
        if (!empty($_GET)) {
            $title = $request->input('title');
            $country = $request->input('country');
            $query = AdminScholarshipOffer::with('country');
            if ($title != '') {
                $query->where('title', 'like', '%' . $title . '%');
            }
            if ($country != '') {
                $query->where('country_id', $country);
            }
            $list = $query->orderBy($this->sort_by, $this->sort_order)
                ->paginate(PAGES);
        } else {
            $list = AdminScholarshipOffer::orderBy($this->sort_by, $this->sort_order)
                ->paginate(PAGES);
        }
        $result=array(
            'list'          => $list,
            'countrylist'   => $countrylist,
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
        $countrylist = AdminCountry::orderBy('title', 'asc')->where('status', 1)->get();
        $result = array(
            'countrylist'      => $countrylist,
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
            'title'              => 'required',
            'country_id'              => 'required',
            'image'             => 'required',
            'valid_till'             => 'required',
        ]);

        $crud = new AdminScholarshipOffer;
        $crud->title = $request->title;
        $crud->country_id = $request->country_id;
        $crud->image = chunkfullurl($request->image);
        $crud->description = $request->description;
        $crud->scholarship_amount = $request->scholarship_amount;
        $crud->valid_till = $request->valid_till;
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
        $countrylist = AdminCountry::orderBy('title', 'asc')->where('status', 1)->get();
        $pages = AdminScholarshipOffer::findOrFail($id);
        $result = array(
            'page_header'       => 'Edit '.$this->title.' Detail',
            'record'            => $pages,
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
    public function update(Request $request, $id){
        $this->validate($request, [
            'title'              => 'required',
            'country_id'              => 'required',
            'image'             => 'required',
            'valid_till'             => 'required',
        ]);

        $crud = AdminScholarshipOffer::findOrFail($id);
        $crud->title = $request->title;
        $crud->country_id = $request->country_id;
        $crud->image = chunkfullurl($request->image);
        $crud->description = $request->description;
        $crud->scholarship_amount = $request->scholarship_amount;
        $crud->valid_till = $request->valid_till;
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
        $crud = AdminScholarshipOffer::findOrFail($id);
        $crud->delete();
        Session::flash('success_message', DELETED);
        return redirect(route($this->index_link));
    }
}
