@extends('layouts.roadinspectorLayout')

      @section('content')
      <style type="text/css">
        .tabs .tab a:focus, .tabs .tab a:focus.active {
        background-color: white;
        }
        .tabs .indicator
         {
          background-color: grey;
        }
      </style>
      
      
 			  <p class="msg blue-text center-align"><b>{{ session('msg') }}</b></p>

      <div class="container">
        <div class="row">
          <div class="col s12">
            <ul class="tabs tabs-fixed-width tab-demo z-depth-1" style="margin-left: 150px;">
              <li class="tab"><a class="active green-text white" href="#approved"><b>Approved Complaints</b></a></li>
              <li class="tab"><a class="red-text " href="#declined"><b>Declined Complaints</b></a></li>
            </ul>
<!--approved complaints -panchayath and municipal open-->
        <div id="approved">   
          <div class="row">
            <div class="col s12">
              <ul class="tabs tabs-fixed-width tab-demo z-depth-1" style="margin-left: 150px;">
                 <li class="tab"><a class="active green-text" href="#approved_panchayath"><b>Panchayath <span  class="grey-text text-darken-2">{{ $complaints_riapproved_panchayath_count }}</span></b></a></li>
                 <li class="tab"><a class="green-text" href="#approved_municipal"><b>Municipal <span class="grey-text text-darken-2">{{ $complaints_riapproved_municipal_count }}</span></b></a></li>
              </ul>

              <!--panchayath approved complaints open -->

                  <div id="approved_panchayath">    
                       @foreach($complaints_riapproved_panchayath as $complaints_riapproved_panchayaths)
                        <ul class="collapsible popout" style="margin-left: 200px;">
                            <li>
                                <div class="collapsible-header grey-text"><i class="material-icons green-text">mark_email_read</i><b class="grey-text text-darken-2">From {{ $complaints_riapproved_panchayaths->panchayath_or_municipal }} :  
                                  {{ $complaints_riapproved_panchayaths->road_name }} -
                                  {{ $complaints_riapproved_panchayaths->city_or_village }}</b>    -   {{ $complaints_riapproved_panchayaths->damage_level }}
                                </div>
                                <div class="collapsible-body">
                                <span>
                                  <div class="card">
                                    <div class="card-image">
                                   <img src="{{ asset('/storage/images/RoadInspectionImage/'.$complaints_riapproved_panchayaths->inspection_image) }}" class="materialboxed">
                                   <div class="card-title"><b>Inspected On : </b>{{ $complaints_riapproved_panchayaths->created_at }}</div>
                                 </div>
                               </div>
                                  <b class="grey-text text-darken-2">State: </b>
                                  {{ $complaints_riapproved_panchayaths->state
                                   }}<br><hr>
                                   <b class="grey-text text-darken-2">District: </b>
                                  {{ $complaints_riapproved_panchayaths->district 
                                   }}<br><hr>
                                   <b class="grey-text text-darken-2">City/Village: </b>
                                  {{ $complaints_riapproved_panchayaths->city_or_village 
                                   }}<br><hr>
                                   <b class="grey-text text-darken-2">Road Name: </b>
                                  {{ $complaints_riapproved_panchayaths->road_name
                                   }}<br><hr>
                                   <b class="grey-text text-darken-2">Road Number: </b>
                                  {{ $complaints_riapproved_panchayaths->road_number }}<br><hr>
                                  <b class="grey-text text-darken-2">Panchayath/Municipal: </b>
                                  {{ $complaints_riapproved_panchayaths->panchayath_or_municipal
                                   }}<br><hr>
                                  <b class="grey-text text-darken-2">RoadSize Length: </b>
                                  {{ $complaints_riapproved_panchayaths->RoadSize_Length
                                   }}<br><hr>
                                  <b class="grey-text text-darken-2">RoadSize Breadth: </b>
                                  {{ $complaints_riapproved_panchayaths->RoadSize_Breadth
                                   }}<br><hr>
                                  <b class="grey-text text-darken-2">Budget: </b>
                                  {{ $complaints_riapproved_panchayaths->budget
                                   }}<br><hr>
                                  <b class="grey-text text-darken-2">TotalCost: </b>
                                  {{ $complaints_riapproved_panchayaths->totalCost
                                   }}<br><hr>
                                  <b class="grey-text text-darken-2">Damage Level: </b>
                                  {{ $complaints_riapproved_panchayaths->damage_level
                                   }}<br><hr>
                                  <b class="grey-text text-darken-2">Description: </b>
                                  {{ $complaints_riapproved_panchayaths->additional_inspection_description 
                                   }}<br><hr>
                                </span>
                                
                                
                                </div>
                            </li>
                        </ul>
                       @endforeach
                  </div>

              <!--panchayath approved complaints closed-->
              <!--municipal approved complaints open -->

                  <div id="approved_municipal">    
                       @foreach($complaints_riapproved_municipal as $complaints_riapproved_municipals)
                        <ul class="collapsible popout" style="margin-left: 200px;">
                            <li>
                                <div class="collapsible-header grey-text"><i class="material-icons green-text">mark_email_read</i><b class="grey-text text-darken-2">From 
                                  {{ $complaints_riapproved_municipals->panchayath_or_municipal }} : 
                                   {{ $complaints_riapproved_municipals->road_name }} -
                                  {{ $complaints_riapproved_municipals->city_or_village }}

                                </b>    -   {{ $complaints_riapproved_municipals->damage_level }}
                                </div>
                                <div class="collapsible-body">
                                <span>
                                  <div class="card">
                                    <div class="card-image">
                                   <img src="{{ asset('/storage/images/RoadInspectionImage/'.$complaints_riapproved_municipals->inspection_image) }}" class="materialboxed">
                                   <div class="card-title"><b>Inspected On : </b>{{ $complaints_riapproved_municipals->created_at }}</div>
                                 </div>
                               </div>
                                  <b class="grey-text text-darken-2">State: </b>
                                  {{ $complaints_riapproved_municipals->state
                                   }}<br><hr>
                                   <b class="grey-text text-darken-2">District: </b>
                                  {{ $complaints_riapproved_municipals->district 
                                   }}<br><hr>
                                   <b class="grey-text text-darken-2">City/Village: </b>
                                  {{ $complaints_riapproved_municipals->city_or_village 
                                   }}<br><hr>
                                   <b class="grey-text text-darken-2">Road Name: </b>
                                  {{ $complaints_riapproved_municipals->road_name
                                   }}<br><hr>
                                   <b class="grey-text text-darken-2">Road Number: </b>
                                  {{ $complaints_riapproved_municipals->road_number }}<br><hr>
                                  <b class="grey-text text-darken-2">Panchayath/Municipal: </b>
                                  {{ $complaints_riapproved_municipals->panchayath_or_municipal
                                   }}<br><hr>
                                  <b class="grey-text text-darken-2">RoadSize Length: </b>
                                  {{ $complaints_riapproved_municipals->RoadSize_Length
                                   }}<br><hr>
                                  <b class="grey-text text-darken-2">RoadSize Breadth: </b>
                                  {{ $complaints_riapproved_municipals->RoadSize_Breadth
                                   }}<br><hr>
                                  <b class="grey-text text-darken-2">Budget: </b>
                                  {{ $complaints_riapproved_municipals->budget
                                   }}<br><hr>
                                  <b class="grey-text text-darken-2">TotalCost: </b>
                                  {{ $complaints_riapproved_municipals->totalCost
                                   }}<br><hr>
                                  <b class="grey-text text-darken-2">Damage Level: </b>
                                  {{ $complaints_riapproved_municipals->damage_level
                                   }}<br><hr>
                                  <b class="grey-text text-darken-2">Description: </b>
                                  {{ $complaints_riapproved_municipals->additional_inspection_description 
                                   }}<br><hr>
                                
                                  
                                </span>
                                 

                                
                                </div>
                            </li>
                        </ul>
                       @endforeach
                  </div>

              <!--municipal approved complaints closed-->
          
            </div>
          </div>
        </div>
