<?php

namespace App\Http\Controllers\OnlineForum;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Session;
use DB;

class ReplyController extends Controller {
    
    public function index() {
        if(Session::get('display_name')) {

            $data = DB::select('select T1.*, T2.title, T3.username from forum_reply T1 left join forum_thread T2 on T1.thread = T2.id left join forum_users T3 on T1.user = T3.id', [1]);
            return view('forum.reply')->with(
                ['data' => $data,
                'sliderAction' => 'onlineporum', 
                'subAction' => 'thread']
            );
        } else {
            return redirect('admin/');
        }
    }

    public function deleteReply(Request $request) {
        $id = array(
            'id' => $request->id
        );

        $result = DB::table('forum_reply')->where($id)->delete();

        if($result == 1) {
            $notification = array(
                'message' => 'Successfully deleted aboutUs.', 
                'alert-type' => 'success'
            );
        } else {
            $notification = array(
                'message' => 'Whoops! Something went wrong.', 
                'alert-type' => 'warning'
            );
        }
        return back()->with($notification);
    }

    public function multiDeleteReply(Request $request) {
        $ids = $request->ids;
        $ids = explode(',', $ids);
        $result = 0;

        for($i = 0; $i < count($ids); $i ++) {

            $result = DB::table('forum_reply')->where('id', '=', $ids[$i])->delete();
            $result++;
        }

        if($result == count($ids)) {
            $notification = array(
                'message' => 'Successfully deleted data.', 
                'alert-type' => 'success'
            );
        } else {
            $notification = array(
                'message' => 'Whoops! Something went wrong.', 
                'alert-type' => 'warning'
            );
        }
        return back()->withInput($notification);
    }
}
