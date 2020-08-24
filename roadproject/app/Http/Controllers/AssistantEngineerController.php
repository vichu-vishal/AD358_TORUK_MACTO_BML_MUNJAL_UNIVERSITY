<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\RoadInspectionDetail;
use App\EstimationDetail;
use App\LowLevelComplaint;
use Illuminate\Support\Facades\DB;



class AssistantEngineerController extends Controller
{
    public function detail(){
        $finish = DB::table('tenderdetails')->where('ongoingstatus','100%')->count();
    	$count = DB::table('roadinspectiondetails')->where([
            ['ae_approval_status', NULL],
            ['damage_level', 'LEVEL 4 (Construction Of New Road Required)']
            
        ])->count();
      $count_lowlevel = DB::table('roadinspectiondetails')->where([
            ['ae_approval_status', NULL],
            ['damage_level', '!=', 'LEVEL 4 (Construction Of New Road Required)']
            
        ])->count();
        $approved_count = DB::table('roadinspectiondetails')->where(
            'ae_approval_status', 'approved'    
        )->count();

        //level 1
      $approved_estimation_count_level1 = DB::table('estimationdetails')
      ->where('damage_level', 'LEVEL 1 (Block,Linear,Transverse,Edge,Joint,Slippage)'
      )->count();

      //level 2
      $approved_estimation_count_level2 = DB::table('estimationdetails')
      ->where('damage_level', 'LEVEL 2 (Pot Holes,Rutting,Shoving,Upheavel,Hoving)')->count();

      //level 3
      $approved_estimation_count_level3 = DB::table('estimationdetails')
      ->where('damage_level', 'LEVEL 3 (Severe Damage(Unusable Road))')->count();

      //level 4
      $approved_estimation_count_level4 = DB::table('estimationdetails')
      ->where('damage_level', 'LEVEL 4 (Construction Of New Road Required)')->count();

         $estimation_details_uploaded_count = DB::table('estimationdetails')->count();
    	 return view('assistantEngineer.aeHome', ['count' => $count,
            'finish' => $finish,
            'count_lowlevel' => $count_lowlevel,
            'approved_count' => $approved_count, 
            'estimation_details_uploaded_count' => $estimation_details_uploaded_count,
            'approved_estimation_count_level1' => $approved_estimation_count_level1,
            'approved_estimation_count_level2' => $approved_estimation_count_level2,
            'approved_estimation_count_level3' => $approved_estimation_count_level3,
            'approved_estimation_count_level4' => $approved_estimation_count_level4
        ]);
    }

    public function index(){
      $count = DB::table('roadinspectiondetails')->where([
            ['ae_approval_status', NULL],
            ['damage_level', 'LEVEL 4 (Construction Of New Road Required)']
            
        ])->count();
      $count_lowlevel = DB::table('roadinspectiondetails')->where([
            ['ae_approval_status', NULL],
            ['damage_level', '!=', 'LEVEL 4 (Construction Of New Road Required)']
            
        ])->count();

    	$complaint_inspection_details = DB::table('roadinspectiondetails')->where([
            ['ae_approval_status', NULL],
            ['damage_level', 'LEVEL 4 (Construction Of New Road Required)']
            
        ])->orderBy('trafficintense', 'desc')->paginate(5);
      $complaint_inspection_details_lowlevel = DB::table('roadinspectiondetails')->where([
            ['ae_approval_status', NULL],
            ['damage_level', '!=', 'LEVEL 4 (Construction Of New Road Required)']
            
        ])->orderBy('trafficintense', 'desc')->paginate(5);

    	return view('assistantEngineer.PendingComplaints', ['complaint_inspection_details' => $complaint_inspection_details, 'count' => $count, 'count_lowlevel' => $count_lowlevel,
        'complaint_inspection_details_lowlevel' => $complaint_inspection_details_lowlevel]);

    }

