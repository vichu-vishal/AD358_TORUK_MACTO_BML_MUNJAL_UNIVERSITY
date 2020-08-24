<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\PeopleComplaintImage;
use App\RoadInspectionDetail;
use App\WorkUpdation;
use App\LowLevelComplaint;
use Illuminate\Support\Facades\DB; 



class RoadInspectorController extends Controller
{
    public function index(){

    	$panchayath_complaints = DB::table('peoplecomplaintimages')->where([
            ['panchayath_or_municipal', 'panchayath'],
            ['approval_status', 'approved'],
            ['ri_approval_status', NULL ],
        ])
        
        ->get();

        $municipal_complaints = DB::table('peoplecomplaintimages')->where([
            ['panchayath_or_municipal', 'municipal'],
            ['approval_status', 'approved'],
            ['ri_approval_status', NULL ],
        ])->get();

        $panchayath_count = DB::table('peoplecomplaintimages')->where([
            ['panchayath_or_municipal', 'panchayath'],
            ['approval_status', 'approved'],
            ['ri_approval_status', NULL ],
        ])->count();
        $municipal_count = DB::table('peoplecomplaintimages')->where([
            ['panchayath_or_municipal', 'municipal'],
            ['approval_status', 'approved'],
            ['ri_approval_status', NULL ],
        ])->count();

    	return view('roadinspector.PendingComplaints', ['panchayath_complaints' => $panchayath_complaints, 'municipal_complaints' => $municipal_complaints, 'panchayath_count' => $panchayath_count, 'municipal_count' => $municipal_count ]);

    }

    public function detail(){
         $finish = DB::table('tenderdetails')->where('ongoingstatus','100%')->count();
        $panchayath_count = DB::table('peoplecomplaintimages')->where([
            ['panchayath_or_municipal', 'panchayath'],
            ['approval_status', 'approved'],
            ['ri_approval_status', NULL ],
        ])->count();
        $municipal_count = DB::table('peoplecomplaintimages')->where([
            ['panchayath_or_municipal', 'municipal'],
            ['approval_status', 'approved'],
            ['ri_approval_status', NULL ],
        ])->count();
        $panchayath_pending_complaint_count = DB::table('peoplecomplaintimages')->where([
            ['panchayath_or_municipal', 'panchayath'],
            ['ri_approval_status', NULL],
        ])->count();
         $municipal_pending_complaint_count = DB::table('peoplecomplaintimages')->where([
            ['panchayath_or_municipal', 'municipal'],
            ['ri_approval_status', NULL],
        ])->count();
        $panchayath_inspection_complaint_count = DB::table('peoplecomplaintimages')->where([
            ['panchayath_or_municipal', 'panchayath'],
            ['ri_approval_status','!=', NULL ],
        ])->count();
        $municipal_inspection_complaint_count = DB::table('peoplecomplaintimages')->where([
            ['panchayath_or_municipal', 'municipal'],
            ['ri_approval_status','!=', NULL ],
        ])->count();
        
         $complaints_riapproved_panchayath_count = DB::table('roadinspectiondetails')->where(
            'panchayath_or_municipal', 'panchayath'
        )->count();
         $complaints_riapproved_municipal_count = DB::table('roadinspectiondetails')->where(
            'panchayath_or_municipal', 'municipal'
        )->count();
         $complaints_rideclined_panchayath_count = DB::table('fakecomplaints')->where(
            'panchayath_or_municipal', 'panchayath'
        )->count();
         $complaints_rideclined_municipal_count = DB::table('fakecomplaints')->where(
            'panchayath_or_municipal', 'municipal'
        )->count();

         return view('roadinspector.riHome', ['panchayath_count' => $panchayath_count, 
            'finish' => $finish,
            'municipal_count' => $municipal_count, 
            'municipal_inspection_complaint_count' => $municipal_inspection_complaint_count,
            'municipal_pending_complaint_count' => $municipal_pending_complaint_count,
            'complaints_riapproved_panchayath_count' =>  $complaints_riapproved_panchayath_count,
            'complaints_riapproved_municipal_count' => $complaints_riapproved_municipal_count,
            'complaints_rideclined_panchayath_count' => $complaints_rideclined_panchayath_count,
            'complaints_rideclined_municipal_count' => $complaints_rideclined_municipal_count,
            'panchayath_pending_complaint_count' => $panchayath_pending_complaint_count,
            'panchayath_inspection_complaint_count' => $panchayath_inspection_complaint_count
        ]);
    } 

    public function inspectiondetails(){

        $complaints_riapproved_panchayath = DB::table('roadinspectiondetails')->where(
            'panchayath_or_municipal', 'panchayath'
        )->get();
       
        $complaints_riapproved_municipal = DB::table('roadinspectiondetails')->where(
            'panchayath_or_municipal', 'municipal'
        )->get();
         
        $complaints_rideclined_panchayath = DB::table('fakecomplaints')->where(
            'panchayath_or_municipal', 'panchayath'
        )->get();
        $complaints_rideclined_municipal = DB::table('fakecomplaints')->where(
            'panchayath_or_municipal', 'municipal'
        )->get();

         $complaints_riapproved_panchayath_count = DB::table('roadinspectiondetails')->where(
            'panchayath_or_municipal', 'panchayath'
        )->count();
         $complaints_riapproved_municipal_count = DB::table('roadinspectiondetails')->where(
            'panchayath_or_municipal', 'municipal'
        )->count();
         $complaints_rideclined_panchayath_count = DB::table('fakecomplaints')->where(
            'panchayath_or_municipal', 'panchayath'
        )->count();
         $complaints_rideclined_municipal_count = DB::table('fakecomplaints')->where(
            'panchayath_or_municipal', 'municipal'
        )->count();
         
        return view('roadinspector.UploadedInspectionDetails', 
            ['complaints_riapproved_panchayath' => $complaints_riapproved_panchayath, 
            'complaints_rideclined_panchayath' => $complaints_rideclined_panchayath, 
            'complaints_riapproved_municipal' => $complaints_riapproved_municipal, 
            'complaints_rideclined_municipal' => $complaints_rideclined_municipal,
            'complaints_riapproved_panchayath_count' => $complaints_riapproved_panchayath_count,
            'complaints_riapproved_municipal_count' => $complaints_riapproved_municipal_count,
            'complaints_rideclined_panchayath_count' => $complaints_rideclined_panchayath_count,
            'complaints_rideclined_municipal_count' => $complaints_rideclined_municipal_count

            ]);
    }

