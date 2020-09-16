<?php

namespace App\Http\Controllers\OnlineForum;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Session;
use DB;

class MembersController extends Controller {
    
    public function index() {
        if(Session::get('display_name')) {

            $data = DB::select('select T1.*, T2.title from forum_users T1 left join forum_subscription T2 on T1.subscription = T2.id', [1]);
            return view('forum.member')->with(
                ['data' => $data,
                'sliderAction' => 'onlineporum', 
                'subAction' => 'members']
            );
        } else {
            return redirect('admin/');
        }
    }

    public function getSubscription() {
        $data = DB::select('select * from forum_subscription', [1]);
        echo json_encode(array('success'=>$data));
    }

    public function updateMember(Request $request) {
        $del_photo = $request->edit_del_photo;
        $update_id = array('id' => $request->id);

        $data = array(
            "first_name" => $request->firstname,
            "last_name" => $request->lastname,
            "username" => $request->username,
            "phone" => $request->phone,            
            "email" => $request->email,
            "birthday" => $request->birthday,
            "gender" => $request->gender,
            "key" => $request->key,
        );
        if($del_photo == "false") {
            $photo = $request->file('photo');
            if($photo) {
                $photo_name = $photo->getClientOriginalName();
                $destinationPath = 'forum/uploads';
                $photo->move($destinationPath,$photo_name);
                $photo_link = "uploads/".$photo_name;
                $data += [ "photo" => $photo_link ];
            }
        } else if($del_photo == "true") {
            $data += [ "photo" => null ];
        }

        $result = DB::table('forum_users')
                ->where($update_id)
                ->update($data);
        if ($result == 1) {
            return back();
        }
    }

    public function createMember(Request $request) {
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

    public function deleteMember(Request $request) {
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

    public function multiDeleteMember(Request $request) {
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
