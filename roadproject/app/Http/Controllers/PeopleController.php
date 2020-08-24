<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\PeopleComplaintImage;

class PeopleController extends Controller
{
  

    public function create(){

        return view('people.create');
    }

    public function store(Request $request){

          $this->validate(request(), [
            'state' => 'required',
            'district' => 'required',
            'city_or_village' => 'required',
            'pincode' => 'required',
            'panchayath_or_municipal' => 'required',
            'road_name' => 'required',
             'damage_level' => 'required',
              'additional_description' => 'required',
              
                
        ]);
        

        $people = new PeopleComplaintImage();

        

        $people->state  = request('state');
        $people->district = request('district');
        $people->city_or_village = request('city_or_village');
        $people->pincode = request('pincode');
        $people->panchayath_or_municipal = request('panchayath_or_municipal');
        $people->road_name = request('road_name');
        $people->damage_level = request('damage_level');
        $people->additional_description = request('additional_description');
        
        //image
        if ($file = $request->hasFile('image')) 
        {
            
           $file = $request->File('image'); 
           $filename = $file->getClientoriginalName();
          // $destinationPath = public_path().'/images/' ;
           $destinationPath =  $request->image->storeAs('images',$filename,'public');
           $file->move($destinationPath,$filename);
           $people->complaintimage = $filename ;
           //$request->image->storeAs('images', $filename, 'public');
      //PeopleComplaintImage()->update(['complaintimage' => $filename]);
        }

        $people->save();
          return redirect()->back()->with('complaintmsg',' Your Complaints are registered');
       // return  "uploaded";
        //return redirect('/uploadimage');
    }


     public function uploadimage(){
        return view('people.upload');
     }

    

public function upload(Request $request){

    if ($request->hasFile('image')) {
            
           $filename = $request->image->getClientoriginalName();
           $request->image->storeAs('images', $filename, 'public');
      PeopleComplaintImage()->update(['complaintimage' => $filename]);
    }
        
        return "uploaded hehee";
        
     }

    
     
     
}
