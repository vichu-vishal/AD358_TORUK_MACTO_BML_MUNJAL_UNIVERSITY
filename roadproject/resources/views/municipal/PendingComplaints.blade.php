@extends('layouts.municipalLayout')

      @section('content')

<!-- Modal Structure -->
  <div id="modal1" class="modal modal-fixed-footer" style="background: linear-gradient(to right, #7f7fd5 ,#86a8e7 , #91eae4);">
    <div class="modal-content">
       <div class="row">
      <div class="col s12 l6">
        <img src="/images/launch.gif" width="95%">
      </div>
          <div class="col s12 l6">
        <p class="white-text" style="margin-top: 50px;padding: 20px; font-size: 20px;" >Your extraodinary attention to detail took this project to another level
        <p class="white-text z-depth-3" style="padding: 20px;"><b>{{ session('Municipalmsg') }}</b></p>
        </p>
      </div>
    </div>
   </div>
    <div class="modal-footer" style="background: linear-gradient(to right, #7f7fd5 ,#86a8e7 , #91eae4);">
      <a href="#!" class="modal-close btn-flat btn-medium white blue-text">Close</a>
    </div>
  </div>
  <!---end modal structure-->

     
      <div class="container">
        <p class="card-panel red-text text-darken-2 white center" style="margin-left: 200px;"><b>Pending Complaint:</b> <b class="grey-text text-darken-2">{{ $count }}</b></p>
      		@foreach($complaints as $complaint)
      		<ul class="collapsible popout" style="margin-left: 200px;">
    			<li>
      				<div class="collapsible-header grey-text"><i class="material-icons red-text">announcement</i><b class="grey-text text-darken-2">{{ $complaint->road_name }}</b>    -   {{ $complaint->damage_level }}</div>
      				<div class="collapsible-body">
      					<span>{{ $complaint->additional_description }}</span>
      					<a class="waves-effect waves-blue btn-flat blue white-text right" href="/municipal/pc/{{ $complaint->id }}">View More</a>
      				</div>
    			</li>
    
 			 </ul>
			@endforeach
	  </div>
      @endsection

