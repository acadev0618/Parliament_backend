<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Session;
use DB;

class AboutUsController extends Controller {
    
    public function index() {
        if(Session::get('display_name')) {

            $data = DB::select('select * from about_us', [1]);
            return view('home.aboutUs')->with(
                ['data' => $data,
                'sliderAction' => 'home', 
                'subAction' => '']
            );
        } else {
            return redirect('admin/');
        }
    }

    public function updateAboutUs(Request $request) {
        $id = array('id' => $request->id);
        $data = array(
            'title' => $request->title,
            'description' => $request->description
        );
        $result = DB::table('about_us')
                ->where($id)
                ->update($data);
        if ($result == 1) {
            return back();
        }
    }

    public function createAboutUs(Request $request) {
        $data = array(
            'title' => $request->title,
            'description' => $request->description
        );

        $result = DB::table('about_us')->insert($data);

        if($result) {
            return back();
        }
    }

    public function deleteAboutUs(Request $request) {
        $id = array(
            'id' => $request->id
        );

        $result = DB::table('about_us')->where($id)->delete();

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

    public function multiDeleteAboutUs(Request $request) {
        $ids = $request->ids;
        $ids = explode(',', $ids);
        $result = 0;

        for($i = 0; $i < count($ids); $i ++) {

            $result = DB::table('about_us')->where('id', '=', $ids[$i])->delete();
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
