<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\LowLevelComplaint;
use App\RoadInspectionDetail;
use App\EstimationDetail;


class LowLevelComplaintController extends Controller
{

    public function update($complaint_id){
         DB::table('peoplecomplaintimages')
              ->where('id', $complaint_id)
              ->update(['transactionstatus' => 'credited']);

        


         return redirect('/assistantengineer/estimationdetails')->with('msg','succesfully updated');
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
            'RoadSize_Breadth' => 'required',
            'damage_level' => 'required',
            
             'roadType' => 'required',
              'repairMethodology' => 'required',
               'Estimatedamount' => 'required',
                'Budjet' => 'required',
                'FundScheme' => 'required',
                'AccountName' => 'required',
                'AccountNumber' => 'required',
                'IFSC_Code' => 'required',
                'Branch_name' => 'required',
                'Bank_name' => 'required',
              
                
        ]);

        $lowlevel = new LowLevelComplaint();
         $lowlevel->complaint_id = request('complaint_id');
         $lowlevel->state = request('state');
         $lowlevel->district = request('district');
         $lowlevel->city_or_village = request('city_or_village');
         $lowlevel->road_name = request('RoadSize_Length');
         $lowlevel->road_number = request('RoadSize_Breadth');
         $lowlevel->RoadSize_Length = request('damage_level');
         $lowlevel->RoadSize_Breadth = request('road_name');
         $lowlevel->damage_level = request('road_number');
         $lowlevel->roadType = request('roadType');
         $lowlevel->repairMethodology = request('repairMethodology');
         $lowlevel->Estimatedamount = request('Estimatedamount');
         $lowlevel->Budjet = request('Budjet');
         $lowlevel->FundScheme = request('FundScheme');
         $lowlevel->AccountNumber = request('AccountNumber');
         $lowlevel->AccountName = request('AccountName');
         $lowlevel->IFSC_Code = request('IFSC_Code');
         $lowlevel->Branch_name = request('Branch_name');
         $lowlevel->Bank_name = request('Bank_name');

        $lowlevel->save();
        //update the road ispector table
         DB::table('roadinspectiondetails')
              ->where('complaint_id', request('complaint_id'))
              ->update(['ae_approval_status' => 'lowlevelapproved']);
        //update people complaint table
         DB::table('peoplecomplaintimages')
              ->where('id', request('complaint_id'))
              ->update(['ae_approval_status' => 'lowlevelapproved']);      

          return redirect('/assistantengineer')->with('lowlevelestimationmsg','Successfully estimated');
    }

}
