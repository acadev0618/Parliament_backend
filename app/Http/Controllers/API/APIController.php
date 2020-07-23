<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;

class APIController extends Controller
{
    public function home()
    {
        $home_list = DB::select('select * from hometable where is_home = 1');
        if(!$home_list) {
            return response()->json(['status' => '404', 'error_code' => '1', 'message' => 'Field not exist.']);
        } else {
            return response()->json(['status' => '200', 'error_code' => '0', 'message' => 'success', 'data' => $home_list]);
        }
    }

    public function parliament()
    {
        $parliament_list = DB::select('select * from hometable where is_parliament = 1');
        if(!$parliament_list) {
            return response()->json(['status' => '404', 'error_code' => '1', 'message' => 'Field not exist.']);
        } else {
            return response()->json(['status' => '200', 'error_code' => '0', 'message' => 'success', 'data' => $parliament_list]);
        }
    }

    public function downloads()
    {
        $parliament_list = DB::select('select * from hometable where is_downloads = 1');
        if(!$parliament_list) {
            return response()->json(['status' => '404', 'error_code' => '1', 'message' => 'Field not exist.']);
        } else {
            return response()->json(['status' => '200', 'error_code' => '0', 'message' => 'success', 'data' => $parliament_list]);
        }
    }

    public function votes()
    {
        $votes_list = DB::select('select id, title from votes');
        if(!$votes_list) {
            return response()->json(['status' => '404', 'error_code' => '1', 'message' => 'Field not exist.']);
        } else {
            return response()->json(['status' => '200', 'error_code' => '0', 'message' => 'success', 'data' => $votes_list]);
        }
    }

    public function votesTopics(Request $request) {
        $data = DB::select('select topics from votes where id = '.$request->id, [1]);
        
        if(!$data) {
            return response()->json(['status' => '404', 'error_code' => '1', 'message' => 'Field not exist.']);
        } else {
            return response()->json(['status' => '200', 'error_code' => '0', 'message' => 'success', 'data' => $data]);
        }
    }

    public function standingOrder()
    {
        $votes_list = DB::select('select * from standing_order');
        if(!$votes_list) {
            return response()->json(['status' => '404', 'error_code' => '1', 'message' => 'Field not exist.']);
        } else {
            return response()->json(['status' => '200', 'error_code' => '0', 'message' => 'success', 'data' => $votes_list]);
        }
    }

    public function constitution()
    {
        $votes_list = DB::select('select * from constitution');
        if(!$votes_list) {
            return response()->json(['status' => '404', 'error_code' => '1', 'message' => 'Field not exist.']);
        } else {
            return response()->json(['status' => '200', 'error_code' => '0', 'message' => 'success', 'data' => $votes_list]);
        }
    }

    public function stateOpening()
    {
        $stateOpening_list = DB::select('select * from downloads where kind = 6');
        if(!$stateOpening_list) {
            return response()->json(['status' => '404', 'error_code' => '1', 'message' => 'Field not exist.']);
        } else {
            return response()->json(['status' => '200', 'error_code' => '0', 'message' => 'success', 'data' => $stateOpening_list]);
        }
    }

    public function searchStateOpening(Request $request) {
        $data = DB::select('select * from downloads where kind = 6 and title like "%'.$request->key.'%"', [1]);
        
        if(!$data) {
            return response()->json(['status' => '404', 'error_code' => '1', 'message' => 'Field not exist.']);
        } else {
            return response()->json(['status' => '200', 'error_code' => '0', 'message' => 'success', 'data' => $data]);
        }
    }

    public function budget()
    {
        $budget_list = DB::select('select * from downloads where kind = 5');
        if(!$budget_list) {
            return response()->json(['status' => '404', 'error_code' => '1', 'message' => 'Field not exist.']);
        } else {
            return response()->json(['status' => '200', 'error_code' => '0', 'message' => 'success', 'data' => $budget_list]);
        }
    }

    public function searchBudget(Request $request) {
        $data = DB::select('select * from downloads where kind = 5 and title like "%'.$request->key.'%"', [1]);
        
        if(!$data) {
            return response()->json(['status' => '404', 'error_code' => '1', 'message' => 'Field not exist.']);
        } else {
            return response()->json(['status' => '200', 'error_code' => '0', 'message' => 'success', 'data' => $data]);
        }
    }

    public function gazettedActs()
    {
        $gazettedActs_list = DB::select('select * from downloads where kind = 0');
        if(!$gazettedActs_list) {
            return response()->json(['status' => '404', 'error_code' => '1', 'message' => 'Field not exist.']);
        } else {
            return response()->json(['status' => '200', 'error_code' => '0', 'message' => 'success', 'data' => $gazettedActs_list]);
        }
    }

