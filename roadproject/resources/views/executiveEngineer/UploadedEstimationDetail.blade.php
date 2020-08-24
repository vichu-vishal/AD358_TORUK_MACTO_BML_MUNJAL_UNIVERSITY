@extends('layouts.executiveEngineerLayout')
 
      @section('content')

      <p class="msg center blue-text"><b>{{ session('') }}</b></p>
      <div class="container">
        <p class="blue-text text-darken-2 card-panel white center" style="margin-left: 200px;" ><b>uploaded Estimation Count: </b><b class="grey-text text-darken-2">{{ $UploadedEstimationDetail_count }}</b></p>
          @foreach($UploadedEstimationDetail as $UploadedEstimationDetails)
          <div class="row">
            <div class="col l12">
          <ul class="collapsible popout" style="margin-left: 170px;">
          <li>
              <div class="collapsible-header grey-text">
                <i class="material-icons green-text">screen_share</i>
                <b class="grey-text text-darken-2">
                	<span>{{ $UploadedEstimationDetails->road_name }} - 
                	{{ $UploadedEstimationDetails->city_or_village }}</b><span>
                	<div class="right-align" style="margin-left: 20px;"> - {{ $UploadedEstimationDetails->damage_level }}</div>
                	<div class="right">
                		<b>Forwarded on - </b>{{ $UploadedEstimationDetails->created_at }}</div>
                	 
                	
                
              </div>
              <div class="collapsible-body">
                <span class="grey-text text-darken-2"><b>Total Estimation Cost - </b>{{ $UploadedEstimationDetails->total_estimation_cost }}</span>
                <a href="/executiveEngineer/UploadedEstimationDetail/{{ $UploadedEstimationDetails->id }}" class="waves-effect waves-blue btn-flat blue white-text right" href="">View Estimation Detail</a>
              </div>
          </li>
    
       </ul>
      </div>
    </div> 
      @endforeach
<ul class="pagination center">
          <li>
      {{ $UploadedEstimationDetail->links() }}
    </li>
  </ul>
    </div>

      @endsection