@extends('layouts.municipalLayout')

      @section('content')
      	<div class="row">
      		<div class="col l10">
      			<div class="card " style="margin-left: 400px;">
				    
             <div class="card-image">
        <img src="{{ asset('/storage/images/'.$complaint->complaintimage) }}" class="materialboxed">
      </div>
        		
      			<div class="card-stacked grey-text">
        				<div class="card-content">
        					<b class="grey-text text-darken-2">Complaint Number</b><span class="right">-{{ $complaint->id }}</span><br><hr>
         					<b class="grey-text text-darken-2">State</b><span class="right"> - {{ $complaint->state }}</span><br><hr>
         					<b class="grey-text text-darken-2">District</b><span class="right"> - {{ $complaint->district }}</span><br><hr>
         					<b class="grey-text text-darken-2">City Or Village</b><span class="right"> - {{ $complaint->city_or_village }}</span><br><hr>
         					<b class="grey-text text-darken-2">Pincode</b><span class="right"> - {{ $complaint->pincode }}</span><br><hr>
         					<b class="grey-text text-darken-2">Panchayath Or Municipal</b><span class="right"> - {{ $complaint->panchayath_or_municipal }}</span><br><hr>
         					<b class="grey-text text-darken-2">RoadName</b><span class="right"> - {{ $complaint->road_name }}</span><br><hr>
         					<b class="grey-text text-darken-2">DamageLevel</b><span class="right"> - {{ $complaint->damage_level }}</span><br><hr>
         					<b class="grey-text text-darken-2">Additional Description</b><span class="right"> - {{ $complaint->additional_description }}</span><br>
       					 </div>
        				<div class="card-action">

         					 <a href="/municipal/update/{{ $complaint->id }}">Forward to Road Inspector</a>
       					</div>
      </div>
      		    </div>
      	    </div>
       </div>

      @endsection

      	

    