  @extends('layouts.executiveEngineerLayout')

      @section('content')
        <div class="row">
          <div class="col l10">
          <div class="card " style="margin-left: 400px;">
            
            
            
            <div class="card-stacked grey-text">
                <div class="card-content">
                  <b class="grey-text text-darken-2">Complaint Number</b><span class="right">-{{ $estimation_detail->complaint_id }}</span><br><hr>
                  <b class="grey-text text-darken-2">State</b><span class="right"> - {{ $estimation_detail->state }}</span><br><hr>
                  <b class="grey-text text-darken-2">District</b><span class="right"> - {{ $estimation_detail->district }}</span><br><hr>
                  <b class="grey-text text-darken-2">City Or Village</b><span class="right"> - {{ $estimation_detail->city_or_village }}</span><br><hr>
                  <b class="grey-text text-darken-2">City Or Village</b><span class="right"> - {{ $estimation_detail->road_name }}</span><br><hr>
                  <b class="grey-text text-darken-2">RoadSize Length</b><span class="right"> - {{ $estimation_detail->RoadSize_Length }}</span><br><hr>
                  <b class="grey-text text-darken-2">RoadSize Breadth</b><span class="right"> - {{ $estimation_detail->RoadSize_Breadth }}</span><br><hr>
                  
                  <b class="grey-text text-darken-2">Total Estimation Cost</b><span class="right"> - {{ $estimation_detail->total_estimation_cost }}</span><br><hr>
                  <b class="grey-text text-darken-2">DamageLevel</b><span class="right"> - {{ $estimation_detail->damage_level }}</span><br><hr>
                  <!--equipment table opened-->
                  <div class="row">
                    <div class="col l4">
                  <table class="grey-text text-darken-2">
                  <thead>
                    <tr>
                            <th>Equipment</th>
                            
                    </tr>
                  </thead>
                  <tbody>
                      @foreach($estimation_detail->equipment as $equipments)
                    <tr>
 
                            <td>{{ $equipments }}</td>
                    
                    </tr>
                      @endforeach
                    </tbody>
                  </table>
                </div>

                <div class="col l4">
                  <table class="grey-text text-darken-2">
                  <thead>
                    <tr>
                            <th>Equipment Quantity</th>
                            
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($estimation_detail->equipment_quantity as $equipments_quantity)
                    <tr>
 
                            <td>{{ $equipments_quantity }}</td>
                    
                    </tr>
                      @endforeach
                      
                    </tbody>
                  </table>
                </div>

                <div class="col l4">
                  <table class="grey-text text-darken-2">
                  <thead>
                    <tr>
                            <th>Equipment Cost</th>
                            
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($estimation_detail->equipment_cost as $equipments_cost)
                    <tr>
 
                            <td>{{ $equipments_cost }}</td>
                    
                    </tr>
                      @endforeach
                      
                    </tbody>
                  </table>
                </div>
              </div><hr>

               <!--equipment table closed-->        
               <!--equipment table opened-->
                  <div class="row">
                    <div class="col l4">
                  <table class="grey-text text-darken-2">
                  <thead>
                    <tr>
                            <th>Road Furnitures</th>
                            
                    </tr>
                  </thead>
                  <tbody>
                      @foreach($estimation_detail->roadfurnitures as $roadfurnitures)
                    <tr>
 
                            <td>{{ $roadfurnitures }}</td>
                    
                    </tr>
                      @endforeach
                    </tbody>
                  </table>
                </div>

                <div class="col l4">
                  <table class="grey-text text-darken-2">
                  <thead>
                    <tr>
                            <th>Road Furnitures Quantity</th>
                            
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($estimation_detail->roadfurnitures_quantity as $roadfurnitures_quantity)
                    <tr>
 
                            <td>{{ $roadfurnitures_quantity }}</td>
                    
                    </tr>
                      @endforeach
                      
                    </tbody>
                  </table>
                </div>

                <div class="col l4">
                  <table class="grey-text text-darken-2">
                  <thead>
                    <tr>
                            <th>Road Furnitures Cost</th>
                            
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($estimation_detail->roadfurnitures_cost as $roadfurnitures_cost)
                    <tr>
 
                            <td>{{ $roadfurnitures_cost }}</td>
                    
                    </tr>
                      @endforeach
                      
                    </tbody>
                  </table>
                </div>
              </div><hr>

               <!--equipment table closed-->        
                 
        
            
      
                  
                 </div>
                <div class="card-action">
                   <a href="/executiveEngineer/update/{{ $estimation_detail->complaint_id }}" class="btn btn-large" name = "ee_forwarded_time"><i class="large material-icons left">send</i>Forward To CE</a>
                   <a href="/executiveEngineer/editestimationdetails/{{ $estimation_detail->id }}" class="btn btn-large blue" name = "ee_forwarded_time"><i class="large material-icons left">fact_check</i>Update and Forward To CE</a>

                </div>
            </div>
          </div>
            </div>
       </div>

      @endsection

        

    