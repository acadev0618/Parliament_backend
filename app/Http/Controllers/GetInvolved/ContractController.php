<?php

namespace App\Http\Controllers\GetInvolved;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Session;
use DB;

class ContractController extends Controller {
    
    public function index() {
        if(Session::get('display_name')) {

            $data = DB::select('select * from contract_senator', [1]);
            return view('getInvolved.contractSenator')->with(
                ['data' => $data,
                'sliderAction' => 'getinvolved', 
                'subAction' => 'contract']
            );
        } else {
            return redirect('admin/');
        }
    }

    public function updateContract(Request $request) {
        $id = array('id' => $request->id);
        $data = array(
            'name' => $request->name,
            'senator' => $request->senator,
            'email' => $request->email,
            'mobile' => $request->mobile,
            'subject' => $request->subject,
            'description' => $request->description
        );
        $result = DB::table('contract_senator')
                ->where($id)
                ->update($data);
        if ($result == 1) {
            return back();
        } else {
            return back();
        }
    }

    public function deleteContract(Request $request) {
        $id = array(
            'id' => $request->id
        );

        $result = DB::table('contract_senator')->where($id)->delete();

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

    public function multiDeleteContract(Request $request) {
        $ids = $request->ids;
        $ids = explode(',', $ids);
        $result = 0;

        for($i = 0; $i < count($ids); $i ++) {

            $result = DB::table('contract_senator')->where('id', '=', $ids[$i])->delete();
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
