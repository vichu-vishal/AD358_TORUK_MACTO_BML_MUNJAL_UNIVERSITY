<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\PeopleComplaintImage;
use App\RoadInspectionDetail;
use App\FakeComplaint;
use App\EstimationDetail;
use App\EditEstimationDetail;
use App\TenderDetail;
use App\LowLevelComplaint;
use DB;

class MunicipalController extends Controller
{
     public function index(){

    	$complaints = DB::table('peoplecomplaintimages')->where([
            ['panchayath_or_municipal', 'municipal'],
            ['approval_status', NULL],
        ])->get();
        $count = DB::table('peoplecomplaintimages')->where([
            ['panchayath_or_municipal', 'municipal'],
            ['approval_status', NULL],
        ])->count();

    	return view('municipal.PendingComplaints', ['complaints' => $complaints, 'count' => $count]);

    }
    public function recordreport(Request $request){
       
       $data1 = date("Y-m-d",strtotime($request->input('data1')));
       $data2 = date("Y-m-d",strtotime($request->input('data2')));


      $PendingComplaints = PeopleComplaintImage::where([
        ['created_at', '>=', $data1.' 00:00:00'], 
        ['created_at', '<=',  $data2.' 23:59:59'],
        ['approval_status', 'approved'],
        ['damage_level', 'LEVEL 1 (Block,Linear,Transverse,Edge,Joint,Slippage)']
        ]) 
      ->get();
      $PendingComplaintsCount = PeopleComplaintImage::where('created_at', '>=', $data1.' 00:00:00')
      ->where('created_at', '<=',  $data2.' 23:59:59')
      ->where('approval_status', 'approved')
      ->count();
      //dd($approved_estimation_details);
      return view('chart', [
        'PendingComplaints'=>$PendingComplaints, 
        'PendingComplaintsCount' => $PendingComplaintsCount]);
      
    } 

     public function show($id){

         $complaint = PeopleComplaintImage::findOrFail($id);
    	return view('municipal.pcshow', ['complaint' => $complaint]);
    }
     public function viewmore($id){ 

         $complaint = PeopleComplaintImage::findOrFail($id);
        return view('municipal.ApprovedComplaintDetail', ['complaint' => $complaint]);
    }

    public function detail(){
      $finish = DB::table('tenderdetails')->where([
        ['ongoingstatus','100%'],
        ['panchayath_or_municipal', 'municipal']
       ])->count();
    	$count = DB::table('peoplecomplaintimages')->where([
            ['panchayath_or_municipal', 'municipal'],
            ['approval_status', NULL],
        ])->count();
      $approved_count = DB::table('peoplecomplaintimages')->where([
            ['panchayath_or_municipal', 'municipal'],
            ['approval_status', 'approved'],
        ])->count();
      $ongoing_count = DB::table('tenderdetails')->where([
        ['ongoingstatus', '!=', NULL],
        ['panchayath_or_municipal', 'municipal']
      ])->count();

    	 return view('municipal.mHome', ['count' => $count, 'approved_count' => $approved_count, 'ongoing_count' => $ongoing_count, 'finish' => $finish]);
    }

    public function update($id){
        DB::table('peoplecomplaintimages')
              ->where('id', $id)
              ->update(['approval_status' => 'approved']);
         return redirect('/municipal/pc')->with('Municipalmsg','Forwarded to Road Inspector');
    }
 
    public function approval(){

        $complaints = DB::table('peoplecomplaintimages')->where([
            ['panchayath_or_municipal', 'municipal'],
            ['approval_status', 'approved'],
        ])->paginate(5);

         $estimationdetail = DB::table('estimationdetails')->get();
         $editestimationdetail = DB::table('editestimationdetails')->get();
         $peoplecomplaint = DB::table('peoplecomplaintimages')->get();
         $inspectiondetail = DB::table('roadinspectiondetails')->get();
         $fakecomplaint = DB::table('fakecomplaints')->get();
         $estimationdetail_lowlevel = DB::table('lowlevelcomplaints')->get();


 
        return view('municipal.ApprovedComplaints', ['complaints' => $complaints, 'peoplecomplaint' => $peoplecomplaint, 'inspectiondetail' => $inspectiondetail, 'fakecomplaint' => $fakecomplaint, 'estimationdetail' => $estimationdetail, 
          'editestimationdetail' => $editestimationdetail, 'estimationdetail_lowlevel' => $estimationdetail_lowlevel]);
    }
} 
