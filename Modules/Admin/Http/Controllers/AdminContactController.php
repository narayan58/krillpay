<?php

namespace Modules\Admin\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Modules\Admin\Entities\AdminContact;
use Modules\Admin\Entities\Newsletter;

class AdminContactController extends Controller {

    private $title = 'Contact Us';
    private $sort_by = 'created_at';
    private $sort_order = 'desc';
    private $index_link = 'contact.index';
    private $list_page = 'admin::contact.list';
    private $mail_list_page = 'admin::contact.mailinglist';
    private $create_form = 'admin::contact.add';
    private $update_form = 'admin::contact.detail';
    private $link = 'contact';

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $list = AdminContact::orderBy($this->sort_by,$this->sort_order)->paginate(PAGES);
        $result = array(
            'list'              => $list,
            'page_header'       => 'List of '.$this->title,
        );
        return view($this->list_page, $result);
    }
    
    public function mailinglist()
    {
        $list = Newsletter::orderBy($this->sort_by,$this->sort_order)->paginate(PAGES);
        $result = array(
            'list'              => $list,
            'page_header'       => 'List of Mails',
        );
        return view($this->mail_list_page, $result);
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
            'message_reply'         => 'required|min:10',
        ]);

        $crud = new AdminFeedbackReply;
        $crud->feedback_id = $request->feedbackid;
        $crud->message_reply = $request->message_reply;
        $crud->inserted_datetime = date('Y-m-d H:i:s');
        $crud->created_by  = AdminLoginController::id();

        $mail = AdminMailController::sendFeedBackReplyMail($request->feedbackid,$request->message_reply);
        if ($mail == 'true') {
            $crud->save();
            Session::flash('success_message', UPDATED);
            return redirect(route($this->index_link));
        }else{
            Session::flash('success_message', "Mail Couldn't send.. Please Try Again");
            return redirect(route($this->link.'edit',$request->feedbackid));
        }
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
        $record = AdminContact::findOrFail($id);
        $record->viewed = '1';
        $record->save();

        $messagelist = AdminFeedbackReply::where('feedback_id',$id)->get();
        $result = array(
            'page_header'       => 'View '.$this->title.' Detail',
            'record'            => $record,
            'link'              => $this->link,
            'messagelist'       => $messagelist,
        );
        // return $result;
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
        $crud = AdminContact::findOrFail($id);
        $crud->delete();
        Session::flash('success_message', DELETED);
        return redirect(route($this->index_link));
    }
}