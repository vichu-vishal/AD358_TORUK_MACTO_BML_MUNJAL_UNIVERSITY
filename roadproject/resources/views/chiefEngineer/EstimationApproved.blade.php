@extends('layouts.chiefEngineerLayout')

      @section('content')


      
 <!--search-->    
<div class="container">
<form method="get" action="/report" style="margin-left: 300px;" id="origin">
    <div class="row">
        <div class="input-field col s6">
          <input  id="data" type="text" class="validate" name="data">
          <label for="data">Search</label>
        </div>
       <div class="col s12 l6">
          <input type="submit" name="" class="btn-large blue white-text" value="Search">
       </div> 
    </div>
</form>


</div>
<!--search closed-->
        <div class="container">
          <!--chart open-->

          <!--chart closed-->
          <p class="grey-text center">Search result: <b>{{ $approved_estimation_details_count }}</b></p>
          @foreach($approved_estimation_details as $approved_estimation_detail)
          <ul class="collapsible popout" style="margin-left: 200px;">
          <li>
              <div class="collapsible-header grey-text"><i class="material-icons green-text">mark_email_read</i><b class="grey-text text-darken-2">
                {{ $approved_estimation_detail->road_name }} - 
                {{ $approved_estimation_detail->city_or_village }}</b>    -   
                {{ $approved_estimation_detail->damage_level }}
              </div>
              <div class="collapsible-body">
                <span class="grey-text text-darken-2 "><b>Total Estimation Cost - </b>{{ $approved_estimation_detail->total_estimation_cost }}

                </span> 
                <br><br> 
                <a class="waves-effect waves-blue btn-flat green white-text" href="/chiefEngineer/tender/{{ $approved_estimation_detail->id }}"> Upload Tender Detail</a>
                <a class="waves-effect waves-blue btn-flat red white-text" href="/chiefEngineer/approved_details/pdf/{{ $approved_estimation_detail->id }}">Generate Tender Advertise PDF</a>
                <a class="waves-effect waves-blue btn-flat blue white-text" href="/chiefEngineer/approved_details/{{ $approved_estimation_detail->id }}">View Estimation More</a>
              </div> 
          </li>
          </ul>
      @endforeach
     </div>
@endsection