<!--approved complaints -panchayath and municipal closed-->
<!--declined complaints -panchayath and municipal open-->
        <div id="declined">    
           <div class="row">
              <div class="col s12">
                  <ul class="tabs tabs-fixed-width tab-demo z-depth-1" style="margin-left: 150px;">
                    <li class="tab"><a class="active red-text" href="#declined_panchayath"><b>Panchayath <span  class="grey-text text-darken-2">{{ $complaints_rideclined_panchayath_count }}</span></b></a></li>
                    <li class="tab"><a class="red-text" href="#declined_municipal"><b>Municipal <span  class="grey-text text-darken-2">{{ $complaints_rideclined_municipal_count }}</span></b></a></li>
                  </ul>

                  <!--panchayath declined complaints open -->

                  <div id="declined_panchayath">    
                       @foreach($complaints_rideclined_panchayath as $complaints_rideclined_panchayaths)
                        <ul class="collapsible popout" style="margin-left: 200px;">
                            <li>
                                <div class="collapsible-header grey-text"><i class="material-icons red-text">mark_email_unread</i><b class="grey-text text-darken-2">From 
                                  {{ $complaints_rideclined_panchayaths->panchayath_or_municipal }} : {{ $complaints_rideclined_panchayaths->road_name }} - 
                                  {{ $complaints_rideclined_panchayaths->city_or_village }}</b>    -   {{ $complaints_rideclined_panchayaths->damage_level }}
                                </div>
                                <div class="collapsible-body">
                                <span>
                                  <div class="card">
                                    <div class="card-image">
                                   <img src="{{ asset('/storage/images/RoadInspectionFakeComplaintImage/'.$complaints_rideclined_panchayaths->inspection_fake_image) }}" class="materialboxed">
                                   <div class="card-title"><b>Inspected On : </b>{{ $complaints_rideclined_panchayaths->created_at }}</div>
                                 </div>
                               </div>
                                  <b class="grey-text text-darken-2">State: </b>
                                  {{ $complaints_rideclined_panchayaths->state
                                   }}<br><hr>
                                   <b class="grey-text text-darken-2">District: </b>
                                  {{ $complaints_rideclined_panchayaths->district 
                                   }}<br><hr>
                                   <b class="grey-text text-darken-2">City/Village: </b>
                                  {{ $complaints_rideclined_panchayaths->city_or_village 
                                   }}<br><hr>
                                   <b class="grey-text text-darken-2">Road Name: </b>
                                  {{ $complaints_rideclined_panchayaths->road_name
                                   }}<br><hr>
                                  <b class="grey-text text-darken-2">Panchayath/Municipal: </b>
                                  {{ $complaints_rideclined_panchayaths->panchayath_or_municipal
                                   }}<br><hr>
                                  <b class="grey-text text-darken-2">Damage Level: </b>
                                  {{ $complaints_rideclined_panchayaths->damage_level
                                   }}<br><hr>
                                  <b class="grey-text text-darken-2">Description: </b>
                                  {{ $complaints_rideclined_panchayaths->additional_fake_complaint_description }}<br><hr>
                                </span>

                                </div>
                            </li>
                        </ul>
                       @endforeach
                  </div>

              <!--panchayath declined complaints closed-->
              <!--municipal declined complaints open -->

                  <div id="declined_municipal">    
                       @foreach($complaints_rideclined_municipal as $complaints_rideclined_municipals)
                        <ul class="collapsible popout" style="margin-left: 200px;">
                            <li>
                                <div class="collapsible-header grey-text"><i class="material-icons red-text">mark_email_unread</i><b class="grey-text text-darken-2">From {{ $complaints_rideclined_municipals->panchayath_or_municipal }} : 
                                  {{ $complaints_rideclined_municipals->road_name }} - 
                                  {{ $complaints_rideclined_municipals->city_or_village }}</b>    -   {{ $complaints_rideclined_municipals->damage_level }}
                                </div>
                                <div class="collapsible-body">
                                <span>
                                  <div class="card">
                                    <div class="card-image">
                                   <img src="{{ asset('/storage/images/RoadInspectionFakeComplaintImage/'.$complaints_rideclined_municipals->inspection_fake_image) }}" class="materialboxed">
                                   <div class="card-title"><b>Inspected On : </b>{{ $complaints_rideclined_municipals->created_at }}</div>
                                 </div>
                               </div>
                                  <b class="grey-text text-darken-2">State: </b>
                                  {{ $complaints_rideclined_municipals->state
                                   }}<br><hr>
                                   <b class="grey-text text-darken-2">District: </b>
                                  {{ $complaints_rideclined_municipals->district 
                                   }}<br><hr>
                                   <b class="grey-text text-darken-2">City/Village: </b>
                                  {{ $complaints_rideclined_municipals->city_or_village 
                                   }}<br><hr>
                                   <b class="grey-text text-darken-2">Road Name: </b>
                                  {{ $complaints_rideclined_municipals->road_name
                                   }}<br><hr>
                                  <b class="grey-text text-darken-2">Panchayath/Municipal: </b>
                                  {{ $complaints_rideclined_municipals->panchayath_or_municipal
                                   }}<br><hr>
                                  <b class="grey-text text-darken-2">Damage Level: </b>
                                  {{ $complaints_rideclined_municipals->damage_level
                                   }}<br><hr>
                                  <b class="grey-text text-darken-2">Description: </b>
                                  {{ $complaints_rideclined_municipals->additional_fake_complaint_description }}<br><hr>
                                
                                  
                                </span>

                                </div>
                            </li>
                        </ul>
                       @endforeach
                  </div>

              <!--municipal declined complaints closed-->
          

              </div>
           </div>
        </div>
 <!--declined complaints -panchayath and municipal closed-->         
          </div>
       </div>
    </div>
    

      @endsection