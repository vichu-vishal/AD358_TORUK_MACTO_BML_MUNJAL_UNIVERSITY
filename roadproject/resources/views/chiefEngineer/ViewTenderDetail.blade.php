@extends('layouts.chiefEngineerLayout')

      @section('content')
      <div class="container">
        <p class="green-text text-darken-2 card-panel white center" style="margin-left: 200px;" ><b>Total Tender Record: </b><b class="grey-text text-darken-2">{{ $tender_count }}</b></p><br>
          <!--chart open-->

          <!--chart closed-->
          
          @foreach($tender as $tender_detail)
          <ul class="collapsible popout" style="margin-left: 200px;">
          <li>
              <div class="collapsible-header grey-text"><i class="material-icons green-text">mark_email_read</i><b class="grey-text text-darken-2">
                {{ $tender_detail->Contracter }} - 
                {{ $tender_detail->city_or_village }}</b>    -   
                {{ $tender_detail->damage_level }}
              </div>
              <div class="collapsible-body">
                <span class="grey-text text-darken-2 "><b>Total Estimation Cost - </b>{{ $tender_detail->total_estimation_cost }}

                </span> 
                <br><br> 
                
                <a class="waves-effect waves-blue btn-flat red white-text" href="/chiefEngineer/tenderdetail/{{ $tender_detail->id }}">Generate Approved Tender PDF</a>
                <a class="waves-effect waves-blue btn-flat blue white-text" href="/chiefEngineer/viewtenderdetail/{{ $tender_detail->id }}">Tender Detail</a>
              </div> 
          </li>
          </ul>
      @endforeach
     </div>
      @endsection