<?php

namespace App\Http\Controllers\Parliament;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Session;
use DB;

class ParliamentClerkController extends Controller {
    
    public function index() {
        if(Session::get('display_name')) {

            $data = DB::select('select * from parliament_clerk', [1]);

            return view('parliament.parliamentClerk')->with(
                ['data' => $data,
                'sliderAction' => 'parliament', 
                'subAction' => '']
            );
        } else {
            return redirect('admin/');
        }
    }

    public function createParliamentClerk(Request $request) {
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
            "education" => $request->education,
            "experience" => $request->experience,
            "skills_trainings" => $request->skills_trainings,
            "activities_community_service" => $request->activities_community_service,
            "image" => $photo_link,
            "mobile" => $request->mobile,            
            "email" => $request->email,
            "description" => $request->description
        );

        $result = DB::table('parliament_clerk')->insert($data);

        if($result) {
            return back();
        }
    }

    public function updateParliamentClerk(Request $request) {
        $del_photo = $request->edit_del_photo;
        $update_id = array('id' => $request->id);

        $data = array(
            "name" => $request->name,
            "education" => $request->education,
            "experience" => $request->experience,
            "skills_trainings" => $request->skills_trainings,
            "activities_community_service" => $request->activities_community_service,
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

        $result = DB::table('parliament_clerk')
                ->where($update_id)
                ->update($data);
        if ($result == 1) {
            return back();
        }
    }

    public function deleteParliamentClerk(Request $request) {
        $id = array(
            'id' => $request->id
        );

        $result = DB::table('parliament_clerk')->where($id)->delete();

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

    public function multiDeleteParliamentClerk(Request $request) {
        $ids = $request->ids;
        $ids = explode(',', $ids);
        $result = 0;

        for($i = 0; $i < count($ids); $i ++) {

            $result = DB::table('parliament_clerk')->where('id', '=', $ids[$i])->delete();
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