    public function approval(){

        $complaints_panchayath = DB::table('peoplecomplaintimages')->where([
            ['panchayath_or_municipal', 'panchayath'],
            ['approval_status', 'approved'],
            ['ri_approval_status', 'approved']
        ])->paginate(5);
        
        $complaints_panchayath_count = DB::table('peoplecomplaintimages')->where([
            ['panchayath_or_municipal', 'panchayath'],
            ['approval_status', 'approved'],
            ['ri_approval_status', 'approved']
        ])->count();
         $complaints_municipal = DB::table('peoplecomplaintimages')->where([
            ['panchayath_or_municipal', 'municipal'],
            ['approval_status', 'approved'],
            ['ri_approval_status', 'approved']
        ])->paginate(5);
          $complaints_municipal_count = DB::table('peoplecomplaintimages')->where([
            ['panchayath_or_municipal', 'municipal'],
            ['approval_status', 'approved'],
            ['ri_approval_status', 'approved']
        ])->count();

         $estimationdetail = DB::table('estimationdetails')->get();
         $editestimationdetail = DB::table('editestimationdetails')->get();
         $peoplecomplaint = DB::table('peoplecomplaintimages')->get();
         $inspectiondetail = DB::table('roadinspectiondetails')->get();
         $fakecomplaint = DB::table('fakecomplaints')->get();
         $estimationdetail_lowlevel = DB::table('lowlevelcomplaints')->get();


 

        return view('roadinspector.ApprovalStatus', ['complaints_panchayath' => $complaints_panchayath,'complaints_municipal' => $complaints_municipal, 'peoplecomplaint' => $peoplecomplaint, 'inspectiondetail' => $inspectiondetail, 'fakecomplaint' => $fakecomplaint, 'estimationdetail' => $estimationdetail, 
          'editestimationdetail' => $editestimationdetail, 'complaints_panchayath_count' => $complaints_panchayath_count, 'complaints_municipal_count' => $complaints_municipal_count, 'estimationdetail_lowlevel' => $estimationdetail_lowlevel]);
    }

    

   

    public function show($id){

         $complaint = PeopleComplaintImage::findOrFail($id);
        return view('roadinspector.pcshow', ['complaint' => $complaint]);
    }



     public function create($id){

        $complaint = PeopleComplaintImage::findOrFail($id);
        return view('roadinspector.create', ['complaint' => $complaint]);
    }

    public function store(Request $request){

          $this->validate(request(), [
            'complaint_id' => 'required',
            'state' => 'required',
            'district' => 'required',
            'panchayath_or_municipal' => 'required',
            'city_or_village' => 'required',
            'RoadSize_Length' => 'required',
            'RoadSize_Breadth' => 'required',
            'budget' => 'required',
            'totalCost' => 'required',
            'damage_level' => 'required',
            'additional_inspection_description' => 'required',
                'image'   =>  'required',  
                'repairmethod' => 'required',
                'trafficintense' => 'required'
        ]);
        

        $riDetail = new RoadInspectionDetail();
        
        
        $riDetail->complaint_id = request('complaint_id');
        $riDetail->state  = request('state');
        $riDetail->district = request('district');
        $riDetail->panchayath_or_municipal = request('panchayath_or_municipal');
        $riDetail->city_or_village = request('city_or_village');
        $riDetail->road_name = request('road_name');
        $riDetail->road_number = request('road_number');
        $riDetail->RoadSize_Length = request('RoadSize_Length');
        $riDetail->RoadSize_Breadth = request('RoadSize_Breadth');
        $riDetail->budget = request('budget');
        $riDetail->totalCost = request('totalCost');
        $riDetail->damage_level = request('damage_level');
        $riDetail->repairmethod = request('repairmethod');
        $riDetail->trafficintense = request('trafficintense');
        $riDetail->additional_inspection_description = request('additional_inspection_description');
       
        //image
        if ($file = $request->hasFile('image')) 
        {
            
           $file = $request->File('image'); 
           $filename = $file->getClientoriginalName();
           $destinationPath =  $request->image->storeAs('images/RoadInspectionImage',$filename,'public');
           $file->move($destinationPath,$filename);
           $riDetail->inspection_image = $filename ;
           
        }

        $riDetail->save();
       
         DB::table('peoplecomplaintimages')
              ->where('id', request('complaint_id'))
              ->update(['ri_approval_status' => 'approved']);
       
        
        return redirect('/roadinspector/pc')->with('approvedmsg',' Forwarded to Assistant engineer');
        
    }

}
