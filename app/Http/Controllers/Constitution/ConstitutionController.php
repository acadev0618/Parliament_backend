<?php

namespace App\Http\Controllers\Constitution;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Session;
use DB;

class ConstitutionController extends Controller {
    
    public function index() {
        if(Session::get('display_name')) {

            $data = DB::select('select * from constitution', [1]);

            return view('constitution')->with(
            	['data' => $data, 
            	'sliderAction' => 'constitution', 
            	'subAction' => '']
            );
        } else {
            return redirect('admin/');
        }
    }

    public function createConstitution(Request $request) {
        $data = array(
            'title' => $request->title,
            'contents' => $request->contents
        );

        $result = DB::table('constitution')->insert($data);

        if($result) {
            return back();
        }
    }

    public function updateConstitution(Request $request) {
        $id = array('id' => $request->id);
        $data = array(
            'title' => $request->title,
            'contents' => $request->contents
        );
        $result = DB::table('constitution')
                ->where($id)
                ->update($data);
        if ($result == 1) {
            return back();
        }
    }

    public function deleteConstitution(Request $request) {
        $id = array(
            'id' => $request->id
        );

        $result = DB::table('constitution')->where($id)->delete();

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

    public function multiDeleteConstitution(Request $request) {
        $ids = $request->ids;
        $ids = explode(',', $ids);
        $result = 0;

        for($i = 0; $i < count($ids); $i ++) {

            $result = DB::table('constitution')->where('id', '=', $ids[$i])->delete();
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
