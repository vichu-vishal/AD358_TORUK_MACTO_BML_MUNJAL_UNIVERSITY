<!DOCTYPE html>
<html>
<head>
	<title>Tender Detail</title>
	<style>
table {
  font-family: arial, sans-serif;
  border-collapse: collapse;
  width: 100%;
}
th{
	background-color: rgb(92, 87, 86);
	color: white;
}
td{
	color: rgb(92, 87, 86);
}
td, th {
  border: 1px solid #dddddd;
  text-align: left;
  padding: 15px;
}

tr:nth-child(even) {
  background-color: rgb(240, 242, 242);
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
    <th>panchayath or municipal</th>
    <td>{{ $data->panchayath_or_municipal}}</td>
  </tr>
   <tr>
    <th>panchayath or municipal</th>
    <td>{{ $data->panchayath_or_municipal}}</td>
  </tr>
   <tr>
    <th>panchayath or municipal</th>
    <td>{{ $data->panchayath_or_municipal}}</td>
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
    <th>Damage Level</th>
    <td>{{ $data->damage_level}}</td>
  </tr>
  <tr>
    <th>Road size length</th>
    <td>{{ $data->RoadSize_Length}}</td>
  </tr>
  <tr>
    <th>Road size breadth</th>
    <td>{{ $data->RoadSize_Breadth}}</td>
  </tr>
  <tr>
    <th>Name of the Project</th>
    <td>{{ $data->name_work}}</td>
  </tr>
  <tr>
    <th>Estimation cost</th>
    <td>{{ $data->estimationCost}}</td>
  </tr>
  <tr>
    <th>Earnest Money</th>
    <td>{{ $data->earnestMoney}}</td>
  </tr>
  <tr>
    <th>Validity Period</th>
    <td>{{ $data->validityPeriod}}</td>
  </tr>
  <tr>
    <th>Security Deposit</th>
    <td>{{ $data->securityDeposit}}</td>
  </tr>
  <tr>
    <th>Mode of sending tender</th>
    <td>{{ $data->mode_of_sending_tender}}</td>
  </tr>
  <tr>
    <th>Date on or before which the date tender must reach in office</th>
    <td>{{ $data->deadline}}</td>
  </tr>
   <tr>
    <th>Mode of quality rate</th>
    <td>{{ $data->mode_of_quality_rate}}</td>
  </tr>
  <tr>
    <th>Tender Issue Date</th>
    <td>{{ $data->tender_issue_date}}</td>
  </tr>
  <tr>
    <th>Tender Receiving Date</th>
    <td>{{ $data->tender_receive_date}}</td>
  </tr>
 </table>
<br><br>
<hr>
<h1 style="text-align: center; color: grey; letter-spacing: 2px;">Contracter Details</h1>
<hr>
 		<!--Contracter Details-->
<br><br>
 <table style="width:100%">
 		
 	<tr>
    <th>Name of the Contracter/Company</th>
    <td>{{ $data->Contracter}}</td>
  </tr>
  <tr>
    <th>The buisness place Full address</th>
    <td>{{ $data->buisness_full_address}}</td>
  </tr>
   <tr>
    <th>Telephone(office)</th>
    <td>{{ $data->telephone_office}}</td>
  </tr>
   <tr>
    <th>Telephone(Residential)</th>
    <td>{{ $data->telephone_residential}}</td>
  </tr>
   <tr>
    <th>Residential(Address)</th>
    <td>{{ $data->residential_address}}</td>
  </tr>
  <tr>
    <th>Full address of Inc.Tax office</th>
    <td>{{ $data->income_tax_address}}</td>
  </tr>
 </table>
 <br><hr>
 <footer style="color: rgb(63, 64, 66);font-size: 20px;letter-spacing: 2px;">All rights reserved by Govt of Gujarat</footer>

</center>
</body>
</html>