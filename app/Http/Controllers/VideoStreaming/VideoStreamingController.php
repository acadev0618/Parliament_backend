<?php

namespace App\Http\Controllers\VideoStreaming;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Session;
use DB;

class VideoStreamingController extends Controller {

    public function index() {
        if(Session::get('display_name')) {

            $data = DB::select('select * from video_streaming', [1]);

            return view('videoStreaming')->with(
            	['data' => $data, 
            	'sliderAction' => 'videostreaming', 
            	'subAction' => '']
            );
        } else {
            return redirect('admin/');
        }
    }

    public function updateVideoStreaming(Request $request) {
        $id = array('id' => $request->id);
        $data = array(
            'title' => $request->title,
            'description' => $request->description,
            'url' => $request->url
        );
        $result = DB::table('video_streaming')
                ->where($id)
                ->update($data);
        if ($result == 1) {
            return back();
        }
    }

    public function createVideoStreaming(Request $request) {
        $data = array(
            'title' => $request->title,
            'description' => $request->description,
            'url' => $request->url
        );

        $result = DB::table('video_streaming')->insert($data);

        if($result) {
            return back();
        }
    }

    public function deleteVideoStreaming(Request $request) {
        $id = array(
            'id' => $request->id
        );

        $result = DB::table('video_streaming')->where($id)->delete();

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

    public function multiDeleteVideoStreaming(Request $request) {
        $ids = $request->ids;
        $ids = explode(',', $ids);
        $result = 0;

        for($i = 0; $i < count($ids); $i ++) {

            $result = DB::table('video_streaming')->where('id', '=', $ids[$i])->delete();
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