    public function searchGazettedActs(Request $request) {
        $data = DB::select('select * from downloads where kind = 0 and title like "%'.$request->key.'%"', [1]);
        
        if(!$data) {
            return response()->json(['status' => '404', 'error_code' => '1', 'message' => 'Field not exist.']);
        } else {
            return response()->json(['status' => '200', 'error_code' => '0', 'message' => 'success', 'data' => $data]);
        }
    }

    public function govtAgreement()
    {
        $gazettedActs_list = DB::select('select * from downloads where kind = 1');
        if(!$gazettedActs_list) {
            return response()->json(['status' => '404', 'error_code' => '1', 'message' => 'Field not exist.']);
        } else {
            return response()->json(['status' => '200', 'error_code' => '0', 'message' => 'success', 'data' => $gazettedActs_list]);
        }
    }

    public function searchGovtAgreement(Request $request) {
        $data = DB::select('select * from downloads where kind = 1 and title like "%'.$request->key.'%"', [1]);
        
        if(!$data) {
            return response()->json(['status' => '404', 'error_code' => '1', 'message' => 'Field not exist.']);
        } else {
            return response()->json(['status' => '200', 'error_code' => '0', 'message' => 'success', 'data' => $data]);
        }
    }

    public function officailReport()
    {
        $officailReport_list = DB::select('select * from downloads where kind = 2');
        if(!$officailReport_list) {
            return response()->json(['status' => '404', 'error_code' => '1', 'message' => 'Field not exist.']);
        } else {
            return response()->json(['status' => '200', 'error_code' => '0', 'message' => 'success', 'data' => $officailReport_list]);
        }
    }

    public function searchOfficailReport(Request $request) {
        $data = DB::select('select * from downloads where kind = 2 and title like "%'.$request->key.'%"', [1]);
        
        if(!$data) {
            return response()->json(['status' => '404', 'error_code' => '1', 'message' => 'Field not exist.']);
        } else {
            return response()->json(['status' => '200', 'error_code' => '0', 'message' => 'success', 'data' => $data]);
        }
    }

    public function committeesReports()
    {
        $committeesReports_list = DB::select('select * from downloads where kind = 3');
        if(!$committeesReports_list) {
            return response()->json(['status' => '404', 'error_code' => '1', 'message' => 'Field not exist.']);
        } else {
            return response()->json(['status' => '200', 'error_code' => '0', 'message' => 'success', 'data' => $committeesReports_list]);
        }
    }

    public function searchCommitteesReports(Request $request) {
        $data = DB::select('select * from downloads where kind = 3 and title like "%'.$request->key.'%"', [1]);
        
        if(!$data) {
            return response()->json(['status' => '404', 'error_code' => '1', 'message' => 'Field not exist.']);
        } else {
            return response()->json(['status' => '200', 'error_code' => '0', 'message' => 'success', 'data' => $data]);
        }
    }

    public function researchMaterials()
    {
        $committeesReports_list = DB::select('select * from downloads where kind = 4');
        if(!$committeesReports_list) {
            return response()->json(['status' => '404', 'error_code' => '1', 'message' => 'Field not exist.']);
        } else {
            return response()->json(['status' => '200', 'error_code' => '0', 'message' => 'success', 'data' => $committeesReports_list]);
        }
    }

    public function searchResearchMaterials(Request $request) {
        $data = DB::select('select * from downloads where kind = 4 and title like "%'.$request->key.'%"', [1]);
        
        if(!$data) {
            return response()->json(['status' => '404', 'error_code' => '1', 'message' => 'Field not exist.']);
        } else {
            return response()->json(['status' => '200', 'error_code' => '0', 'message' => 'success', 'data' => $data]);
        }
    }

    public function aboutUs()
    {
        $aboutUs_list = DB::select('select * from about_us');
        if(!$aboutUs_list) {
            return response()->json(['status' => '404', 'error_code' => '1', 'message' => 'Field not exist.']);
        } else {
            return response()->json(['status' => '200', 'error_code' => '0', 'message' => 'success', 'data' => $aboutUs_list]);
        }
    }

    public function parliamentMembers()
    {
        $parliamentMembers_list = DB::select('select * from members_parilament');
        if(!$parliamentMembers_list) {
            return response()->json(['status' => '404', 'error_code' => '1', 'message' => 'Field not exist.']);
        } else {
            return response()->json(['status' => '200', 'error_code' => '0', 'message' => 'success', 'data' => $parliamentMembers_list]);
        }
    }

    public function searchParliamentMembers(Request $request) {
        $data = DB::select('select * from members_parilament where name like "%'.$request->key.'%"', [1]);
        
        if(!$data) {
            return response()->json(['status' => '404', 'error_code' => '1', 'message' => 'Field not exist.']);
        } else {
            return response()->json(['status' => '200', 'error_code' => '0', 'message' => 'success', 'data' => $data]);
        }
    }
}