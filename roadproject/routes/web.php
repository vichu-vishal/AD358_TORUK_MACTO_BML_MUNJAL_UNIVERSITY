<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\EstimationDetail;
use App\TenderDetail;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/ 
Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout');
Route::get('/', function () {
    return view('welcome');
});
Route::get('/official', function () {
    return view('index');
});
Route::get('/people', function () {
    return view('people_index');
});
Route::get('/now', function () {
    $now = now()->toDateTimeString();
    return $now;
}); 
Route::get('/pdf', function () {
	
   $html = '<h1>welcome</h1>';
    $pdf = PDF::loadHtml($html);
    $pdf->setOrientation('landscape');
    return $pdf->stream(); 
});
Route::get('/report', 'ChiefEngineerController@report');
Route::get('/record', 'ChiefEngineerController@recordreport'); 

Auth::routes();
Route::get('/home', 'HomeController@index');
Route::get('/people/create', 'PeopleController@create');
Route::post('/people', 'PeopleController@store')->name('people.store');
Route::get('/uploadimage', 'PeopleController@uploadimage');
Route::post('/upload', 'PeopleController@upload');
	//dd($request->all());
//panchayath route
//panchayath - home page and count of pending complaints 
Route::get('/panchayath', 'PanchayathController@detail');
//panchayath - show all the people complaints
Route::get('/panchayath/pc','PanchayathController@index');
//panchayath - show individual people complaint
Route::get('/panchayath/pc/{id}','PanchayathController@show');
//panchayath - change approval status null as 'approved' in peoplecomplaintimage table
Route::get('/panchayath/update/{id}','PanchayathController@update');
//panchayath - approval status
Route::get('/panchayath/approval','PanchayathController@approval'); 
//panchayath - view more in approval status
Route::get('/panchayath/ApprovedComplaintDetail/{id}', 'PanchayathController@viewmore');
//ongoing complaints
Route::get('/panchayath/ongoingcomplaint','WorkUpdationController@pindex');
//finished complaints
Route::get('/panchayath/finishedcomplaint','FinishedComplaintController@pindex');

//municipal route
//municipal - home page and count of pending complaints 
Route::get('/municipal', 'MunicipalController@detail');
//municipal - show all the people complaints
Route::get('/municipal/pc','MunicipalController@index');
//municipal - show individual people complaint
Route::get('/municipal/pc/{id}','MunicipalController@show');
//municipal - change approval status null as 'approved' in peoplecomplaintimage table
Route::get('/municipal/update/{id}','MunicipalController@update');
//municipal - approval status
Route::get('/municipal/approval','MunicipalController@approval');
//municipal - view more in approval status
Route::get('/municipal/ApprovedComplaintDetail/{id}', 'MunicipalController@viewmore');
//date picker
Route::get('/municipal/record', 'MunicipalController@recordreport');
//ongoing complaints
Route::get('/municipal/ongoingcomplaint','WorkUpdationController@mindex');
//finished complaints
Route::get('/municipal/finishedcomplaint','FinishedComplaintController@mindex');


//road inspector route
//road inspector - home page and count of pending complaints 
Route::get('/roadinspector', 'RoadInspectorController@detail');
//road inspector - show all the people complaints
Route::get('/roadinspector/pc', 'RoadInspectorController@index');
//road inspector - show individual people complaint from panchayath and municipal
Route::get('/roadinspector/pc/{id}', 'RoadInspectorController@show');
//upload the inspection details
Route::get('/roadinspector/create/{id}', 'RoadInspectorController@create');
//store the inspection details
Route::post('/roadinspector/store', 'RoadInspectorController@store')->name('roadinspector.store');
//fake complaints - decline by road inspector
Route::get('/roadinspector/fakecomplaint/create/{id}', 'FakeComplaintController@create');
//store the inspection details
Route::post('/roadinspector/fakecomplaint/store', 'FakeComplaintController@store')->name('fakecomplaint.store');
//road inspector - view the uploaded inspection details
Route::get('/roadinspector/inspectiondetails','RoadInspectorController@inspectiondetails');
//road inspector - approval status
Route::get('/roadinspector/approval','ApprovalStatusController@riapproval');
//ongoing complaints
Route::get('/roadinspector/ongoingcomplaint','WorkUpdationController@index'); 
//finished complaints
Route::get('/roadinspector/finishedcomplaint','FinishedComplaintController@riindex');
   
 

