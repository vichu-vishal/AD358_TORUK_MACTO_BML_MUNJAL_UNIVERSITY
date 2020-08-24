<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\PeopleComplaintImage;
use App\RoadInspectionDetail;
use App\EstimationDetail;
use App\EditEstimationDetail;
use App\TenderDetail;
use App\WorkUpdation;
use Illuminate\Support\Facades\DB; 


class TenderDetailController extends Controller
{
    public function index(){
     $tender = TenderDetail::all();
     $tender_count = TenderDetail::all()->count();
     return view('chiefEngineer.ViewTenderDetail', ['tender' => $tender, 'tender_count' => $tender_count]);

    }
    public function update($id){
     $tender = TenderDetail::findOrFail($id);
     return view('assistantEngineer.UpdationWork', ['tender' => $tender]);

    }
    public function view(){
     $tender = TenderDetail::where('ongoingstatus', '!=', '100%')->get();
     $tender_count = TenderDetail::where('ongoingstatus', '!=', '100%')->count();
     return view('assistantEngineer.OngoingUpdationList', ['tender' => $tender, 'tender_count' => $tender_count]);

    }
    public function show($id){
        $tender = TenderDetail::findOrFail($id);
        return view('chiefEngineer.ViewIndividualTenderDetail', ['tender' => $tender]); 
    }
    public function create($id){
      $tender = EstimationDetail::findOrFail($id);

      return view('chiefEngineer.tender', ['tender'=> $tender]);
    }
    

    public function store(Request $request){
    	$tender = new TenderDetail();

    	$tender->complaint_id = request('complaint_id');
    	$tender->state  = request('state'); 
    	$tender->district = request('district');
    	$tender->panchayath_or_municipal = request('panchayath_or_municipal');
    	$tender->city_or_village = request('city_or_village');
    	$tender->road_name = request('road_name');
    	$tender->road_number = request('road_number');
    	$tender->damage_level = request('damage_level');
    	$tender->RoadSize_Length = request('RoadSize_Length');
    	$tender->RoadSize_Breadth = request('RoadSize_Breadth');
    	$tender->name_work = request('name_work');
    	$tender->estimationCost = request('estimationCost');
    	$tender->earnestMoney = request('earnestMoney');
    	$tender->validityPeriod = request('validityPeriod');
    	$tender->securityDeposit = request('securityDeposit');
    	$tender->mode_of_sending_tender = request('mode_of_sending_tender');
    	$tender->deadline = request('deadline');
    	$tender->mode_of_quality_rate = request('mode_of_quality_rate');
    	$tender->tender_issue_date = request('tender_issue_date');
    	$tender->tender_receive_date = request('tender_receive_date');
    	$tender->Contracter = request('Contracter');
    	$tender->buisness_full_address = request('buisness_full_address');
    	$tender->telephone_office = request('telephone_office');
    	$tender->telephone_residential = request('telephone_residential');
    	$tender->residential_address = request('residential_address');
    	$tender->income_tax_address = request('income_tax_address');

    	$tender->save();

          return redirect('/chiefEngineer')->with('tendermsg','Tender details are uploaded');

    }
}
