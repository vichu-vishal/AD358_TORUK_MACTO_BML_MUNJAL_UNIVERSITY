@extends('layouts.chiefEngineerLayout')
	 @section('content')
 
<div class="row">
    <div class="col s12">
      <ul class="tabs">
        <li class="tab col l3 offset-l3"><a class="active" href="#test1">Generate PDF by Date</a></li>
        <li class="tab col l3"><a href="#test2">Generate PDF by Location</a></li>
        
        <li class="tab col l3"><a href="#test3">Generate PDF by damage level & location</a></li>
      </ul>
    </div>
    
    
    
    
  </div>

	<div class="container" >
    <div id="test1" class="col s12">
		<form method="get" action="/record" style="margin-left: 300px;" id="form1">
    		<div class="row"> 
        		<div class="input-field col s3">
         			 <input  id="data" type="date" class="validate" name="data1" value="NULL">
         			 <label for="data">From date</label>
        		</div>
        		<div class="input-field col s3">
          			<input  id="data" type="date" class="validate" name="data2" value="NULL">
          			<label for="data">To date</label>
        		</div>
        	
       			<div class="col s12 l6">
          			<input type="submit" name="" class="btn-large blue white-text" value="Search">
       			</div><br><br>
    		</div>
		</form>
  
  
		<form method="get" action="/reportpdf" style="margin-left: 300px;">
			
          <div class="row"> 
        		<div class="input-field col s3">
         			 <input  id="data" type="date" class="validate" name="data1">
         			 <label for="data">From date</label>
        		</div>
        		<div class="input-field col s3">
          			<input  id="data" type="date" class="validate" name="data2">
          			<label for="data">To date</label>
        		</div>
       			<div class="col s12 l6">
          			<input type="submit" name="" class="btn-large red white-text" value="generate pdf">
       			</div><br><br>
    		</div>
         <!--Total inspection chart-->
<div class="row" id="chart">
  <!--approved and declined- panchayath opened -->
  <div class="col l10 z-depth-5 ">
    
      <div class="tot_inspection"><canvas id="myChart"></canvas></div>
<script>
var ctx = document.getElementById('myChart');
var myChart = new Chart(ctx, {
    type: 'doughnut',
    data: {
        labels: ['search recored', 'Total Record' ],
        datasets: [{
            label: 'count',
            data: [ {{ $approved_estimation_details_count }}, {{ $total_count }}
            ],
            backgroundColor: [
                'rgba(54, 162, 235, 0.8)',
                'rgba(54, 162, 235, 0.4)',
                'rgba(255, 206, 86, 0.8)',
                'rgba(75, 192, 192, 0.8)'
                
            ],
            borderColor: [
                'rgba(54, 162, 235, 1)',
                'rgba(54, 162, 235, 0.4)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)'
                
            ],
            borderWidth: 3
        }]
    },
    options: {
        scales: {
            yAxes: [{
                ticks: {
                    beginAtZero: true
                }
            }]
            }
    }
});
</script>
<p class="card-panel white grey-text "><b >Approved estimation based on damage level</b></p>
  </div>
</div>

       			
		</form>
  </div>
  <div id="test2" class="col s12">
    <form method="get" action="/locationreportpdf" style="margin-left: 300px;">
      
          <div class="row"> 
            <div class="input-field col s3">
               <input  id="data" type="date" class="validate" name="data1">
               <label for="data">From date</label>
            </div>
            <div class="input-field col s3">
                <input  id="data" type="date" class="validate" name="data2">
                <label for="data">To date</label>
            </div>
            <div class="input-field col s3">
                <input  id="data" type="text" class="validate" name="data3">
                <label for="data">city/village</label>
            </div>
            <div class="col s12 l6">
                <input type="submit" name="" class="btn-large red white-text" value="generate pdf by location">
            </div><br><br>
        </div>
            
    </form>
  </div>
  <div id="test3" class="col s12">
    <form method="get" action="/damagelevelreportpdf" style="margin-left: 300px;">
      
          <div class="row"> 
            <div class="input-field col s3">
               <input  id="data" type="date" class="validate" name="data1">
               <label for="data">From date</label>
            </div>
            <div class="input-field col s3">
                <input  id="data" type="date" class="validate" name="data2">
                <label for="data">To date</label>
            </div>
            <div class="input-field col s3">
                <input  id="data" type="text" class="validate" name="data3">
                <label for="data">city/village</label>
            </div>
            <div class="input-field col s3">
                <input  id="data" type="text" class="validate" name="data4">
                <label for="data">damage level</label>
            </div>
            <div class="col s12 l6">
                <input type="submit" name="" class="btn-large red white-text" value="generate pdf by location and DamageLevel">
            </div><br><br>
        </div>
            
      </form>
    </div>
    
		
	</div>

<div class="container">
          <!--chart open-->

          <!--chart closed-->
          <p class="grey-text center">Search Result: <b>{{ $approved_estimation_details_count }}</b></p>
          @foreach($approved_estimation_details as $estimation_detail)
          <ul class="collapsible popout" style="margin-left: 200px;"> 
          <li>
              <div class="collapsible-header grey-text"><i class="material-icons green-text">mark_email_read</i><b class="grey-text text-darken-2">
                {{ $estimation_detail->road_name }} - 
                {{ $estimation_detail->city_or_village }}</b>    -   
                {{ $estimation_detail->damage_level }}
              </div>
              <div class="collapsible-body">
                <div class="row">
          <div class="col l10">
          <div class="card">
            
            
             
            <div class="card-stacked grey-text">
                <div class="card-content">
                  <b class="grey-text text-darken-2">Complaint Number</b><span class="right">-{{ $estimation_detail->complaint_id }}</span><br><hr>
                  <b class="grey-text text-darken-2">State</b><span class="right"> - {{ $estimation_detail->state }}</span><br><hr>
                  <b class="grey-text text-darken-2">District</b><span class="right"> - {{ $estimation_detail->district }}</span><br><hr>
                  <b class="grey-text text-darken-2">City Or Village</b><span class="right"> - {{ $estimation_detail->city_or_village }}</span><br><hr>
                  <b class="grey-text text-darken-2">RoadSize Length</b><span class="right"> - {{ $estimation_detail->RoadSize_Length }}</span><br><hr>
                  <b class="grey-text text-darken-2">RoadSize Breadth</b><span class="right"> - {{ $estimation_detail->RoadSize_Breadth }}</span><br><hr>
                  <b class="grey-text text-darken-2">Road Name</b><span class="right"> - {{ $estimation_detail->road_name }}</span><br><hr>
                  <b class="grey-text text-darken-2">Road Number</b><span class="right"> - {{ $estimation_detail->road_number }}</span><br><hr>
                  
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
                   <!--<a href="/chiefEngineer/update/{{ $estimation_detail->complaint_id }}" class="btn btn-large"><i class="large material-icons left">send</i>Approved</a>--> 
                   

                </div>
            </div>
          </div>
            </div>
       </div>

     
                
              </div> 
          </li>
          </ul>
      @endforeach
     
          </div>
        
     
	 @endsection
