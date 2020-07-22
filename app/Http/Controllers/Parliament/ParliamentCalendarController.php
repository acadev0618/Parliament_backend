<?php

namespace App\Http\Controllers\Parliament;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Session;
use DB;

class ParliamentCalendarController extends Controller {
    
    public function index() {
        if(Session::get('display_name')) {

            $data = DB::select('select * from parliament_calendar', [1]);
            return view('parliament.parliamentCalendar')->with(
                ['data' => $data,
                'sliderAction' => 'parliament', 
                'subAction' => '']
            );
        } else {
            return redirect('admin/');
        }
    }

    public function updateParliamentCalendar(Request $request) {
        $id = array('id' => $request->id);
        $data = array(
            'title' => $request->title,
            'date' => $request->date
        );
        $result = DB::table('parliament_calendar')
                ->where($id)
                ->update($data);
        if ($result == 1) {
            return back();
        }
    }

    public function createParliamentCalendar(Request $request) {
        $data = array(
            'title' => $request->title,
            'date' => $request->date
        );

        $result = DB::table('parliament_calendar')->insert($data);

        if($result) {
            return back();
        }
    }

    public function deleteParliamentCalendar(Request $request) {
        $id = array(
            'id' => $request->id
        );

        $result = DB::table('parliament_calendar')->where($id)->delete();

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

    public function multiDeleteParliamentCalendar(Request $request) {
        $ids = $request->ids;
        $ids = explode(',', $ids);
        $result = 0;

        for($i = 0; $i < count($ids); $i ++) {

            $result = DB::table('parliament_calendar')->where('id', '=', $ids[$i])->delete();
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
