<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use DB;

class AuthController extends Controller {
    public function login() {
        if(Session::get('display_name')) {
            return redirect('/home');
        } else {
            return view('auth.login');
        }
    }

    public function forgotPassword() {
        return view('auth.forgotPassword');
    }

    public function loginApi(Request $request) {
        // dd($request->all());
        $data = array(
            'user_email' => $request->user_email,
            'user_password' =>  $request->user_password
        );
        $user = DB::select('select * from users where user_email = "'.$request->user_email.'" and user_password = "'.$request->user_password.'"', [1]);
        // $json = json_encode($user);

        // $handle = curl_init();
        // $url = env('API').'/user/login';
        // curl_setopt_array(
        //     $handle,
        //     array(
        //         CURLOPT_URL => $url,
        //         CURLOPT_POST => true,
        //         CURLOPT_POSTFIELDS => $json,
        //         CURLOPT_RETURNTRANSFER => true,
        //         // CURLOPT_TIMEOUT => '60L'
        //     )
        // );
        // $output = curl_exec($handle);
        // // dd($output);
        // curl_close($handle);

        // $response = json_decode($json);

        if(count((array)$user) == 0) {
            $message = "This user doesn't match with our record. Try again!";
            return back()->with('warning', $message);
        } else {
            $data = array(
                'display_name' => $user[0]->display_name,
                'user_avatar' => $user[0]->user_avatar,
                'user_id' => $user[0]->user_id
            );

            Session::put([
                'display_name' => $data['display_name'], 
                'avatar' => $data['user_avatar'], 
                'user_id' => $data['user_id']
            ]);
            $message = 'Welcome to '.$data['display_name'].' !';
            return redirect('/home')->with(['message' => $message, 'data' => $data]);
        }
    }

    public function logout() {
        session()->forget('display_name', 'avatar', 'user_id');
        session()->flush();
        return redirect('admin/');
    }

    public function profile(Request $request, $id){

        return view('auth.profile')->with(['sliderAction' => 'home', 'subAction' => '', 'userid' => $id]);
    }

    public function changepwd(Request $request, $id){

        return view('auth.changepwd')->with(['sliderAction' => 'home', 'subAction' => '', 'userid' => $id]);
    }
}