//assistant engineer - home page and count of pending complaints from road inspector
Route::get('/assistantengineer', 'AssistantEngineerController@detail' );
//assistant engineer - show all the ri complaints and inspection details
Route::get('/assistantengineer/pc', 'AssistantEngineerController@index');
//assistant engineer - show individual people complaint from road inspector
Route::get('/assistantengineer/pc/{id}', 'AssistantEngineerController@show');
//upload the estimation details
Route::get('/assistantengineer/create/{id}', 'AssistantEngineerController@create');
//store the estimation details
Route::post('/assistantengineer/store', 'AssistantEngineerController@store')->name('assistantengineer.store');
//assistant - view the uploaded estimated details
Route::get('/assistantengineer/estimationdetails','AssistantEngineerController@estimationdetails');
//assistant engineer - show individual people complaint from road inspector
Route::get('/assistantengineer/view/{complaint_id}', 'AssistantEngineerController@view');
//assistant engineer update the ongoing complaint List
Route::get('/assistantengineer/ongoingupdation', 'TenderDetailController@view');
//assistant engineer updation the ongoing complaint 
Route::get('/assistantengineer/ongoingupdation/{id}', 'TenderDetailController@update');
//assistant engineer store the updation work
Route::post('/assistantengineer/workupdation', 'WorkUpdationController@ongoingstatus');
//ongoing complaints
Route::get('/assistantengineer/ongoingcomplaint','WorkUpdationController@aeindex');
//assistant engineer - approval status
Route::get('/assistantengineer/approval','ApprovalStatusController@aeapproval');
//assistant engineer - low levl estimation
Route::get('/assistantengineer/lowlevel/{id}','AssistantEngineerController@lowlevel');
//assistant engineer - low levl estimation-store
Route::post('/assistantengineer/lowlevel/','LowLevelComplaintController@store');
//update the approval status of CE in all table
Route::get('/assistantengineer/update/{complaint_id}','LowLevelComplaintController@update');
//finished complaints
Route::get('/assistantengineer/finishedcomplaint','FinishedComplaintController@aeindex');

 

//executive engineer - home page and count of pending estimation from assistant engineer
Route::get('/executiveEngineer', 'ExecutiveEngineerController@detail');
//pending Estimation
Route::get('/executiveEngineer/pe', 'ExecutiveEngineerController@index');
//pending Estimation - show individual estimation details
Route::get('/executiveEngineer/pe/{id}', 'ExecutiveEngineerController@show');
//assistant - edit the uploaded estimated details
Route::get('/executiveEngineer/editestimationdetails/{complaint_id}','ExecutiveEngineerController@editestimationdetails');
//assistant - store edited estimated details
Route::post('/executiveEngineer/editestimationdetails/store','ExecutiveEngineerController@store');
//assistant - store non-edited estimated details
Route::get('/executiveEngineer/update/{complaint_id}','ExecutiveEngineerController@update');
//uploaded Estimation
Route::get('/executiveEngineer/UploadedEstimationDetail', 'ExecutiveEngineerController@uploadedestimationdetail');
//uploaded Estimation
Route::get('/executiveEngineer/UploadedEstimationDetail/{id}', 'ExecutiveEngineerController@uploaded');
//ongoing complaints
Route::get('/executiveEngineer/ongoingcomplaint','WorkUpdationController@eeindex');
//executive engineer - approval status
Route::get('/executiveEngineer/approval','ApprovalStatusController@eeapproval');
//finished complaints
Route::get('/executiveEngineer/finishedcomplaint','FinishedComplaintController@eeindex');

