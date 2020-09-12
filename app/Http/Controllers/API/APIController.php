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
        $votes_list = DB::select('select * from votes');
        if(!$votes_list) {
            return response()->json(['status' => '404', 'error_code' => '1', 'message' => 'Field not exist.']);
        } else {
            return response()->json(['status' => '200', 'error_code' => '0', 'message' => 'success', 'data' => $votes_list]);
        }
    }

    public function vote(Request $request) {
        $id = array('id' => $request->id);
        $current_vote = DB::select('select * from votes where id = '.$request->id);
        if ($request->vote_type == 0) {
            $data = array(
                'sum_yes' => $current_vote[0]->sum_yes+1
            );
        }
        if ($request->vote_type == 1) {
            $data = array(
                'sum_no' => $current_vote[0]->sum_no+1
            );
        }
        if ($request->vote_type == 2) {
            $data = array(
                'sum_not_sure' => $current_vote[0]->sum_not_sure+1
            );
        }
        if ($request->vote_type == -1) {
            $data = array(
                'sum_not_sure' => $current_vote[0]->sum_not_sure
            );
        }
        $result = DB::table('votes')
                ->where($id)
                ->update($data);
        
        if($result != 1) {
            return response()->json(['status' => '404', 'error_code' => '1', 'message' => 'Field not exist.']);
        } else {
            return response()->json(['status' => '200', 'error_code' => '0', 'message' => 'success', 'data' => $data]);
        }
    }

    public function voteResult(Request $request) {
        $id = array('id' => $request->id);
        $votes_list = DB::select('select * from votes where id = '.$request->id);
        
        if(!$votes_list) {
            return response()->json(['status' => '404', 'error_code' => '1', 'message' => 'Field not exist.']);
        } else {
            return response()->json(['status' => '200', 'error_code' => '0', 'message' => 'success', 'data' => $votes_list]);
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

    public function parliamentMember(Request $request)
    {
        $parliament_member = DB::select('select * from members_parilament where id ='. $request->id);
        if(!$parliament_member) {
            return response()->json(['status' => '404', 'error_code' => '1', 'message' => 'Field not exist.']);
        } else {
            return response()->json(['status' => '200', 'error_code' => '0', 'message' => 'success', 'data' => $parliament_member]);
        }
    }

    public function parliamentChiefMembers()
    {
        $parliamentChiefMembers_list = DB::select('select * from members_parliament_chief');
        if(!$parliamentChiefMembers_list) {
            return response()->json(['status' => '404', 'error_code' => '1', 'message' => 'Field not exist.']);
        } else {
            return response()->json(['status' => '200', 'error_code' => '0', 'message' => 'success', 'data' => $parliamentChiefMembers_list]);
        }
    }

    public function searchParliamentChiefMembers(Request $request) {
        $data = DB::select('select * from members_parliament_chief where name like "%'.$request->key.'%"', [1]);
        
        if(!$data) {
            return response()->json(['status' => '404', 'error_code' => '1', 'message' => 'Field not exist.']);
        } else {
            return response()->json(['status' => '200', 'error_code' => '0', 'message' => 'success', 'data' => $data]);
        }
    }

    public function parliamentChiefMember(Request $request)
    {
        $parliamentChiefMember = DB::select('select * from members_parliament_chief where id ='. $request->id);
        if(!$parliamentChiefMember) {
            return response()->json(['status' => '404', 'error_code' => '1', 'message' => 'Field not exist.']);
        } else {
            return response()->json(['status' => '200', 'error_code' => '0', 'message' => 'success', 'data' => $parliamentChiefMember]);
        }
    }

    public function parliamentSpeaker()
    {
        $parliamentSpeaker = DB::select('select * from parliament_speaker');
        if(!$parliamentSpeaker) {
            return response()->json(['status' => '404', 'error_code' => '1', 'message' => 'Field not exist.']);
        } else {
            return response()->json(['status' => '200', 'error_code' => '0', 'message' => 'success', 'data' => $parliamentSpeaker]);
        }
    }

    public function parliamentDirectory()
    {
        $parliamentDirectory = DB::select('select * from parliament_directory');
        if(!$parliamentDirectory) {
            return response()->json(['status' => '404', 'error_code' => '1', 'message' => 'Field not exist.']);
        } else {
            return response()->json(['status' => '200', 'error_code' => '0', 'message' => 'success', 'data' => $parliamentDirectory]);
        }
    }

    public function parliamentClerk()
    {
        $parliamentClerk = DB::select('select * from parliament_clerk');
        if(!$parliamentClerk) {
            return response()->json(['status' => '404', 'error_code' => '1', 'message' => 'Field not exist.']);
        } else {
            return response()->json(['status' => '200', 'error_code' => '0', 'message' => 'success', 'data' => $parliamentClerk]);
        }
    }

    public function parliamentCalendar()
    {
        $parliamentClerk = DB::select('select * from parliament_calendar');
        if(!$parliamentClerk) {
            return response()->json(['status' => '404', 'error_code' => '1', 'message' => 'Field not exist.']);
        } else {
            return response()->json(['status' => '200', 'error_code' => '0', 'message' => 'success', 'data' => $parliamentClerk]);
        }
    }

    public function videoStreaming()
    {
        $videoStreaming = DB::select('select * from video_streaming');
        if(!$videoStreaming) {
            return response()->json(['status' => '404', 'error_code' => '1', 'message' => 'Field not exist.']);
        } else {
            return response()->json(['status' => '200', 'error_code' => '0', 'message' => 'success', 'data' => $videoStreaming]);
        }
    }

    // ================= Online Forum ======================
    public function getThread()
    {
        $thread_list = DB::select('SELECT
            T1.id,
            T1.title,
            T1.contents,
            T1.category,
            T1.username,
            T1.photo,
            T1.is_login,
            T1.type,
            T1.created_date,
            T1.latest_reply_date,
            T1.view,
            T1.reply,
            T1.complain,
            T2.username complain_user,
            T1.up_vote,
            T1.down_vote,
            T3.title sub_category 
        FROM
            (
            SELECT
                T1.id,
                T1.title,
                T1.contents,
                T2.title category,
                T3.username,
                T3.photo,
                T3.is_login,
                T4.title type,
                T1.created_date,
                T1.latest_reply_date,
                T1.view,
                T1.reply,
                T1.complain,
                T1.complain_user,
                T1.up_vote,
                T1.down_vote,
                T1.sub_category 
            FROM
                forum_thread T1
                LEFT JOIN forum_category T2 ON T1.category = T2.id
                LEFT JOIN forum_users T3 ON T1.USER = T3.id
                LEFT JOIN forum_type T4 ON T1.type = T4.id 
            ) T1
            LEFT JOIN forum_users T2 ON T1.complain_user = T2.id
            LEFT JOIN forum_category T3 ON T1.sub_category = T3.id', [1]
        );
        if(!$thread_list) {
            return response()->json(['status' => '404', 'error_code' => '1', 'message' => 'Field not exist.']);
        } else {
            return response()->json(['status' => '200', 'error_code' => '0', 'message' => 'success', 'data' => $thread_list]);
        }
    }

    public function getImage()
    {
        $images = DB::select('select * from settings');
        if(!$images) {
            return response()->json(['status' => '404', 'error_code' => '1', 'message' => 'Field not exist.']);
        } else {
            return response()->json(['status' => '200', 'error_code' => '0', 'message' => 'success', 'data' => $images]);
        }
    }
}