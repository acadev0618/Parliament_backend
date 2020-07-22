<?php

namespace App\Http\Controllers\Downloads;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Session;
use DB;

class DownloadOfficialReportsController extends Controller {

    public function index() {
        if(Session::get('display_name')) {

            $data = DB::select('select * from downloads where kind = 2', [1]);

            return view('downloads.officialReports')->with(
            	['data' => $data, 
            	'sliderAction' => 'downloads', 
            	'subAction' => '']
            );
        } else {
            return redirect('admin/');
        }
    }

    public function createOfficialReports(Request $request) {
        $file = $request->file('file_path');

        if(empty($file)) {
            return back();
        } else {
            $file_name = $file->getClientOriginalName();
            $destinationPath = 'uploads/downloads/';
            $file->move($destinationPath,$file_name);
            $file_path = env('BASE_URL')."/uploads/downloads/".$file_name;
        }

        $data = array(
            "title" => $request->title,
            "file_path" => $file_path,
            "kind" => 2
        );

        $result = DB::table('downloads')->insert($data);

        if($result) {
            return back();
        }
    }

    public function updateOfficialReports(Request $request) {
        $update_id = array('id' => $request->id);

        $data = array(
            "title" => $request->title
        );

        $file = $request->file('file_path');
        if($file) {
            $file_name = $file->getClientOriginalName();
            $destinationPath = 'uploads/downloads/';
            $file->move($destinationPath,$file_name);
            $file_link = env('BASE_URL')."/uploads/downloads/".$file_name;
            $data += [ "file_path" => $file_link ];
        }

        $result = DB::table('downloads')
                ->where($update_id)
                ->update($data);
        if ($result == 1) {
            return back();
        }
    }

    public function deleteOfficialReports(Request $request) {
        $id = array(
            'id' => $request->id
        );

        $result = DB::table('downloads')->where($id)->delete();

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

    public function multiDeleteOfficialReports(Request $request) {
        $ids = $request->ids;
        $ids = explode(',', $ids);
        $result = 0;

        for($i = 0; $i < count($ids); $i ++) {

            $result = DB::table('downloads')->where('id', '=', $ids[$i])->delete();
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
