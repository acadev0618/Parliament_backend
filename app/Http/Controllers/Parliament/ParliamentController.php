<?php

namespace App\Http\Controllers\Parliament;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Session;
use DB;

class ParliamentController extends Controller {
    
    public function index() {
        if(Session::get('display_name')) {

            $data = DB::select('select * from hometable where is_parliament = 1', [1]);

            return view('parliament')->with(
            	['data' => $data, 
            	'sliderAction' => 'parliament', 
            	'subAction' => '']
            );
        } else {
            return redirect('admin/');
        }
    }

    public function updateParliamentList(Request $request) {
        $id = array('id' => $request->id);
        $data = array(
            'title' => $request->title,
            'subtitle' => $request->subtitle
        );
        $result = DB::table('hometable')
                ->where($id)
                ->update($data);
        if ($result == 1) {
            return back();
        }
    }
}
