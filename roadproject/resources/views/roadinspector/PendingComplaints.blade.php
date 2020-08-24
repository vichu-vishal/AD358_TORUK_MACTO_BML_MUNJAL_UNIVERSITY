@extends('layouts.roadinspectorLayout')

      @section('content')
      <!-- Modal Structure -->
  <div id="modal1" class="modal modal-fixed-footer" style="background: linear-gradient(to right, #7f7fd5 ,#86a8e7 , #91eae4);">
    <div class="modal-content">
       <div class="row">
      <div class="col s12 l6">
        <img src="/images/fake_and_approve.gif" width="110%">
      </div>
          <div class="col s12 l6">
             @if( Session::has('fakecomplaintmsg'))
        <p class="white-text" style="margin-top: 50px;padding: 20px; font-size: 20px;" >Salute Your Accountability because you save the time of your higher authorities
        <p class="white-text z-depth-3" style="padding: 20px;"><b>{{ session('fakecomplaintmsg') }}</b></p>
        </p>
          @elseif( Session::has('approvedmsg'))
           <p class="white-text" style="margin-top: 50px;padding: 20px; font-size: 20px;" >Your excellent inspection detail is the first basement of the road
        <p class="white-text z-depth-3" style="padding: 20px;"><b>{{ session('approvedmsg') }}</b></p>
        </p>
          @endif
      </div>
    </div>
   </div>
    <div class="modal-footer" style="background: linear-gradient(to right, #7f7fd5 ,#86a8e7 , #91eae4);">
      <a href="#!" class="modal-close btn-flat btn-medium white blue-text">Close</a>
    </div>
  </div>
  <!---end modal structure-->
  
     

      <div class="container">
        <div class="row">
          <div class="col s12">
            <ul class="tabs tabs-fixed-width tab-demo z-depth-1" style="margin-left: 150px;">
              <li class="tab"><a class="active" href="#panchayath">Panchayath Complaints <b class="grey-text text-darken-2">{{ $panchayath_count }}</b></a></li>
              <li class="tab"><a href="#municipal">Municipal Complaints <b class="grey-text text-darken-2">{{ $municipal_count }}</b></a></li>
            </ul>
<!--municipal complaints open-->
        <div id="municipal">    
      		@foreach($municipal_complaints as $municipal_complaints)
            <ul class="collapsible popout" style="margin-left: 200px;">
    			       <li>
      				        <div class="collapsible-header grey-text"><i class="material-icons red-text">announcement</i><b class="grey-text text-darken-2">From {{ $municipal_complaints->panchayath_or_municipal }} : {{ $municipal_complaints->road_name }}</b>    -   {{ $municipal_complaints->damage_level }}
                      </div>
      				        <div class="collapsible-body">
      					      <span>{{ $municipal_complaints->additional_description }}</span>
      					      <a class="waves-effect waves-blue btn-flat blue white-text right" href="/roadinspector/pc/{{ $municipal_complaints->id }}">View More</a>
      				        </div>
    			       </li>
            </ul>
          @endforeach
        </div>
<!--municipal complaints closed-->
<!--panchayath complaints open-->
        <div id="panchayath">    
          @foreach($panchayath_complaints as $panchayath_complaint)
            <ul class="collapsible popout" style="margin-left: 200px;">
                <li>
                     <div class="collapsible-header grey-text"><i class="material-icons red-text">announcement</i><b class="grey-text text-darken-2">From {{ $panchayath_complaint->panchayath_or_municipal }} : {{ $panchayath_complaint->road_name }}</b>    -   {{ $panchayath_complaint->damage_level }}
                     </div>
                     <div class="collapsible-body">
                     <span>{{ $panchayath_complaint->additional_description }}</span>
                     <a class="waves-effect waves-blue btn-flat blue white-text right" href="/roadinspector/pc/{{ $panchayath_complaint->id }}">View More</a>
                     </div>
                </li>
            </ul>
          @endforeach
        </div>
 <!--panchayath complaint closed-->         
          </div>
       </div>
	  </div>
      @endsection

