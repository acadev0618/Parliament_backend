<?php

namespace App\Http\Controllers\OnlineForum;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Session;
use DB;

class TypeController extends Controller {
    
    public function index() {
        if(Session::get('display_name')) {

            $data = DB::select('select * from forum_type', [1]);
            return view('forum.type')->with(
                ['data' => $data,
                'sliderAction' => 'onlineporum', 
                'subAction' => 'type']
            );
        } else {
            return redirect('admin/');
        }
    }

    public function updateType(Request $request) {
        $id = array('id' => $request->id);
        $data = array(
            'title' => $request->title
        );
        $result = DB::table('forum_type')
                ->where($id)
                ->update($data);
        if ($result == 1) {
            return back();
        }
    }

    public function createType(Request $request) {
        $data = array(
            'title' => $request->title
        );

        $result = DB::table('forum_type')->insert($data);

        if($result) {
            return back();
        }
    }

    public function deleteType(Request $request) {
        $id = array(
            'id' => $request->id
        );

        $result = DB::table('forum_type')->where($id)->delete();

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

    public function multiDeleteType(Request $request) {
        $ids = $request->ids;
        $ids = explode(',', $ids);
        $result = 0;

        for($i = 0; $i < count($ids); $i ++) {

            $result = DB::table('forum_type')->where('id', '=', $ids[$i])->delete();
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
