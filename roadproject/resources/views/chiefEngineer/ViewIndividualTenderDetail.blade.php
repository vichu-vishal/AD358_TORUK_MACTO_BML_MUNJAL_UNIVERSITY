@extends('layouts.chiefEngineerLayout')

      @section('content')
      	<div class="row">
      		<div class="col l10">
      			<div class="card " style="margin-left: 400px;">
				    
             
        		
      			<div class="card-stacked grey-text">
        				<div class="card-content">
        					<b class="grey-text text-darken-2">Complaint Number</b><span class="right">-{{ $tender->complaint_id }}</span><br><hr>
         					<b class="grey-text text-darken-2">State</b><span class="right"> - {{ $tender->state }}</span><br><hr>
         					<b class="grey-text text-darken-2">District</b><span class="right"> - {{ $tender->district }}</span><br><hr>
         					<b class="grey-text text-darken-2">City Or Village</b><span class="right"> - {{ $tender->city_or_village }}</span><br><hr>
         					<b class="grey-text text-darken-2">Panchayath Or Municipal</b><span class="right"> - {{ $tender->panchayath_or_municipal }}</span><br><hr>
         					<b class="grey-text text-darken-2">RoadName</b><span class="right"> - {{ $tender->road_name }}</span><br><hr>
                  <b class="grey-text text-darken-2">RoadNumber</b><span class="right"> - {{ $tender->road_number }}</span><br><hr>
         					<b class="grey-text text-darken-2">DamageLevel</b><span class="right"> - {{ $tender->damage_level }}</span><br><hr>
                  <b class="grey-text text-darken-2">CompanyName/Contracter</b><span class="right"> - {{ $tender->Contracter }}</span><br><hr>
                  <b class="grey-text text-darken-2">RoadSize Length</b><span class="right"> - {{ $tender->RoadSize_Length }}</span><br><hr>
                  <b class="grey-text text-darken-2">RoadSize Breadth</b><span class="right"> - {{ $tender->RoadSize_Breadth }}</span><br><hr>
                  <b class="grey-text text-darken-2">Name of the Work</b><span class="right"> - {{ $tender->name_work }}</span><br><hr>
                  <b class="grey-text text-darken-2">EstimationCost</b><span class="right"> - {{ $tender->estimationCost }}</span><br><hr>
                  <b class="grey-text text-darken-2">EarnestMoney</b><span class="right"> - {{ $tender->earnestMoney }}</span><br><hr>
                  <b class="grey-text text-darken-2">validityPeriod</b><span class="right"> - {{ $tender->validityPeriod }}</span><br><hr>
                  <b class="grey-text text-darken-2">securityDeposit</b><span class="right"> - {{ $tender->securityDeposit }}</span><br><hr>
                  <b class="grey-text text-darken-2">Mode Of Sending Tender</b><span class="right"> - {{ $tender->mode_of_sending_tender }}</span><br><hr>
                  <b class="grey-text text-darken-2">Deadline</b><span class="right"> - {{ $tender->deadline }}</span><br><hr>
                  <b class="grey-text text-darken-2">Mode Of Quality Rate</b><span class="right"> - {{ $tender->mode_of_quality_rate }}</span><br><hr>
                  <b class="grey-text text-darken-2">Tender Issue Date</b><span class="right"> - {{ $tender->tender_issue_date }}</span><br><hr>
                  <b class="grey-text text-darken-2">Tender Receive Date</b><span class="right"> - {{ $tender->tender_receive_date }}</span><br><hr>
                  <b class="grey-text text-darken-2">Contracter</b><span class="right"> - {{ $tender->Contracter }}</span><br><hr>
                  <b class="grey-text text-darken-2">Buisness Full Address</b><span class="right"> - {{ $tender->buisness_full_address }}</span><br><hr>
                  <b class="grey-text text-darken-2">Telephone Office</b><span class="right"> - {{ $tender->telephone_office }}</span><br><hr>
                  <b class="grey-text text-darken-2">Telephone Residential</b><span class="right"> - {{ $tender->telephone_residential }}</span><br><hr>
                  <b class="grey-text text-darken-2">Residential Address</b><span class="right"> - {{ $tender->residential_address }}</span><br><hr>
                  <b class="grey-text text-darken-2">Income Tax Address</b><span class="right"> - {{ $tender->income_tax_address }}</span><br><hr>
       					 </div>
      </div>
      		    </div>
      	    </div>
       </div>

      @endsection

      	

    