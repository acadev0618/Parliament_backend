<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Session;
use DB;

class HomeController extends Controller {
    
    public function index() {
        if(Session::get('display_name')) {

            $data = DB::select('select * from hometable where is_home = 1', [1]);

            return view('home')->with(
            	['data' => $data, 
            	'sliderAction' => 'home', 
            	'subAction' => '']
            );
        } else {
            return redirect('admin/');
        }
    }

    public function updateHomeList(Request $request) {
        $id = array('id' => $request->id);
        $data = array(
            'title' => $request->title,
            'subtitle' => $request->subtitle
        );
        $result = DB::table('hometable')
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
