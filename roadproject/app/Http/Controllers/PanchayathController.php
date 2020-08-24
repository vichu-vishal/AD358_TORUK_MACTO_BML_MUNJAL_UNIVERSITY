<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\PeopleComplaintImage;
use App\RoadInspectionDetail;
use App\FakeComplaint;
use App\EstimationDetail;
use App\EditEstimationDetail;
use App\TenderDetail;
use App\LowLevelComplaint;


class PanchayathController extends Controller
{
    //show all complaints

    public function index(){

    	$complaints = DB::table('peoplecomplaintimages')->where([
            ['panchayath_or_municipal', 'panchayath'],
            ['approval_status', NULL],
        ])->paginate(5); 
        $count = DB::table('peoplecomplaintimages')->where([
            ['panchayath_or_municipal', 'panchayath'],
            ['approval_status', NULL],
        ])->count();

    	return view('panchayath.PendingComplaints', ['complaints' => $complaints, 'count' => $count]);

    }

     public function show($id){

         $complaint = PeopleComplaintImage::findOrFail($id);
    	return view('panchayath.pcshow', ['complaint' => $complaint]);
    }
     public function viewmore($id){ 

         $complaint = PeopleComplaintImage::findOrFail($id);
        return view('panchayath.ApprovedComplaintDetail', ['complaint' => $complaint]);
    }

    public function detail(){
      
    	$count = DB::table('peoplecomplaintimages')->where([
            ['panchayath_or_municipal', 'panchayath'],
            ['approval_status', NULL],
        ])->count();
        $approved_count = DB::table('peoplecomplaintimages')->where([
            ['panchayath_or_municipal', 'panchayath'],
            ['approval_status', 'approved'],
        ])->count();
        $ongoing_count = DB::table('tenderdetails')->where([
            ['ongoingstatus', '!=', NULL],
            ['panchayath_or_municipal', 'panchayath']
        ])->count();
        $finish = DB::table('tenderdetails')->where([
        ['ongoingstatus','100%'],
        ['panchayath_or_municipal', 'panchayath']
       ])->count();

    	 return view('panchayath.pHome', ['count' => $count, 'approved_count' => $approved_count, 'ongoing_count' => $ongoing_count, 'finish' => $finish]);
    }

    public function update($id){
        DB::table('peoplecomplaintimages')
              ->where('id', $id)
              ->update(['approval_status' => 'approved']);
         return redirect('/panchayath/pc')->with('msg','Forwarded to Road Inspector');
    } 

    public function approval(){

        $complaints = DB::table('peoplecomplaintimages')->where([
            ['panchayath_or_municipal', 'panchayath'],
            ['approval_status', 'approved'],
        ])->paginate(5);

 
         $estimationdetail = DB::table('estimationdetails')->get();
         $editestimationdetail = DB::table('editestimationdetails')->get();
         $peoplecomplaint = DB::table('peoplecomplaintimages')->get();
         $inspectiondetail = DB::table('roadinspectiondetails')->get();
         $fakecomplaint = DB::table('fakecomplaints')->get();
         $estimationdetail_lowlevel = DB::table('lowlevelcomplaints')->get();


        return view('panchayath.ApprovedComplaints', ['complaints' => $complaints, 'peoplecomplaint' => $peoplecomplaint, 'inspectiondetail' => $inspectiondetail, 'fakecomplaint' => $fakecomplaint, 'estimationdetail' => $estimationdetail, 
          'editestimationdetail' => $editestimationdetail, 'estimationdetail_lowlevel' => $estimationdetail_lowlevel]);
    }

    
}
