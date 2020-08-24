<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\PeopleComplaintImage;
use App\RoadInspectionDetail;
use App\EstimationDetail;
use App\EditEstimationDetail;
use App\TenderDetail;

use Illuminate\Support\Facades\DB;


class FinishedComplaintController extends Controller
{
    public function pindex()
    {
       $finish = DB::table('tenderdetails')->where([
       	['ongoingstatus','100%'],
       	['panchayath_or_municipal', 'panchayath']
       ])->paginate(5);
       $finish_count = DB::table('tenderdetails')->where([
       	['ongoingstatus','100%'],
       	['panchayath_or_municipal', 'panchayath']
       ])->count();
     return view('panchayath.FinishedComplaint', ['finish' => $finish, 'finish_count' => $finish_count]); 
    }
     public function mindex()
    {
       $finish = DB::table('tenderdetails')->where([
       	['ongoingstatus','100%'],
       	['panchayath_or_municipal', 'municipal']
       ])->paginate(5);
       $finish_count = DB::table('tenderdetails')->where([
       	['ongoingstatus','100%'],
       	['panchayath_or_municipal', 'municipal']
       ])->count();
     return view('municipal.FinishedComplaint', ['finish' => $finish, 'finish_count' => $finish_count]); 
    } 
    public function riindex()
    {
       $finish = DB::table('tenderdetails')->where(
        'ongoingstatus','100%')->paginate(5);
       $finish_count = DB::table('tenderdetails')->where('ongoingstatus','100%')->count();
     return view('roadinspector.FinishedComplaint', ['finish' => $finish, 'finish_count' => $finish_count]); 
    } 
    public function aeindex()
    {
       $finish = DB::table('tenderdetails')->where(
        'ongoingstatus','100%')->paginate(5);
       $finish_count = DB::table('tenderdetails')->where('ongoingstatus','100%')->count();
     return view('assistantEngineer.FinishedComplaint', ['finish' => $finish, 'finish_count' => $finish_count]); 
    } 
     public function eeindex()
    {
       $finish = DB::table('tenderdetails')->where(
        'ongoingstatus','100%')->paginate(5);
       $finish_count = DB::table('tenderdetails')->where('ongoingstatus','100%')->count();
     return view('executiveEngineer.FinishedComplaint', ['finish' => $finish, 'finish_count' => $finish_count]); 
    }
     public function ceindex()
    {
       $finish = DB::table('tenderdetails')->where(
        'ongoingstatus','100%')->paginate(5);
       $finish_count = DB::table('tenderdetails')->where('ongoingstatus','100%')->count();
     return view('chiefEngineer.FinishedComplaint', ['finish' => $finish, 'finish_count' => $finish_count]); 
    } 
}
