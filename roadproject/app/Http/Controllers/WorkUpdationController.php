<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\PeopleComplaintImage;
use App\RoadInspectionDetail;
use App\EstimationDetail;
use App\EditEstimationDetail;
use App\TenderDetail;

use Illuminate\Support\Facades\DB;

class WorkUpdationController extends Controller
{
    public function index()
    {
         $updation = DB::table('tenderdetails')->where([
            ['ongoingstatus', '!=', NULL],
            ['ongoingstatus', '!=', '100%']
        ])->paginate(5);
          $updation_count = DB::table('tenderdetails')->where([
            ['ongoingstatus', '!=', NULL],
            ['ongoingstatus', '!=', '100%']
        ])->count();
     return view('roadinspector.OngoingComplaint', ['updation' => $updation, 'updation_count' => $updation_count]); 
    }
     public function aeindex()
    {
         $updation = DB::table('tenderdetails')->where([
            ['ongoingstatus', '!=', NULL],
            ['ongoingstatus', '!=', '100%']
        ])->paginate(5);
          $updation_count = DB::table('tenderdetails')->where([
            ['ongoingstatus', '!=', NULL],
            ['ongoingstatus', '!=', '100%']
        ])->count();
     return view('assistantEngineer.OngoingComplaint', ['updation' => $updation, 'updation_count' => $updation_count]); 
    } 
    public function eeindex()
    {
     $updation = DB::table('tenderdetails')->where([
            ['ongoingstatus', '!=', NULL],
            ['ongoingstatus', '!=', '100%']
        ])->paginate(5);
          $updation_count = DB::table('tenderdetails')->where([
            ['ongoingstatus', '!=', NULL],
            ['ongoingstatus', '!=', '100%']
        ])->count();
     return view('executiveEngineer.OngoingComplaint', ['updation' => $updation, 'updation_count' => $updation_count]); 
    }
    public function ceindex()
    {
       $updation = DB::table('tenderdetails')->where([
            ['ongoingstatus', '!=', NULL],
            ['ongoingstatus', '!=', '100%']
        ])->paginate(5);
          $updation_count = DB::table('tenderdetails')->where([
            ['ongoingstatus', '!=', NULL],
            ['ongoingstatus', '!=', '100%']
        ])->count();
        
     return view('chiefEngineer.OngoingComplaint', ['updation' => $updation, 'updation_count' => $updation_count]); 
    } 
    public function pindex()
    {
         $updation = DB::table('tenderdetails')->where([
            ['ongoingstatus', '!=', NULL],
            ['panchayath_or_municipal', 'panchayath'],
            ['ongoingstatus', '!=', '100%']
        ])->paginate(5);
          $updation_count = DB::table('tenderdetails')->where([
            ['ongoingstatus', '!=', NULL],
            ['panchayath_or_municipal', 'panchayath'],
            ['ongoingstatus', '!=', '100%']
        ])->count();
     return view('panchayath.OngoingComplaint', ['updation' => $updation, 'updation_count' => $updation_count]); 
    } 
    public function mindex()
    {
         $updation = DB::table('tenderdetails')->where([
            ['ongoingstatus', '!=', NULL],
            ['panchayath_or_municipal', 'municipal'],
            ['ongoingstatus', '!=', '100%']
        ])->paginate(5);
          $updation_count = DB::table('tenderdetails')->where([
            ['ongoingstatus', '!=', NULL],
            ['panchayath_or_municipal', 'municipal'],
            ['ongoingstatus', '!=', '100%']
        ])->count();
     return view('municipal.OngoingComplaint', ['updation' => $updation, 'updation_count' => $updation_count]); 
    } 
    public function ongoingstatus(Request $request){
        $complaint_id = request('complaint_id');
        $ongoingstatus = request('ongoingstatus');
        $ongoingstatusdescription = request('ongoingstatusdescription');
        DB::update('update tenderdetails set ongoingstatus=?, ongoingstatusdescription=? where complaint_id = ?',[$ongoingstatus, $ongoingstatusdescription, $complaint_id]);
        return redirect('/assistantengineer/ongoingcomplaint')->with('confirm', 'progress updated and  view below');
    }
    
}
