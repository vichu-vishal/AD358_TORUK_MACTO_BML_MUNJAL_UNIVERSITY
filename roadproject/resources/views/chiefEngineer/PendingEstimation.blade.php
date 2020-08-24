@extends('layouts.chiefEngineerLayout')

      @section('content')
     <div class="container"> 
      <p class="red-text text-darken-2 card-panel white center" style="margin-left: 200px;" ><b>Pending Estimation Count: </b><b class="grey-text text-darken-2">{{ $count }}</b></p><br>
      @if($count == 0)
        <img src="/images/no_message.png" alt="" class="resposive-img center" width="50%" style="margin-left: 250px;">
        <h6 class="grey-text center"><b>Appreciate your accountability because there is no Pending Work for you</b></h6>
      @endif 
        <p class="center grey-text text-darken-2">{{ session('msg') }}</p>
        
          @foreach($pending_estimation_ae_ee as $pending_estimations_ae_ee)
          <ul class="collapsible popout" style="margin-left: 200px;">
          <li>
              <div class="collapsible-header grey-text"><i class="material-icons red-text">announcement</i><b class="grey-text text-darken-2">
                {{ $pending_estimations_ae_ee->road_name }} - 
                {{ $pending_estimations_ae_ee->city_or_village }}</b>    -   
                {{ $pending_estimations_ae_ee->damage_level }}
              </div>
              <div class="collapsible-body">
                <span class="grey-text text-darken-2 "><b>Total Estimation Cost - </b>{{ $pending_estimations_ae_ee->total_estimation_cost }}</span>
                <a class="waves-effect waves-blue btn-flat blue white-text right" href="/chiefEngineer/pe/{{ $pending_estimations_ae_ee->id }}">View Estimation More</a>
              </div>
          </li>
     
       </ul>
      @endforeach
      
    </div>

    


      @endsection

