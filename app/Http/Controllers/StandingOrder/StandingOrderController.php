<?php

namespace App\Http\Controllers\StandingOrder;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Session;
use DB;

class StandingOrderController extends Controller {
    
    public function index() {
        if(Session::get('display_name')) {

            $data = DB::select('select * from standing_order', [1]);

            return view('standingorder')->with(
            	['data' => $data, 
            	'sliderAction' => 'standingorder', 
            	'subAction' => '']
            );
        } else {
            return redirect('admin/');
        }
    }

    public function updateStandingOrder(Request $request) {
        $id = array('id' => $request->id);
        $data = array(
            'title' => $request->title,
            'contents' => $request->contents,
            'key' => $request->key
        );
        $result = DB::table('standing_order')
                ->where($id)
                ->update($data);
        
        if ($result == 1) {
            $notification = array(
                'message' => 'Successfully deleted data.', 
                'alert-type' => 'success'
            );
            return back();
        } else {
            $notification = array(
                'message' => 'Whoops! Something went wrong.', 
                'alert-type' => 'error'
            );
        }
        return back()->withInput($notification);
    }
}
