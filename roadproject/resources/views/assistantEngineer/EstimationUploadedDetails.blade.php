@extends('layouts.assistantEngineerLayout')

      @section('content')
      
      <p class="msg center blue-text"><b>{{ session('estimated_msg') }}</b></p>
      <div class="row" style="margin-left: 400px;">
    <div class="col s12 ">
      <ul class="tabs">
        <li class="tab col s6"><a class="active" href="#test1">HighLevel Budget Complaint</a></li>
        <li class="tab col s6"><a href="#test2">LowLevel Budget Complaint</a></li>
        
      </ul>
    </div>
    
    <p class="right grey white-text">{{ session('msg') }}</p>
    
  </div>
      <div class="container">
        <div id="test1" class="col s12">
          @foreach($estimated_details as $estimated_detail)
          <div class="row">
            <div class="col l12">
          <ul class="collapsible popout" style="margin-left: 180px;">
          <li>
              <div class="collapsible-header grey-text">
                <i class="material-icons red-text">announcement</i>
                <b class="grey-text text-darken-2">{{ $estimated_detail->city_or_village }}</b>    -   {{ $estimated_detail->damage_level }}
                <div><b>Forwarded on </b>{{ $estimated_detail->created_at }}</div>
              </div>
              <div class="collapsible-body">
                <span class="grey-text text-darken-2"><b>Total Estimation Cost - </b>{{ $estimated_detail->total_estimation_cost }}</span>
                <a class="waves-effect waves-blue btn-flat blue white-text right" href="/assistantengineer/view/{{ $estimated_detail->complaint_id }}">View Estimation Detail</a>
              </div>
          </li>
     
       </ul>
      </div>
    </div>
      @endforeach
      <ul class="pagination center">
          <li>
          {{ $estimated_details->links() }}
        </li>
        </ul>
      </div>
      <div id="test2" class="col s12">
        @foreach($estimated_details_lowlevel as $estimated_detail_lowlevel)
          <div class="row">
            <div class="col l12">
          <ul class="collapsible popout" style="margin-left: 180px;">
          <li>
              <div class="collapsible-header grey-text">
                <i class="material-icons red-text">announcement</i>
                <b class="grey-text text-darken-2">{{ $estimated_detail_lowlevel->city_or_village }}</b>    -   &nbsp;&nbsp;&nbsp;<b>Road Number:</b>{{ $estimated_detail_lowlevel->road_number }}
                <div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b>Forwarded on </b>{{ $estimated_detail_lowlevel->created_at }}</div>
              </div>
              <div class="collapsible-body">
                <span class="grey-text text-darken-2"><b>Total Estimation Cost - </b>{{ $estimated_detail_lowlevel->Estimatedamount }}</span>
                @foreach($people as $peoples)
                @if($estimated_detail_lowlevel->complaint_id == $peoples->id)
                @if($peoples->transactionstatus == 'credited')

                 <a class="waves-effect waves-blue btn-flat disabled  white-text right" href="/assistantengineer/update/{{ $estimated_detail_lowlevel->complaint_id }}" >Process Updated</a>
                 @else
                 <a class="waves-effect waves-blue btn-flat orange white-text right" href="/assistantengineer/update/{{ $estimated_detail_lowlevel->complaint_id }}">Transaction Approved</a>
                 @endif
                 @endif
                 @endforeach

                
              </div>
          </li>
    
       </ul>
      </div>
    </div>
      @endforeach
      <ul class="pagination center">
          <li>
          {{ $estimated_details->links() }}
        </li>
        </ul>
      </div>
    
    </div>
      @endsection




