<?php

namespace App\Http\Controllers\OnlineForum;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Session;
use DB;

class ThreadController extends Controller {
    
    public function index() {
        if(Session::get('display_name')) {

            $data = DB::select('SELECT
                T1.id,
                T1.title,
                T1.contents,
                T1.category,
                T1.username,
                T1.type,
                T1.created_date,
                T1.latest_reply_date,
                T1.view,
                T1.reply,
                T1.complain,
                T2.username complain_user,
                T1.up_vote,
                T1.down_vote,
                T3.title sub_category 
            FROM
                (
                SELECT
                    T1.id,
                    T1.title,
                    T1.contents,
                    T2.title category,
                    T3.username,
                    T4.title type,
                    T1.created_date,
                    T1.latest_reply_date,
                    T1.view,
                    T1.reply,
                    T1.complain,
                    T1.complain_user,
                    T1.up_vote,
                    T1.down_vote,
                    T1.sub_category 
                FROM
                    forum_thread T1
                    LEFT JOIN forum_category T2 ON T1.category = T2.id
                    LEFT JOIN forum_users T3 ON T1.USER = T3.id
                    LEFT JOIN forum_type T4 ON T1.type = T4.id 
                ) T1
                LEFT JOIN forum_users T2 ON T1.complain_user = T2.id
                LEFT JOIN forum_category T3 ON T1.sub_category = T3.id', [1]
            );
            $category = DB::select('select * from forum_category', [1]);
            $users = DB::select('select * from forum_users', [1]);
            return view('forum.thread')->with(
                ['data' => $data,
                'category' => $category,
                'users' => $users,
                'sliderAction' => 'onlineporum',
                'subAction' => 'thread']
            );
        } else {
            return redirect('admin/');
        }
    }

    public function getSubscription() {
        $data = DB::select('select * from forum_subscription', [1]);
        echo json_encode(array('success'=>$data));
    }

    public function updateSubscription(Request $request) {
        $id = array('id' => $request->id);
        $data = array(
            'title' => $request->title
        );
        $result = DB::table('forum_users')
                ->where($id)
                ->update($data);
        if ($result == 1) {
            return back();
        }
    }

    public function createMembers(Request $request) {
        $photo = $request->file('photo');

        $data = array(
            "first_name" => $request->first_name,
            "last_name" => $request->last_name,
            "username" => $request->username,
            "created_date" => $request->created_date,
            "password" => $request->password,
            "phone" => $request->phone,            
            "email" => $request->email,
            "birthday" => $request->birthday,
            "gender" => $request->gender,
            "subscription" => $request->subscription,
            "msg_accept" => $request->msg_accept,
            "key" => $request->key,
            "verification" => $request->verification
        );

        if(!empty($photo)) {
            $photo_name = $photo->getClientOriginalName();
            $destinationPath = 'forum/uploads';
            $photo->move($destinationPath,$photo_name);
            $photo_link = "/forum/uploads/".$photo_name;
            $data += [ "photo" => $photo_link ];
        }

        $result = DB::table('forum_users')->insert($data);

        if($result) {
            return back();
        } else {
            return back();
        }
    }

    public function deleteSubscription(Request $request) {
        $id = array(
            'id' => $request->id
        );

        $result = DB::table('forum_users')->where($id)->delete();

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

    public function multiDeleteSubscription(Request $request) {
        $ids = $request->ids;
        $ids = explode(',', $ids);
        $result = 0;

        for($i = 0; $i < count($ids); $i ++) {

            $result = DB::table('forum_users')->where('id', '=', $ids[$i])->delete();
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
