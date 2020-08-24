<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\PeopleComplaintImage;
use App\RoadInspectionDetail;
use App\EstimationDetail;
use App\EditEstimationDetail;
use DB;

class ChiefEngineerController extends Controller
{
    public function detail(){
      $pending_estimation_count = DB::table('estimationdetails')
      ->where([
        ['ce_approval_status', NULL],['ee_approval_status', 'approved']
      ]) 
      ->orWhere([
        ['ce_approval_status', NULL],['ee_approval_status', 'edit_approved']
      ])->count();
       $finish = DB::table('tenderdetails')->where('ongoingstatus','100%')->count();
      $approved_estimation_count = DB::table('estimationdetails')
      ->where('ce_approval_status', 'approved')->count();

      //pending count for level1
      $pending_estimation_count_level1 = DB::table('estimationdetails')
      ->where([
        ['ce_approval_status', NULL],['ee_approval_status', 'approved'],['damage_level', 'LEVEL 1 (Block,Linear,Transverse,Edge,Joint,Slippage)']
      ]) 
      ->orWhere([
        ['ce_approval_status', NULL],['ee_approval_status', 'edit_approved'],['damage_level', 'LEVEL 1 (Block,Linear,Transverse,Edge,Joint,Slippage)']
      ])->count();

      //pending count for level2
      $pending_estimation_count_level2 = DB::table('estimationdetails')
      ->where([
        ['ce_approval_status', NULL],['ee_approval_status', 'approved'],['damage_level', 'LEVEL 2 (Pot Holes,Rutting,Shoving,Upheavel,Hoving)']
      ]) 
      ->orWhere([
        ['ce_approval_status', NULL],['ee_approval_status', 'edit_approved'],['damage_level', 'LEVEL 2 (Pot Holes,Rutting,Shoving,Upheavel,Hoving)']
      ])->count();

      //pending count for level3
      $pending_estimation_count_level3 = DB::table('estimationdetails')
      ->where([
        ['ce_approval_status', NULL],['ee_approval_status', 'approved'],['damage_level', 'LEVEL 3 (Severe Damage(Unusable Road))']
      ]) 
      ->orWhere([
        ['ce_approval_status', NULL],['ee_approval_status', 'edit_approved'],['damage_level', 'LEVEL 3 (Severe Damage(Unusable Road))']
      ])->count();

      //pending count for level4
      $pending_estimation_count_level4 = DB::table('estimationdetails')
      ->where([
        ['ce_approval_status', NULL],['ee_approval_status', 'approved'],['damage_level', 'LEVEL 4 (Construction Of New Road Required)']
      ]) 
      ->orWhere([
        ['ce_approval_status', NULL],['ee_approval_status', 'edit_approved'],['damage_level', 'LEVEL 4 (Construction Of New Road Required)']
      ])->count();

      //level 1
      $approved_estimation_count_level1 = DB::table('estimationdetails')
      ->where([
        ['ce_approval_status', 'approved'],['damage_level', 'LEVEL 1 (Block,Linear,Transverse,Edge,Joint,Slippage)']
      ])->count();

      //level 2
      $approved_estimation_count_level2 = DB::table('estimationdetails')
      ->where([
        ['ce_approval_status', 'approved'],['damage_level', 'LEVEL 2 (Pot Holes,Rutting,Shoving,Upheavel,Hoving)']
      ])->count();

      //level 3
      $approved_estimation_count_level3 = DB::table('estimationdetails')
      ->where([
        ['ce_approval_status', 'approved'],['damage_level', 'LEVEL 3 (Severe Damage(Unusable Road))']
      ])->count();

      //level 4
      $approved_estimation_count_level4 = DB::table('estimationdetails')
      ->where([
        ['ce_approval_status', 'approved'],['damage_level', 'LEVEL 4 (Construction Of New Road Required)']
      ])->count();

    	return view('chiefEngineer.ceHome', [
        'finish' => $finish,
        'pending_estimation_count'=>$pending_estimation_count, 
        'approved_estimation_count' => $approved_estimation_count,
        'approved_estimation_count_level1' => $approved_estimation_count_level1,
        'approved_estimation_count_level2' => $approved_estimation_count_level2,
        'approved_estimation_count_level3' => $approved_estimation_count_level3,
        'approved_estimation_count_level4' => $approved_estimation_count_level4,
        'pending_estimation_count_level1' => $pending_estimation_count_level1,
        'pending_estimation_count_level2' => $pending_estimation_count_level2,
        'pending_estimation_count_level3' => $pending_estimation_count_level3,
        'pending_estimation_count_level4' => $pending_estimation_count_level4 
      ]);
    }
    public function report(Request $request){
     
      $data = request('data');
      $approved_estimation_details = EstimationDetail::where('id', $data)
      ->orWhere('state', $data)
      ->orWhere('road_name', $data)
      ->orWhere('city_or_village', $data)
      ->orWhere('district', $data)
      ->orWhere('damage_level', $data)
      ->orWhere('road_number', $data)
      ->get();
      $approved_estimation_details_count = EstimationDetail::where('id', $data)
      ->orWhere('state', $data)
      ->orWhere('road_name', $data)
      ->orWhere('city_or_village', $data)
      ->orWhere('district', $data)
      ->orWhere('damage_level', $data)
      ->orWhere('road_number', $data)
      ->count();
      return view('chiefEngineer.EstimationApproved', ['approved_estimation_details' => $approved_estimation_details, 'approved_estimation_details_count' => $approved_estimation_details_count]);
    }

 

