@extends('layouts.executiveEngineerLayout')

      @section('content')
 <!-- Modal Structure -->
  <div id="modal1" class="modal modal-fixed-footer" style="background: white;">
    <div class="modal-content">
       <div class="row">
      <div class="col s12 l6">
        <img src="/images/edit_forward.gif" width="130%">
      </div> 
          <div class="col s12 l6">
             @if( Session::has('editForwardmsg'))
        <p class="grey-text text-darken-2" style="margin-top: 50px;padding: 20px; font-size: 20px;" >Salute Your Accountability because you save the time of your higher authorities
        <p class="grey-text text-darken-2 z-depth-3" style="padding: 20px;"><b>{{ session('editForwardmsg') }}</b></p>
        </p>
        
          @endif
      </div>
    </div>
   </div>
    <div class="modal-footer" style="background: white;">
      <a href="#!" class="modal-close btn-flat btn-medium white blue-text">Close</a>
    </div>
  </div>
  <!---end modal structure-->
      <div class="container">
        <p class="red-text text-darken-2 card-panel white center" style="margin-left: 200px;" ><b>Pending Complaint Count: </b><b class="grey-text text-darken-2">{{ $count }}</b></p><br>
        <p class="center grey-text text-darken-2">{{ session('msg') }}</p>
        @if($count == 0)
        <img src="/images/thankyou.gif" alt="" class="resposive-img center" width="50%" style="margin-left: 250px;">
        <h6 class="grey-text text-darken-2 center"><b>Appreciate your accountability because there is no Complaints</b></h6>

        @else

      		@foreach($estimation_details as $estimation_detail)
      		<ul class="collapsible popout" style="margin-left: 200px;">
    			<li>
      				<div class="collapsible-header grey-text"><i class="material-icons red-text">announcement</i><b class="grey-text text-darken-2">
      					{{ $estimation_detail->road_name }} - 
      					{{ $estimation_detail->city_or_village }}</b>    -   
      					{{ $estimation_detail->damage_level }}
      				</div>
      				<div class="collapsible-body">
      					<span class="grey-text text-darken-2 "><b>Total Estimation Cost - </b>{{ $estimation_detail->total_estimation_cost }}</span>
      					<a class="waves-effect waves-blue btn-flat blue white-text right" href="/executiveEngineer/pe/{{ $estimation_detail->id }}">View Estimation More</a>
      				</div>
    			</li>
     
 			 </ul>
			@endforeach
      @endif
	  </div>


       @endsection