//chief engineer - home page and count of pending estimation from executive engineer
Route::get('/chiefEngineer', 'ChiefEngineerController@detail');
//List Out the pending Estimation in CE dashboard
Route::get('/chiefEngineer/pe', 'ChiefEngineerController@index');
//pending Estimation - show individual estimation details
Route::get('/chiefEngineer/pe/{id}', 'ChiefEngineerController@show');
//pending Estimation - show edited individual estimation details
Route::get('/chiefEngineer/peshow/{complaint_id}', 'ChiefEngineerController@peshow');
//update the approval status of CE in all table
Route::get('/chiefEngineer/update/{complaint_id}','ChiefEngineerController@update');
//List Out the Approved Estimation in CE dashboard
Route::get('/chiefEngineer/approved_details', 'ChiefEngineerController@list');
//show the individual Approved Estimation in CE dashboard
Route::get('/chiefEngineer/approved_details/{id}', 'ChiefEngineerController@listshow');
//ongoing complaints
Route::get('/chiefEngineer/ongoingcomplaint','WorkUpdationController@ceindex');
//tender detail
Route::get('/chiefEngineer/tender/{id}', 'TenderDetailController@create'); 
//store the tender detail
Route::post('/chiefEngineer/tender/store', 'TenderDetailController@store');
//view the tender detail
Route::get('/chiefEngineer/tenderdetail', 'TenderDetailController@index');
//view individual tender detail
Route::get('/chiefEngineer/viewtenderdetail/{id}', 'TenderDetailController@show');
//chief engineer - approval status
Route::get('/chiefEngineer/approval','ApprovalStatusController@ceapproval');
//finished complaints
Route::get('/chiefEngineer/finishedcomplaint','FinishedComplaintController@ceindex');

Route::get('/chiefEngineer/tenderdetail/{id}', function($id){
  $data = TenderDetail::findOrFail($id);
  $pdf = PDF::loadView('chiefEngineer.GenerateTenderDetailPdf', ['data'=> $data]);
    return $pdf->stream();
}); 
Route::get('/chiefEngineer/approved_details/pdf/{id}', function($id){
	$data = EstimationDetail::findOrFail($id);
	$pdf = PDF::loadView('chiefEngineer.GenerateTenderPdf', ['data'=> $data]);
  
    return $pdf->stream();
}); 
Route::get('/reportpdf', function(Request $request){
	   $data1 = date("Y-m-d",strtotime($request->input('data1')));
       $data2 = date("Y-m-d",strtotime($request->input('data2')));
      $approved_estimation_details = EstimationDetail::where('created_at', '>=', $data1.' 00:00:00')
      ->where('created_at', '<=',  $data2.' 23:59:59')
      ->get();
      $pdf = PDF::loadView('chiefEngineer.GeneratePdf', ['approved_estimation_details'=> $approved_estimation_details]);
      return $pdf->stream();
});
Route::get('/locationreportpdf', function(Request $request){
	   $data1 = date("Y-m-d",strtotime($request->input('data1')));
       $data2 = date("Y-m-d",strtotime($request->input('data2')));
       $data3 = request('data3');
      $approved_estimation_details = EstimationDetail::where([
      	['created_at', '>=', $data1.' 00:00:00'],
        ['created_at', '<=',  $data2.' 23:59:59'],
        ['city_or_village', $data3]
      ])->get(); 
      
      $pdf = PDF::loadView('chiefEngineer.GeneratePdf', ['approved_estimation_details'=> $approved_estimation_details]);
      return $pdf->stream();
});
Route::get('/damagelevelreportpdf', function(Request $request){
	   $data1 = date("Y-m-d",strtotime($request->input('data1')));
       $data2 = date("Y-m-d",strtotime($request->input('data2')));
       $data3 = request('data3');
       $data4 = request('data4');
      $approved_estimation_details = EstimationDetail::where([
      	['created_at', '>=', $data1.' 00:00:00'],
        ['created_at', '<=',  $data2.' 23:59:59'],
        ['city_or_village', $data3],
        ['damage_level', $data4]
      ])->get();
      
      $pdf = PDF::loadView('chiefEngineer.GeneratePdf', ['approved_estimation_details'=> $approved_estimation_details]);
      return $pdf->stream();
});
