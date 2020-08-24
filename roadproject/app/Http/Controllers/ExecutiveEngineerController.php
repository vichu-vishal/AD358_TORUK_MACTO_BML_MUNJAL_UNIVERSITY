<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\PeopleComplaintImage;
use App\RoadInspectionDetail;
use App\EstimationDetail;
use App\EditEstimationDetail;
use App\TenderDetail;
use Illuminate\Support\Facades\DB;

class ExecutiveEngineerController extends Controller
{
    
    public function demo(){
        $count = DB::table('estimationdetails')->where(
            'ee_approval_status', NULL    
        )->count();
        $count_estimation_count = DB::table('estimationdetails')->where(
            'ee_approval_status', 'approved'   
        )->count();
        return view('chart', ['count' => $count, 'count_estimation_count' => $count_estimation_count]);
    }
    public function detail(){
    	$count = DB::table('estimationdetails')->where(
            'ee_approval_status', NULL    
        )->count();
        $estimation_count = DB::table('estimationdetails')->where('ee_approval_status','approved')->orWhere('ee_approval_status','edit_approved')->count();

        $finish = DB::table('tenderdetails')->where('ongoingstatus','100%')->count();
      

        //level 1
      $approved_estimation_count_level1 = DB::table('estimationdetails')
      ->where([
        ['ee_approval_status', 'approved'],['damage_level', 'LEVEL 1 (Block,Linear,Transverse,Edge,Joint,Slippage)']
      ])
      ->orWhere([
        ['ee_approval_status', 'edit_approved'],['damage_level', 'LEVEL 1 (Block,Linear,Transverse,Edge,Joint,Slippage)']
      ])
      ->count();

      //level 2
      $approved_estimation_count_level2 = DB::table('estimationdetails')
      ->where([
        ['ee_approval_status', 'approved'],['damage_level', 'LEVEL 2 (Pot Holes,Rutting,Shoving,Upheavel,Hoving)']
      ])
       ->orWhere([
        ['ee_approval_status', 'edit_approved'],['damage_level', 'LEVEL 2 (Pot Holes,Rutting,Shoving,Upheavel,Hoving)']
      ])
      ->count();

      //level 3
      $approved_estimation_count_level3 = DB::table('estimationdetails')
      ->where([
        ['ee_approval_status', 'approved'],['damage_level', 'LEVEL 3 (Severe Damage(Unusable Road))']
      ])
      ->orWhere([
        ['ee_approval_status', 'edit_approved'],['damage_level', 'LEVEL 3 (Severe Damage(Unusable Road))']
      ])
      ->count();

      //level 4
      $approved_estimation_count_level4 = DB::table('estimationdetails')
      ->where([
        ['ee_approval_status', 'approved'],['damage_level', 'LEVEL 4 (Construction Of New Road Required)']
      ])
      ->orWhere([
        ['ee_approval_status', 'edit_approved'],['damage_level', 'LEVEL 4 (Construction Of New Road Required)']
      ])
      ->count();

    	return view('executiveEngineer.eeHome', ['count' => $count, 'estimation_count' => $estimation_count, 'approved_estimation_count_level1' => $approved_estimation_count_level1, 'approved_estimation_count_level2' => $approved_estimation_count_level2, 'approved_estimation_count_level3' => $approved_estimation_count_level3, 'approved_estimation_count_level4' => $approved_estimation_count_level4, 'finish' => $finish]);
    }

 
    public function index(){

    	$count = DB::table('estimationdetails')->where(
            'ee_approval_status', NULL    
        )->count();
      $estimation_count = DB::table('estimationdetails')->where('ee_approval_status','approved')->orWhere('ee_approval_status','edit_approved')->count();

    	$estimation_details = DB::table('estimationdetails')->where(
    		'ee_approval_status', NULL
    	)->get();
    	return view('executiveEngineer.PendingEstimation',['estimation_details' => $estimation_details, 'count' => $count, 'estimation_count' => $estimation_count]);
    }  

