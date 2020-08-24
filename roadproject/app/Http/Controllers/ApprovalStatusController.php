<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\PeopleComplaintImage;
use App\RoadInspectionDetail;
use App\FakeComplaint;
use App\EstimationDetail;
use App\EditEstimationDetail;
use App\TenderDetail;
use DB;

class ApprovalStatusController extends Controller
{

     public function riapproval(){

        $complaints = DB::table('peoplecomplaintimages')->where(
            
            'approval_status', 'approved'
        )->paginate(5);

 
         $estimationdetail = DB::table('estimationdetails')->get();
         $editestimationdetail = DB::table('editestimationdetails')->get();
         $peoplecomplaint = DB::table('peoplecomplaintimages')->get();
         $inspectiondetail = DB::table('roadinspectiondetails')->get();
         $fakecomplaint = DB::table('fakecomplaints')->get();
         $estimationdetail_lowlevel = DB::table('lowlevelcomplaints')->get();


        return view('roadinspector.Approvalstatus', ['complaints' => $complaints, 'peoplecomplaint' => $peoplecomplaint, 'inspectiondetail' => $inspectiondetail, 'fakecomplaint' => $fakecomplaint, 'estimationdetail' => $estimationdetail, 
          'editestimationdetail' => $editestimationdetail, 'estimationdetail_lowlevel' => $estimationdetail_lowlevel]);
    }
    public function aeapproval(){
$complaints = DB::table('peoplecomplaintimages')->where(
            
            'approval_status', 'approved'
        )->paginate(5);

 
         $estimationdetail = DB::table('estimationdetails')->get();
         $editestimationdetail = DB::table('editestimationdetails')->get();
         $peoplecomplaint = DB::table('peoplecomplaintimages')->get();
         $inspectiondetail = DB::table('roadinspectiondetails')->get();
         $fakecomplaint = DB::table('fakecomplaints')->get();
         $estimationdetail_lowlevel = DB::table('lowlevelcomplaints')->get();


        return view('assistantEngineer.Approvalstatus', ['complaints' => $complaints, 'peoplecomplaint' => $peoplecomplaint, 'inspectiondetail' => $inspectiondetail, 'fakecomplaint' => $fakecomplaint, 'estimationdetail' => $estimationdetail, 
          'editestimationdetail' => $editestimationdetail, 'estimationdetail_lowlevel' => $estimationdetail_lowlevel]);
       
    }
    public function eeapproval(){

       $complaints = DB::table('peoplecomplaintimages')->where(
            
            'approval_status', 'approved'
        )->paginate(5);

 
         $estimationdetail = DB::table('estimationdetails')->get();
         $editestimationdetail = DB::table('editestimationdetails')->get();
         $peoplecomplaint = DB::table('peoplecomplaintimages')->get();
         $inspectiondetail = DB::table('roadinspectiondetails')->get();
         $fakecomplaint = DB::table('fakecomplaints')->get();
         $estimationdetail_lowlevel = DB::table('lowlevelcomplaints')->get();


        return view('executiveEngineer.Approvalstatus', ['complaints' => $complaints, 'peoplecomplaint' => $peoplecomplaint, 'inspectiondetail' => $inspectiondetail, 'fakecomplaint' => $fakecomplaint, 'estimationdetail' => $estimationdetail, 
          'editestimationdetail' => $editestimationdetail, 'estimationdetail_lowlevel' => $estimationdetail_lowlevel]);
       
    }

    
    public function ceapproval(){

        $complaints = DB::table('peoplecomplaintimages')->where(
            
            'approval_status', 'approved'
        )->paginate(5);

 
         $estimationdetail = DB::table('estimationdetails')->get();
         $editestimationdetail = DB::table('editestimationdetails')->get();
         $peoplecomplaint = DB::table('peoplecomplaintimages')->get();
         $inspectiondetail = DB::table('roadinspectiondetails')->get();
         $fakecomplaint = DB::table('fakecomplaints')->get();
         $estimationdetail_lowlevel = DB::table('lowlevelcomplaints')->get();


        return view('chiefEngineer.Approvalstatus', ['complaints' => $complaints, 'peoplecomplaint' => $peoplecomplaint, 'inspectiondetail' => $inspectiondetail, 'fakecomplaint' => $fakecomplaint, 'estimationdetail' => $estimationdetail, 
          'editestimationdetail' => $editestimationdetail, 'estimationdetail_lowlevel' => $estimationdetail_lowlevel]);
    }
}
