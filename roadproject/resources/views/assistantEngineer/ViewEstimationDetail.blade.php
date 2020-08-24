@extends('layouts.assistantEngineerLayout')

      @section('content')
        <div class="row">
          <div class="col l10">
          <div class="card " style="margin-left: 400px;">
            
             <div class="card-image">
                <img src="{{ asset('/storage/images/RoadInspectionImage/'.$complaint_inspection_detail->inspection_image) }}" class="materialboxed">
                <span class="card-title">Forwarded On : {{ $complaint_inspection_detail->created_at }}</span>
             </div>
            
            <div class="card-stacked grey-text">
                <div class="card-content">
                  <b class="grey-text text-darken-2">Complaint Number</b><span class="right">-{{ $complaint_inspection_detail->complaint_id }}</span><br><hr>
                  <b class="grey-text text-darken-2">State</b><span class="right"> - {{ $complaint_inspection_detail->state }}</span><br><hr>
                  <b class="grey-text text-darken-2">District</b><span class="right"> - {{ $complaint_inspection_detail->district }}</span><br><hr>
                  <b class="grey-text text-darken-2">City Or Village</b><span class="right"> - {{ $complaint_inspection_detail->city_or_village }}</span><br><hr>
                  <b class="grey-text text-darken-2">RoadSize Length</b><span class="right"> - {{ $complaint_inspection_detail->RoadSize_Length }}</span><br><hr>
                  <b class="grey-text text-darken-2">RoadSize Breadth</b><span class="right"> - {{ $complaint_inspection_detail->RoadSize_Breadth }}</span><br><hr>
                  <b class="grey-text text-darken-2">Budget</b><span class="right"> - {{ $complaint_inspection_detail->budget }}</span><br><hr>
                  <b class="grey-text text-darken-2">Total Cost</b><span class="right"> - {{ $complaint_inspection_detail->totalCost }}</span><br><hr>
                  <b class="grey-text text-darken-2">DamageLevel</b><span class="right"> - {{ $complaint_inspection_detail->damage_level }}</span><br><hr>
                  <b class="grey-text text-darken-2">Additional Description</b><span class="right"> - {{ $complaint_inspection_detail->additional_inspection_description }}</span><br>
                 </div>
                
            </div>
          </div>
            </div>
       </div>

      @endsection

        

    