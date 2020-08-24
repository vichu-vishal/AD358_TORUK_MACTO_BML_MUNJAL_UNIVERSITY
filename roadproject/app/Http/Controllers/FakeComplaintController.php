<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\PeopleComplaintImage;
use App\RoadInspectionDetail;
use App\FakeComplaint;
use DB;

class FakeComplaintController extends Controller
{
     public function show($id){

         $complaint = PeopleComplaintImage::findOrFail($id);
        return view('roadinspector.pcshow', ['complaint' => $complaint]);
    }

    

     public function create($id){

        $complaint = PeopleComplaintImage::findOrFail($id);
        return view('roadinspector.FakeComplaintsUpload', ['complaint' => $complaint]);
    }

    public function store(Request $request){

          $this->validate(request(), [
            'complaint_id' => 'required',
            'state' => 'required',
            'district' => 'required',
            'panchayath_or_municipal' => 'required',
            'city_or_village' => 'required',
            'damage_level' => 'required',
            'additional_fake_complaint_description' => 'required',
                
        ]);
        

        $fakeDetail = new FakeComplaint();

        
        $fakeDetail->complaint_id = request('complaint_id');
        $fakeDetail->state  = request('state');
        $fakeDetail->district = request('district');
        $fakeDetail->panchayath_or_municipal = request('panchayath_or_municipal');
        $fakeDetail->city_or_village = request('city_or_village');
        $fakeDetail->damage_level = request('damage_level');
        $fakeDetail->road_name = request('road_name');
        $fakeDetail->additional_fake_complaint_description = request('additional_fake_complaint_description');
        //image
        if ($file = $request->hasFile('image')) 
        {
            
           $file = $request->File('image'); 
           $filename = $file->getClientoriginalName();
           $destinationPath =  $request->image->storeAs('images/RoadInspectionFakeComplaintImage',$filename,'public');
           $file->move($destinationPath,$filename);
           $fakeDetail->inspection_fake_image = $filename ;
           
        }

        $fakeDetail->save();

        DB::table('peoplecomplaintimages')
              ->where('id', request('complaint_id'))
              ->update(['ri_approval_status' => 'declined']);

        return redirect('/roadinspector/pc')->with('fakecomplaintmsg','successfully decline the fake complaints');
        //return redirect('/uploadimage');
    }

}