    public function estimationdetails(){

        $estimated_details = DB::table('estimationdetails')->paginate(5);
        $people = DB::table('peoplecomplaintimages')->get();
        $estimated_details_lowlevel = DB::table('lowlevelcomplaints')->paginate(5);
        return view('assistantEngineer.EstimationUploadedDetails', ['estimated_details' => $estimated_details, 'people' => $people, 'estimated_details_lowlevel' => $estimated_details_lowlevel]);
    } 

    public function show($id){

         $complaint_inspection_detail = RoadInspectionDetail::findOrFail($id);
    	return view('assistantEngineer.pcshow', ['complaint_inspection_detail' => $complaint_inspection_detail]);
    }
    public function view($id){

         $complaint_inspection_detail = RoadInspectionDetail::findOrFail($id);
      return view('assistantEngineer.ViewEstimationDetail', ['complaint_inspection_detail' => $complaint_inspection_detail]);
    }

    public function create($id){

        $complaint = RoadInspectionDetail::findOrFail($id);
        return view('assistantEngineer.create', ['complaint' => $complaint]);
    }
    public function lowlevel($id){

        $complaint = RoadInspectionDetail::findOrFail($id);
        return view('assistantEngineer.CreateLowLevel', ['complaint' => $complaint]);
    }
    

     public function store(Request $request){


          $this->validate(request(), [
            'complaint_id' => 'required',
            'state' => 'required',
            'district' => 'required',
            'city_or_village' => 'required',
            'road_name' => 'required',
            'road_number' => 'required',
            'RoadSize_Length' => 'required',
            'damage_level' => 'required',
            'mazon' => 'required',
             'mazon_cost' => 'required',
              'mazdoor_cost' => 'required',
               'mazdoor' => 'required',
                'equipment' => 'required',
                'equipment_quantity' => 'required',
                'equipment_cost' => 'required',
                'roadfurnitures' => 'required',
                'roadfurnitures_quantity' => 'required',
                'roadfurnitures_cost' => 'required',
                'total_estimation_cost' => 'required',
               
                
        ]);

        $ri = new EstimationDetail();
        $ri->complaint_id = request('complaint_id');
        $ri->state = request('state');
        $ri->district = request('district');
        $ri->city_or_village = request('city_or_village');
        $ri->road_name = request('road_name');
        $ri->road_number = request('road_number');
        $ri->RoadSize_Length = request('RoadSize_Length');
        $ri->RoadSize_Breadth = request('RoadSize_Breadth');
        $ri->damage_level = request('damage_level');
        $ri->mazon = request('mazon');
        $ri->mazon_cost = request('mazon_cost');
        $ri->mazdoor_cost = request('mazdoor_cost');
        $ri->mazdoor = request('mazdoor');
        $ri->equipment = request('equipment');
        $ri->equipment_quantity = request('equipment_quantity');
        $ri->equipment_cost = request('equipment_cost');
        $ri->roadfurnitures = request('roadfurnitures');
        $ri->roadfurnitures_quantity = request('roadfurnitures_quantity');
        $ri->roadfurnitures_cost = request('roadfurnitures_cost');
        $ri->total_estimation_cost = request('total_estimation_cost');

        

        /*if ($file = $request->hasFile('image'))
        {
            $file=$request->File('image');
            $filename=$file->getClientoriginalName();
            $destinationpath=$request->image->store('images');
            $file->move($destinationpath,$filename);
            $ri->imagename=$filename;



        }*/

        $ri->save();
        //update the road ispector table
         DB::table('roadinspectiondetails')
              ->where('complaint_id', request('complaint_id'))
              ->update(['ae_approval_status' => 'approved']);
        //update people complaint table
         DB::table('peoplecomplaintimages')
              ->where('id', request('complaint_id'))
              ->update(['ae_approval_status' => 'approved']);      

        return redirect('/assistantengineer/pc')->with('estimated_msg','estimated and forwarded to Executive engineer');
    }


}
