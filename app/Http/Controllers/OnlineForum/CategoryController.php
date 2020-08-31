<?php

namespace App\Http\Controllers\OnlineForum;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Session;
use DB;

class CategoryController extends Controller {
    
    public function index() {
        if(Session::get('display_name')) {

            $data = DB::select('select * from forum_category', [1]);
            return view('forum.category')->with(
                ['data' => $data,
                'sliderAction' => 'onlineporum', 
                'subAction' => 'category']
            );
        } else {
            return redirect('admin/');
        }
    }

    public function updateCategory(Request $request) {
        $id = array('id' => $request->id);
        $data = array(
            'title' => $request->title
        );
        $result = DB::table('forum_category')
                ->where($id)
                ->update($data);
        if ($result == 1) {
            return back();
        }
    }

    public function createCategory(Request $request) {
        $data = array(
            'title' => $request->title
        );

        $result = DB::table('forum_category')->insert($data);

        if($result) {
            return back();
        }
    }

    public function createSubcategory(Request $request) {
        $data = array(
            'title' => $request->title,
            'parent_id' => $request->parent_id
        );

        $result = DB::table('forum_category')->insert($data);

        if($result) {
            return back();
        }
    }

    public function deleteCategory(Request $request) {
        $id = array(
            'id' => $request->id
        );
        $parent_id = array(
            'parent_id' => $request->id
        );

        $category = DB::select('select * from forum_category where id = '.$request->id, [1]);
        
        $result = DB::table('forum_category')->where($id)->delete();
        if($category[0]->parent_id == 0) {
            DB::table('forum_category')->where($parent_id)->delete();
        }

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

    public function multiDeleteCategory(Request $request) {
        $ids = $request->ids;
        $ids = explode(',', $ids);
        $result = 0;

        for($i = 0; $i < count($ids); $i ++) {

            $category = DB::select('select * from forum_category where id = '.$ids[$i], [1]);
            $result = DB::table('forum_category')->where('id', '=', $ids[$i])->delete();
            $result++;
            if($category[0]->parent_id == 0) {
                DB::table('forum_category')->where('parent_id', '=', $ids[$i])->delete();
            }
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
