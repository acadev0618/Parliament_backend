<?php

namespace App\Http\Controllers\Parliament;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Session;
use DB;

class ParliamentChiefMPsController extends Controller {
    
    public function index() {
        if(Session::get('display_name')) {

            $data = DB::select('select * from members_parliament_chief', [1]);

            return view('parliament.parliamentChiefMPs')->with(
                ['data' => $data,
                'sliderAction' => 'parliament', 
                'subAction' => '']
            );
        } else {
            return redirect('admin/');
        }
    }

    public function createParliamentChiefMPs(Request $request) {
        $photo = $request->file('image');

        if(empty($photo)) {
            $photo_link = "assets/img/avatars/default_avatar.jpg";
        } else {
            $photo_name = $photo->getClientOriginalName();
            $destinationPath = 'uploads';
            $photo->move($destinationPath,$photo_name);
            $photo_link = "uploads/".$photo_name;
        }

        $data = array(
            "name" => $request->name,
            "district" => $request->district,
            "directory" => $request->directory,
            "image" => $photo_link,
            "mobile" => $request->mobile,            
            "email" => $request->email,
            "description" => $request->description
        );

        $result = DB::table('members_parliament_chief')->insert($data);

        if($result) {
            return back();
        }
    }

    public function updateParliamentChiefMPs(Request $request) {
        $del_photo = $request->edit_del_photo;
        $update_id = array('id' => $request->id);

        $data = array(
            "name" => $request->name,
            "district" => $request->district,
            "directory" => $request->directory,
            "mobile" => $request->mobile,            
            "email" => $request->email,
            "description" => $request->description
        );

        if($del_photo == "false") {
            $photo = $request->file('photo');
            if($photo) {
                $photo_name = $photo->getClientOriginalName();
                $destinationPath = 'uploads';
                $photo->move($destinationPath,$photo_name);
                $photo_link = "uploads/".$photo_name;
                $data += [ "image" => $photo_link ];
            }
        } else if($del_photo == "true") {
            $photo_link = "assets/img/avatars/default_avatar.jpg";
            $data += [ "image" => $photo_link ];
        }

        $result = DB::table('members_parliament_chief')
                ->where($update_id)
                ->update($data);
        if ($result == 1) {
            return back();
        }
    }

    public function deleteParliamentChiefMPs(Request $request) {
        $id = array(
            'id' => $request->id
        );

        $result = DB::table('members_parliament_chief')->where($id)->delete();

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

    public function multiDeleteParliamentChiefMPs(Request $request) {
        $ids = $request->ids;
        $ids = explode(',', $ids);
        $result = 0;

        for($i = 0; $i < count($ids); $i ++) {

            $result = DB::table('members_parliament_chief')->where('id', '=', $ids[$i])->delete();
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
