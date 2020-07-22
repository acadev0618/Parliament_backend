<?php

namespace App\Http\Controllers\Votes;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Session;
use DB;

class VotesController extends Controller {
    
    public function index() {
        if(Session::get('display_name')) {

            $data = DB::select('select * from votes', [1]);
            return view('votes')->with(
                ['data' => $data,
                'sliderAction' => 'votes', 
                'subAction' => '']
            );
        } else {
            return redirect('admin/');
        }
    }

    public function updateVotes(Request $request) {
        $id = array('id' => $request->id);
        $data = array(
            'title' => $request->title,
            'topics' => $request->topics
        );
        $result = DB::table('votes')
                ->where($id)
                ->update($data);
        if ($result == 1) {
            return back();
        }
    }

    public function createVotes(Request $request) {
        $data = array(
            'title' => $request->title,
            'topics' => $request->topics
        );

        $result = DB::table('votes')->insert($data);

        if($result) {
            return back();
        }
    }

    public function deleteVotes(Request $request) {
        $id = array(
            'id' => $request->id
        );

        $result = DB::table('votes')->where($id)->delete();

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

    public function multiDeleteVotes(Request $request) {
        $ids = $request->ids;
        $ids = explode(',', $ids);
        $result = 0;

        for($i = 0; $i < count($ids); $i ++) {

            $result = DB::table('votes')->where('id', '=', $ids[$i])->delete();
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