    public function show($id){
    	 
         $estimation_detail = EstimationDetail::findOrFail($id);
    	return view('executiveEngineer.peshow', 
    		['estimation_detail' => $estimation_detail]);
    }

    public function update($complaint_id){
         DB::table('estimationdetails')
              ->where('complaint_id', $complaint_id)
              ->update(['ee_approval_status' => 'approved']);
         //update the road ispector table
         DB::table('roadinspectiondetails')
              ->where('complaint_id', $complaint_id)
              ->update(['ee_approval_status' => 'approved']);
        //update people complaint table
         DB::table('peoplecomplaintimages')
              ->where('id', $complaint_id)
              ->update(['ee_approval_status' => 'approved']);  

          $now = now()->toDateTimeString();
           DB::update('update estimationdetails set seenbyee=? where complaint_id = ?',[$now, $complaint_id]);
         return redirect('/executiveEngineer/pe')->with('msg','The complaint forwarded to Chief engineer');
    }

    public function editestimationdetails($id){
    		$complaint = EstimationDetail::findOrFail($id);
        return view('executiveEngineer.Edit_Estimation_Detail', ['complaint' => $complaint]);
    }
 
    public function uploadedestimationdetail(){
    	$UploadedEstimationDetail = DB::table('estimationdetails')->where('ee_approval_status','approved')->orWhere('ee_approval_status','edit_approved')->paginate(5);
      $UploadedEstimationDetail_count = DB::table('estimationdetails')->where('ee_approval_status','approved')->orWhere('ee_approval_status','edit_approved')->count();
    	return view('executiveEngineer.UploadedEstimationDetail', 
    		['UploadedEstimationDetail' => $UploadedEstimationDetail, 'UploadedEstimationDetail_count' => $UploadedEstimationDetail_count]);
    }

    public function uploaded($id){
       
         $estimation_detail = EstimationDetail::findOrFail($id);
        
      return view('executiveEngineer.UploadedEstimation', ['estimation_detail' => $estimation_detail]);

    }



    public function store(Request $request){
    	    $ee = new EditEstimationDetail();
    	  $ee->complaint_id = request('complaint_id');
        $ee->state = request('state');
        $ee->district = request('district');
        $ee->city_or_village = request('city_or_village');
        $ee->road_name = request('road_name');
        $ee->road_number = request('road_number');
        $ee->RoadSize_Length = request('RoadSize_Length');
        $ee->RoadSize_Breadth = request('RoadSize_Breadth');
        $ee->damage_level = request('damage_level');
        $ee->total_estimation_cost = request('total_estimation_cost');
        $ee->mazon = request('mazon');
        $ee->mazon_cost = request('mazon_cost');
        $ee->mazdoor_cost = request('mazdoor_cost');
        $ee->mazdoor = request('mazdoor');
        $ee->equipment = request('equipment');
        $ee->equipment_quantity = request('equipment_quantity');
        $ee->equipment_cost = request('equipment_cost');
        $ee->roadfurnitures = request('roadfurnitures');
        $ee->roadfurnitures_quantity = request('roadfurnitures_quantity');
        $ee->roadfurnitures_cost = request('roadfurnitures_cost');

         $ee->save();

         //update the road ispector table
         DB::table('roadinspectiondetails')
              ->where('complaint_id', request('complaint_id'))
              ->update(['ee_approval_status' => 'approved']);
        //update people complaint table
         DB::table('peoplecomplaintimages')
              ->where('id', request('complaint_id'))
              ->update(['ee_approval_status' => 'approved']);  
        //update people complaint table
         DB::table('estimationdetails')
              ->where('complaint_id', request('complaint_id'))
              ->update(['ee_approval_status' => 'edit_approved']); 
          $now = now()->toDateTimeString();
          $complaint_id = request('complaint_id');
           DB::update('update estimationdetails set seenbyee=? where complaint_id = ?',[$now, $complaint_id]); 


        // return "edited and forwarded";
              return redirect('/executiveEngineer/pe')->with('editForwardmsg',' Forwarded to Chief engineer'); 
    }
}