    public function recordreport(Request $request){
       
       $data1 = date("Y-m-d",strtotime($request->input('data1')));
       $data2 = date("Y-m-d",strtotime($request->input('data2')));


      $approved_estimation_details = EstimationDetail::orWhere([
        ['created_at', '>=', $data1.' 00:00:00'], 
        ['created_at', '<=',  $data2.' 23:59:59'],
        ])
      ->get();
      $approved_estimation_details_count = EstimationDetail::where('created_at', '>=', $data1.' 00:00:00')
      ->where('created_at', '<=',  $data2.' 23:59:59')
      ->count();
      $total_count = EstimationDetail::all()->count(); 
      //dd($approved_estimation_details);
      return view('chiefEngineer.record', [
        'approved_estimation_details'=>$approved_estimation_details, 
        'approved_estimation_details_count' => $approved_estimation_details_count, 'data1'=> $data1, 'data2' => $data2, 'total_count' => $total_count]);
      
    }

    public function index(){
      $count = DB::table('estimationdetails')
      ->where([
        ['ce_approval_status', NULL],['ee_approval_status', 'approved']
      ]) 
      ->orWhere([
        ['ce_approval_status', NULL],['ee_approval_status', 'edit_approved']
      ])->count();

    	$pending_estimation_ae_ee = DB::table('estimationdetails')
      ->where([
            ['ce_approval_status', NULL],['ee_approval_status', 'approved']    
        ]) 
      ->orWhere([
        ['ce_approval_status', NULL],['ee_approval_status', 'edit_approved']
      ])->get();
        return view('chiefEngineer.PendingEstimation',
         ['pending_estimation_ae_ee' => $pending_estimation_ae_ee, 'count' =>  $count]);
    }

     public function list(){
        $approved_estimation_details_count = DB::table('estimationdetails')
        ->where('ce_approval_status', 'approved')->count();
        $approved_estimation_details = DB::table('estimationdetails')
        ->where('ce_approval_status', 'approved')->get();
        return view('chiefEngineer.EstimationApproved', ['approved_estimation_details'=>$approved_estimation_details, 'approved_estimation_details_count' => $approved_estimation_details_count]);
      }
     public function listshow($id){
      $estimation_detail = EstimationDetail::findOrFail($id);
        
        return view('chiefEngineer.EstimationApprovedShow', 
            ['estimation_detail' => $estimation_detail]);
     }

     public function show($id){
         
         $estimation_detail = EstimationDetail::findOrFail($id);
        
        return view('chiefEngineer.peshow', 
            ['estimation_detail' => $estimation_detail]);
    }

     public function peshow($id){
         
         $estimation_edit_detail = EditEstimationDetail::findOrFail($id);
        
        return view('chiefEngineer.editpeshow', 
            ['estimation_edit_detail' => $estimation_edit_detail]);
    }

    public function update($complaint_id){
         DB::table('estimationdetails')
              ->where('complaint_id', $complaint_id)
              ->update(['ce_approval_status' => 'approved']);
         
         //update the road ispector table
         DB::table('roadinspectiondetails')
              ->where('complaint_id', $complaint_id)
              ->update(['ce_approval_status' => 'approved']);
        //update people complaint table
         DB::table('peoplecomplaintimages')
              ->where('id', $complaint_id)
              ->update(['ce_approval_status' => 'approved']);  
        //update the edit estimation table
          DB::table('editestimationdetails')
              ->where('complaint_id', $complaint_id)
              ->update(['ce_approval_status' => 'approved']);
        $now = now()->toDateTimeString();
           DB::update('update estimationdetails set seenbyce=? where complaint_id = ?',[$now, $complaint_id]);
        


         return redirect('/chiefEngineer')->with('msg','The complaint forwarded to Chief engineer');
    }
    


}
