@extends('layouts.assistantEngineerLayout')

      @section('content')

      <!-- Modal Structure -->
  <div id="modal1" class="modal modal-fixed-footer" style="background: white;">
    <div class="modal-content">
       <div class="row">
      <div class="col s12 l6">
        <img src="/images/send.gif" width="130%">
      </div>
          <div class="col s12 l6">
        <p class="grey-text text-darken-2" style="margin-top: 50px;padding: 20px; font-size: 25px;" >Your extraodinary attention to detail took this problem to another level
        <p class="grey-text text-darken-2 z-depth-3" style="padding: 20px;"><b>{{ session('estimated_msg') }}</b></p>
        </p>
      </div>
    </div>
   </div>
    <div class="modal-footer" style="background: white;">
      <a href="#!" class="modal-close btn-flat btn-medium white blue-text">Close</a>
    </div>
  </div>
  <!---end modal structure-->

       <div class="row">
    <div class="col s12 l10 offset-l4">
      <ul class="tabs">
        <li class="tab col s3"><a href="#test1"  class="active">High Level Budget Complaints <b class="grey-text text-darken-2">{{ $count }}</b></a></li>
        <li class="tab col s3"><a href="#test2">Low Level Budget Complaints <b class="grey-text text-darken-2">{{ $count_lowlevel }}</b></a></li>
        
      </ul>
    </div>
   
    
    
  </div>
   <div id="test1">
      <div class="container">
      		@foreach($complaint_inspection_details as $complaint_inspection_detail)
          <div class="row">
            <div class="col l12 offset-l2">
      		<ul class="collapsible popout" style="margin-left: 180px;">
    			<li>
      				<div class="collapsible-header grey-text">
                @if($complaint_inspection_detail->trafficintense == 'c-high')
                <i class="material-icons red-text">announcement</i><span class="red-text"><b> - High Traffic Intensity</b></span>
                @elseif($complaint_inspection_detail->trafficintense == 'b-medium')
                 <i class="material-icons blue-text">announcement</i><span class="blue-text"><b> - Medium Traffic Intensity</b></span>
                @else
                 <i class="material-icons orange-text">announcement</i><span class="orange-text text-lighten-1"><b> - Low Traffic Intensity</b></span> 
                @endif
                <b class="grey-text text-darken-2"> - {{ $complaint_inspection_detail->city_or_village }}</b>
                <div><b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Forwarded on </b>{{ $complaint_inspection_detail->created_at }}</div>
              </div>
      				<div class="collapsible-body grey-text text-darken-2">
      					<span><b>Description:</b> {{ $complaint_inspection_detail->additional_inspection_description }} </span><br>
                 {{ $complaint_inspection_detail->damage_level }}

      					<a class="waves-effect waves-blue btn-flat blue white-text right" href="/assistantengineer/pc/{{ $complaint_inspection_detail->id }}">View Inspection Detail</a>
      				</div>
    			</li>
    
 			 </ul>
      </div>
    </div>
			@endforeach

      <ul class="pagination center">
          <li>
          {{ $complaint_inspection_details->links() }}
        </li>
        </ul>
    </div>
  </div>
<div id="test2">
       <div class="container">
          @foreach($complaint_inspection_details_lowlevel as $complaint_inspection_detail_lowlevel)
          <div class="row">
            <div class="col l12 offset-l2">
          <ul class="collapsible popout" style="margin-left: 180px;">
          <li>
              <div class="collapsible-header grey-text">
                @if($complaint_inspection_detail_lowlevel->trafficintense == 'c-high')
                <i class="material-icons red-text">announcement</i><span class="red-text"><b> - High Traffic Intensity</b></span>
                @elseif($complaint_inspection_detail_lowlevel->trafficintense == 'b-medium')
                 <i class="material-icons blue-text">announcement</i><span class="blue-text"><b> - Medium Traffic Intensity</b></span>
                @else
                 <i class="material-icons orange-text">announcement</i><span class="orange-text text-lighten-1"><b> - Low Traffic Intensity</b></span> 
                @endif
                <b class="grey-text text-darken-2"> - {{ $complaint_inspection_detail_lowlevel->city_or_village }}</b>
                <div><b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Forwarded on </b>{{ $complaint_inspection_detail_lowlevel->created_at }}</div>
              </div>
              <div class="collapsible-body grey-text text-darken-2">
                <span><b>Description:</b> {{ $complaint_inspection_detail_lowlevel->additional_inspection_description }} </span><br>
                 {{ $complaint_inspection_detail_lowlevel->damage_level }}

                <a class="waves-effect waves-blue btn-flat blue white-text right" href="/assistantengineer/pc/{{ $complaint_inspection_detail_lowlevel->id }}">View Inspection Detail</a>
              </div>
          </li>
    
       </ul>
      </div>
    </div>
      @endforeach
     
      <ul class="pagination center">
          <li>
          {{ $complaint_inspection_details_lowlevel->links() }}
        </li>
        </ul>
	  </div>
      @endsection
    </div>

