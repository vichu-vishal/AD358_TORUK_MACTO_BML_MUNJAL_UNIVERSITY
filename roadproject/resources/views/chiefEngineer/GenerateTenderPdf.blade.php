
<!DOCTYPE html>
<html>
<head>
	<title>Advertise Tender PDF</title>
<style>
table, th, td {
  border: 1px solid grey;
  border-collapse: collapse;
}
th{
	padding: 15px;
  text-align: left;
	background-color: rgb(63, 64, 66);
	color: white;
}
 td {
  padding: 15px;
  text-align: left; 
  color: rgb(63, 64, 66);   
}
tr:nth-child(even) {
  background-color: #dddddd;
}
</style>
</head>
<body>
<center>
<h2>Govt of Gujarat</h2>
<hr>
<h3 style="color: rgb(63, 64, 66);">Department of Road Maintainance</h3>

<table style="width:100%">
  <tr>
    <th>Complaint Number:</th>
    <td>{{ $data->complaint_id}}</td>
  </tr>
  <tr>
    <th>State</th>
    <td>{{ $data->state}}</td>
  </tr>
  <tr>
    <th>District</th>
    <td>{{ $data->district}}</td>
  </tr>
  <tr>
    <th>City/Village</th>
    <td>{{ $data->city_or_village}}</td>
  </tr>
  <tr>
    <th>Road Name</th>
    <td>{{ $data->road_name}}</td>
  </tr>
  <tr>
    <th>Road Number</th>
    <td>{{ $data->road_number}}</td>
  </tr>
  <tr>
    <th>RoadSize Length</th>
    <td>{{ $data->RoadSize_Length}}</td>
  </tr>
  <tr>
    <th>RoadSize Breadth</th>
    <td>{{ $data->RoadSize_Breadth}}</td>
  </tr>
  <tr>
    <th>Damage Level</th>
    <td>{{ $data->damage_level}}</td>
  </tr>
  <tr>
    <th>Total Estimation Cost</th>
    <td>{{ $data->total_estimation_cost}}</td>
  </tr>
  <tr>
    <th>Number of Mazon Needed</th>
    <td>{{ $data->mazon}}</td>
  </tr>
  <tr>
    <th>Total Mazon Cost</th>
    <td>{{ $data->mazon_cost}}</td>
  </tr>
  <tr>
    <th>Number of Mazdoor Needed</th>
    <td>{{ $data->mazdoor}}</td>
  </tr>
  <tr>
    <th>Total Mazdoor Cost</th>
    <td>{{ $data->mazdoor_cost}}</td>
  </tr>
 </table>
 <br><br>
 <table>
  					<!--equipment-->
                    <tr>
                            <th>Equipment</th>
                            
                    
                  
                      @foreach($data->equipment as $equipments)
                    
 
                            <td>{{ $equipments }}</td>

                      @endforeach
                    
                    </tr>
                    <!--equipment quantity-->
                    <tr>
                            <th>Equipment Quantity</th>
                            
                    
                  
                      @foreach($data->equipment_quantity as $equipments_quantity)
                    
 
                            <td>{{ $equipments_quantity }}</td>

                      @endforeach
                    
                    </tr>
                     <!--equipment cost-->
                    <tr>
                            <th>Equipment Cost</th>
                            
                    
                  
                      @foreach($data->equipment_cost as $equipments_cost)
                    
 
                            <td style="">{{ $equipments_cost }}</td>

                      @endforeach
                    
                    </tr>
                    <!--road furniture-->
                    <tr>
                            <th>Road Furntiure Needed</th>
                            
                    
                  
                      @foreach($data->roadfurnitures as $roadfurnitures)
                    
 
                            <td>{{ $roadfurnitures }}</td>

                      @endforeach
                    
                    </tr>
                    <!--road furniture quantity-->
                    <tr>
                            <th>Number of Road Furniture Needed</th>
                            
                    
                  
                      @foreach($data->roadfurnitures_quantity as $roadfurnitures_quantity)
                    
 
                            <td>{{ $roadfurnitures_quantity }}</td>

                      @endforeach
                    
                    </tr>
                     <!--road furniture cost-->
                    <tr>
                            <th>Total Cost for Road Furniture</th>
                            
                    
                  
                      @foreach($data->roadfurnitures_cost as $roadfurnitures_cost)
                    
 
                            <td>{{ $roadfurnitures_cost }}</td>

                      @endforeach
                    
                    </tr>
                      


  
  
  
</table>
</center>
</body>
</html>
