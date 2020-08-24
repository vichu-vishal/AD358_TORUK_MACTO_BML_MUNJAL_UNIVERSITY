@extends('layouts.assistantEngineerLayout')

      @section('content')
      <div class="container">
          <!--chart open-->
 <p class="orange-text text-darken-2 card-panel white center" style="margin-left: 300px;" ><b>Need to updation: </b><b class="grey-text text-darken-2">{{ $tender_count }}</b></p>
          <!--chart closed-->
          
          @foreach($tender as $tender_detail)
          <ul class="collapsible popout" style="margin-left: 200px;">
          <li>
              <div class="collapsible-header grey-text"><i class="material-icons green-text">mark_email_read</i><b class="orange-text">Need to update -  </b><b class="grey-text text-darken-2">

                {{ $tender_detail->Contracter }} - 
                {{ $tender_detail->city_or_village }}</b>    -   
                {{ $tender_detail->damage_level }}
              </div>
              <div class="collapsible-body">
                <span class="grey-text text-darken-2 "><b>Total Estimation Cost - </b>{{ $tender_detail->estimationCost }}

                </span> 
                <br><br> 
                 
                
                <a class="waves-effect waves-blue btn-flat blue white-text" href="/assistantengineer/ongoingupdation/{{ $tender_detail->id }}">Update The Work</a>
              </div> 
          </li>
          </ul>
      @endforeach
     </div>
      @endsection