<?php

namespace Modules\Admin\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Modules\Admin\Entities\AdminAuthor;
use Modules\Admin\Entities\AdminCategory;
use Modules\Admin\Entities\AdminPosts;
use Modules\Admin\Http\Controllers\AdminLoginController;

class AdminPostsController extends Controller {

    private $title = 'Posts';
    private $sort_by = 'published_date';
    private $sort_order = 'desc';
    private $index_link = 'posts.index';
    private $list_page = 'admin::posts.list';
    private $create_form = 'admin::posts.add';
    private $update_form = 'admin::posts.edit';
    private $link = 'posts';
    private $user_id;
    private $authorlist;

    public function __construct(){
        $this->authorlist = AdminAuthor::where('status', 1)->get();
    }

    public function index(Request $request)
    {
        $categorylist = AdminCategory::orderBy('title', 'asc')->get();
        if(!empty($_GET)){
            $title = $request->input('title');
            $category = $request->input('category');
            $date = $request->input('published_date');
            // $list = AdminPosts::getFilterDataSearch($title,$date);
            $query = AdminPosts::with('category','authordata');
            if ($title !='') {
                $query->where('title','like', '%'.$title.'%');
            }
            if ($date !='') {
                $query->where('published_date', $date);
            }
            if ($category !='') {
                $query->whereHas('category', function($q) use ($category) {
                        $q->where('category_id',$category);
                    });
            }
            $list = $query->select('id','title','slug','published_date','author_id','status')
                    ->orderBy('published_date', 'desc')
                    ->paginate(PAGES);
        }else{
            $list = AdminPosts::with('category','authordata')
                    ->select('id','title','slug','published_date','author_id','status')
                    ->orderBy($this->sort_by, $this->sort_order)
                    ->paginate(PAGES);
        }
        // return $list;
        $result = array(
            'categorylist'      => $categorylist,
            'list'              => $list,
            'page_header'       => 'List of '.$this->title,
            'link'              => $this->link,
            'authorlist'        => $this->authorlist,
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
        $categorylist = AdminCategory::orderBy('title', 'asc')->where('status',1)->get();
        $result = array(
            'categorylist'      => $categorylist,
            'page_header'       => 'Add '.$this->title.' Detail',
            'link'              => $this->link,
            'authorlist'        => $this->authorlist,
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
            'category'           => 'required',
        ]);

        $crud = new AdminPosts;
        $crud->title = $request->title;
        $crud->sub_title = $request->sub_title;
        $crud->description = $request->description;
        $crud->image = chunkfullurl($request->image);
        $crud->file = chunkfullurl($request->file);
        $crud->published_date = $request->published_date;
        $crud->author_id = $request->author_id;
        $crud->meta_title = $request->meta_title;
        $crud->meta_keywords = $request->meta_keywords;
        $crud->meta_description = $request->meta_description;
        $crud->created_by = session('admin')['userid'];
        $crud->status = $request->status;
        $crud->save();
        $crud->category()->sync($request->category);
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
        $categorylist = AdminCategory::orderBy('title', 'asc')->where('status',1)->get();
        $record = AdminPosts::with('category')->where('id',$id)->first();
        $result = array(
            'page_header'       => 'Edit '.$this->title.' Detail',
            'record'            => $record,
            'categorylist'      => $categorylist,
            'link'              => $this->link,
            'authorlist'        => $this->authorlist,
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
        ]);

        $crud = AdminPosts::findOrFail($id);
        $crud->title = $request->title;
        $crud->sub_title = $request->sub_title;
        $crud->slug = str_slug($request->slug,'-');
        $crud->description = $request->description;
        $crud->image = chunkfullurl($request->image);
        $crud->file = chunkfullurl($request->file);
        $crud->author_id = $request->author_id;
        $crud->published_date = $request->published_date;
        $crud->updated_by = session('admin')['userid'];
        $crud->meta_title = $request->meta_title;
        $crud->meta_keywords = $request->meta_keywords;
        $crud->meta_description = $request->meta_description;
        $crud->status = $request->status;
        $crud->save();
        $crud->category()->sync($request->category);
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
        $crud = AdminPosts::findOrFail($id);
        $crud->delete();
        AdminPosts::deleteNewsCategoryList($id);
        Session::flash('success_message', DELETED);
        return redirect(route($this->index_link));
    }
}