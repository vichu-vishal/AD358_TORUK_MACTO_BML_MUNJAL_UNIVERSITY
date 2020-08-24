@extends('layouts.chiefEngineerLayout')

      @section('content')
      <p class="msg center grey white-text">{{ session('msg') }}</p>
      <div class="container">
          @foreach($complaints as $complaint)
          
          <ul class="collapsible popout" style="margin-left: 200px;">
          <li class="active">
              <div class="collapsible-header grey-text">

                
                <b class="grey-text text-darken-2">
                  {{ $complaint->id }}:{{ $complaint->road_name }}</b>    -   {{ $complaint->damage_level }} -&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b class="btn orange white-text right">{{ $complaint->panchayath_or_municipal }}</b>

                </div> 
              <div class="collapsible-body grey-text">
                <a href="/panchayath/ApprovedComplaintDetail/{{ $complaint->id }}" class="btn blue right">View More</a><br><br>
                @if ($complaint->ri_approval_status == 'approved')
                <i class="material-icons green-text">check_circle</i>
                <span class="green-text"> 
                  Road Inspector
                </span>
               
                 @foreach($inspectiondetail as $inspectiondetails)
                  
                    @if($inspectiondetails->complaint_id == $complaint->id)
                   <span class="right green-text">Inspected on {{ $inspectiondetails->created_at }}</span>
                    @endif
                
                 @endforeach
                
                <hr>
             
                @elseif ($complaint->ri_approval_status == 'declined')
                <i class="material-icons red-text">check_circle</i><span class="red-text"><b>
               Road Inspector</b></span>

                 @foreach($fakecomplaint as $fakecomplaints)
                  
                    @if($fakecomplaints->complaint_id == $complaint->id)
                   <span class="right grey-text text-darken-2">Declined on <b class="red-text"> {{ $fakecomplaints->created_at }} </b></span>
                  <div class="card">
                    <div class="card-image">
                      <img src="{{ asset('/storage/images/RoadInspectionFakeComplaintImage/'.$fakecomplaints->inspection_fake_image) }}" class="materialboxed">
                       <span class="card-title">{{ $fakecomplaints->damage_level }}</span>
                    </div>
                    <div class="card-content">
                        <div class="card-panel red-text text-darken-2"><b class="grey-text text-darken-2">Reason -</b> {{ $fakecomplaints->additional_fake_complaint_description }}
                        </div>
                    </div>
                  </div>
                    @endif
                
                 @endforeach
                
               <hr>
              
               @elseif ($complaint->ri_approval_status == NULL )
                <i class="material-icons grey-text">check_circle</i><span class="grey-text">
               Road Inspector</span><hr>
               @endif
               
              @if ($complaint->ae_approval_status == 'approved')
                <i class="material-icons green-text">check_circle</i>
                <span class="green-text">Assistant Engineer</span>

                @foreach($estimationdetail as $estimationdetails)
                  
                    @if($estimationdetails->complaint_id == $complaint->id)
                   <span class="right green-text">Estimated on {{ $estimationdetails->created_at }}</span>
                    @endif
                
                 @endforeach


                <hr>
              @elseif ($complaint->ae_approval_status == 'lowlevelapproved' )
                <i class="material-icons orange-text">check_circle</i>
                <span class="orange-text">Assistant Engineer</span>
                @foreach($estimationdetail_lowlevel as $estimationdetails_lowlevel)
                  
          @if($estimationdetails_lowlevel->complaint_id == $complaint->id)
                        <span class="right orange-text">Approved and Estimated on {{ $estimationdetails_lowlevel->created_at }}</span>
            <div class="card-panel">
                    @if($complaint->transactionstatus == 'credited')
                        <span class="blue-text text-darken-2 center"><b>Note:</b> Thanks for your patience and soon you see good area road because successfully transaction to <b>Account: {{ $estimationdetails_lowlevel->AccountName }}</b></span>
                    @else
                        <span class="orange-text text-darken-2 center"><b>Note:</b>  Wait untill your transaction being proceed by Government</span>   
                    @endif
            </div>

          @endif
                
                 @endforeach


                <hr>
              @else 
                <i class="material-icons grey-text">check_circle</i>
                <span class="grey-text">Assistant Engineer</span><hr>
              @endif


               @if ($complaint->ee_approval_status == 'approved')
               <i class="material-icons green-text">check_circle</i>
               <span class="green-text"> Executive Engineer</span>
               @foreach($estimationdetail as $estimationdetailed)
                  
                    @if($estimationdetailed->complaint_id == $complaint->id)
                   <span class="right green-text">Estimation Verified on {{ $estimationdetailed->seenbyee }}</span>
                    @endif
                
                 @endforeach

               <hr>
               @elseif ($complaint->ee_approval_status == NULL)
               <i class="material-icons grey-text">check_circle</i>
                <span class="grey-text">Executive Engineer </span><hr>
                @endif

               @if ($complaint->ce_approval_status == 'approved')
               <i class="material-icons green-text">check_circle</i>
               <span class="green-text"> Chief Engineer</span>
               @foreach($estimationdetail as $estimationdetailed)
                  
                    @if($estimationdetailed->complaint_id == $complaint->id)
                   <span class="right green-text">Approved on {{ $estimationdetailed->seenbyce }}</span>
                    @endif
                
                 @endforeach
               @elseif ($complaint->ce_approval_status == NULL)
               <i class="material-icons grey-text">check_circle</i>
                <span class="grey-text">Chief Engineer</span>
               @endif
                
                <!--<a class="waves-effect waves-blue btn-flat blue white-text right" href="/municipal/pc/{{ $complaint->id }}">View More</a>-->
              </div>
          </li>
    
       </ul>
      @endforeach
      <ul class="pagination center">
          <li>
          {{ $complaints->links() }}
        </li>
        </ul> 
    </div>
      @endsection