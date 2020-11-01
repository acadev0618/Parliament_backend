<?php

namespace App\Http\Controllers\GetInvolved;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Session;
use DB;

class VisitorController extends Controller {
    
    public function index() {
        if(Session::get('display_name')) {

            $data = DB::select('select * from visit_parliament', [1]);
            return view('getInvolved.visitParliament')->with(
                ['data' => $data,
                'sliderAction' => 'getinvolved', 
                'subAction' => 'visitor']
            );
        } else {
            return redirect('admin/');
        }
    }

    public function updateVisitor(Request $request) {
        $id = array('id' => $request->id);
        $data = array(
            'institution' => $request->institution,
            'name' => $request->name,
            'visit_reason' => $request->visit_reason,
            'visit_date' => $request->visit_date,
            'visitor_num' => $request->visitor_num,
            'email' => $request->email,
            'mobile' => $request->mobile,
            'comments' => $request->comments
        );
        $result = DB::table('visit_parliament')
                ->where($id)
                ->update($data);
        if ($result == 1) {
            return back();
        } else {
            return back();
        }
    }

    public function deleteVisitor(Request $request) {
        $id = array(
            'id' => $request->id
        );

        $result = DB::table('visit_parliament')->where($id)->delete();

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

    public function multiDeleteVisitor(Request $request) {
        $ids = $request->ids;
        $ids = explode(',', $ids);
        $result = 0;

        for($i = 0; $i < count($ids); $i ++) {

            $result = DB::table('visit_parliament')->where('id', '=', $ids[$i])->delete();
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
