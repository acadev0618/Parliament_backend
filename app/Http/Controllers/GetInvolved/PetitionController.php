<?php

namespace App\Http\Controllers\GetInvolved;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Session;
use DB;

class PetitionController extends Controller {
    
    public function index() {
        if(Session::get('display_name')) {

            $data = DB::select('select * from petition_senator', [1]);
            return view('getInvolved.petitionSenator')->with(
                ['data' => $data,
                'sliderAction' => 'getinvolved', 
                'subAction' => 'petition']
            );
        } else {
            return redirect('admin/');
        }
    }

    public function updatePetition(Request $request) {
        $del_petition = $request->edit_del_petition;
        $update_id = array('id' => $request->id);

        $data = array(
            "name" => $request->name,
            "bill_act" => $request->bill_act,
            "email" => $request->email,
            "subject" => $request->subject,            
            "description" => $request->description
        );

        if($del_petition == "false") {
            $petition = $request->file('petition');
            if($petition) {
                $petition_name = $petition->getClientOriginalName();
                $destinationPath = 'uploads';
                $petition->move($destinationPath,$petition_name);
                $petition_link = "/uploads/".$petition_name;
                $data += [ "petition" => $petition_link ];
            }
        } else if($del_petition == "true") {
            $data += [ "petition" => null ];
        }

        $result = DB::table('petition_senator')
                ->where($update_id)
                ->update($data);
        if ($result == 1) {
            return back();
        } else {
            return back();
        }
    }

    public function deletePetition(Request $request) {
        $id = array(
            'id' => $request->id
        );

        $result = DB::table('petition_senator')->where($id)->delete();

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

    public function multiDeletePetition(Request $request) {
        $ids = $request->ids;
        $ids = explode(',', $ids);
        $result = 0;

        for($i = 0; $i < count($ids); $i ++) {

            $result = DB::table('petition_senator')->where('id', '=', $ids[$i])->delete();
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
