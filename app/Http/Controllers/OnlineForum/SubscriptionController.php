<?php

namespace App\Http\Controllers\OnlineForum;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Session;
use DB;

class SubscriptionController extends Controller {
    
    public function index() {
        if(Session::get('display_name')) {

            $data = DB::select('select * from forum_subscription', [1]);
            return view('forum.subscription')->with(
                ['data' => $data,
                'sliderAction' => 'onlineporum', 
                'subAction' => 'subscription']
            );
        } else {
            return redirect('admin/');
        }
    }

    public function updateSubscription(Request $request) {
        $id = array('id' => $request->id);
        $data = array(
            'title' => $request->title
        );
        $result = DB::table('forum_subscription')
                ->where($id)
                ->update($data);
        if ($result == 1) {
            return back();
        }
    }

    public function createSubscription(Request $request) {
        $data = array(
            'title' => $request->title
        );

        $result = DB::table('forum_subscription')->insert($data);

        if($result) {
            return back();
        }
    }

    public function deleteSubscription(Request $request) {
        $id = array(
            'id' => $request->id
        );

        $result = DB::table('forum_subscription')->where($id)->delete();

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

            $result = DB::table('forum_subscription')->where('id', '=', $ids[$i])->delete();
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
