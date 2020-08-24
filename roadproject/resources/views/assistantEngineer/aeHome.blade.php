 @extends('layouts.assistantEngineerLayout')

      @section('content')
      <style type="text/css">
      	.card .card-action a:not(.btn):not(.btn-large):not(.btn-small):not(.btn-large):not(.btn-floating){
      		color: white;
      	}
         #chart{
          margin-left: 320px;

        }
        .tot_inspection{
         width="600"; 
          height="600";
          padding-top: 10px;
        }
        .tot_inspection_doughnut
        {
          width="600"; 
          height="1000";
          padding-top: 10px;
        }
  
      </style>
      @if( Session::has('lowlevelestimationmsg'))
  <script>
        document.addEventListener('DOMContentLoaded', function () {
            var Modalelem = document.querySelector('.modal');
            var instance = M.Modal.init(Modalelem);
      var preventScrolling = false;
            instance.open();
        });

</script>
@endif




<body>

   <!-- Modal Structure -->
  <div id="modal1" class="modal modal-fixed-footer" style="background: white;">
    <div class="modal-content">
       <div class="row">
      <div class="col s12 l6">
        <img src="/images/approved.gif" width="130%">
      </div>
          <div class="col s12 l6">
        <p class="grey-text text-darken-2" style="margin-top: 50px;padding: 20px; font-size: 25px;" >
         Pretty Cool, You are doing a Excellent Work and appreciate your Powerful Accountability
        <p class="grey-text text-darken-2 z-depth-3" style="padding: 20px;"><b>{{ session('lowlevelestimationmsg') }}</b></p>
        </p>
      </div>
    </div>
   </div>
    <div class="modal-footer" style="background: white;">
      <a href="#!" class="modal-close btn-flat btn-medium white blue-text">Close</a>
    </div>
  </div>
  <!---end modal structure-->


<div class="row">
  <!--welcome message of card-->
	<div class="col l3 s12 md12  offset-1">
		<div class="card blue-grey darken-1 z-depth-5 hide-on-med-and-up hide-on-small-only" style=" background: linear-gradient(to right, #8e24aa  , #ce93d8);">
        <div class="card-content white-text">
          <span class="card-title">WELCOME</span>
          <p>Pending Complaints</p>
          <p>Ongoing Complaints</p>
          <p>Finished Details</p>
        </div>
        <div class="divider grey lighten-5"></div>
        <div class="card-action"  style=" background: linear-gradient(to right, #8e24aa  , #ce93d8);">
          <a href="#">View More</a>
        </div>
    </div>
	</div>
  <!--ended welcome message of card-->

  <!--Pending complaints count card start-->
	<div class="col l3 s12 md12 offset-1">
		<div class="card blue-grey darken-1 z-depth-5" style=" background: linear-gradient(to right, #240b36  , #c31432);">
        <div class="card-content white-text">
          <span class="card-title">Pending Complaints</span>
          <a class="btn-floating pulse halfway-fab waves-effect waves-light grey lighten-4"><i class="material-icons red-text">schedule</i></a>
          <p>Total Count : <b>{{ $count }}</b> (High Level)</p>
          <p>Total Count : <b>{{ $count_lowlevel }}</b> (Low Level)</p>
        </div>
        <div class="divider blue lighten-5"></div>
        <div class="card-action white-text" style=" background: linear-gradient(to right, #240b36  , #c31432);">
          <a href="/assistantengineer/pc">View More</a>
        </div>
    </div>
	</div>
  <!--ended Pending complaints count card start-->

  <!--Estimation uploaded count card started-->
	<div class="col l3 s12 md12">
		<div class="card blue-grey darken-1 z-depth-5" style=" background: linear-gradient(to right, #4a148c , #d500f9);">
        <div class="card-content white-text">
          <span class="card-title">Estimation uploaded</span>
          <a class="btn-floating halfway-fab waves-effect waves-light grey lighten-4"><i class="material-icons  purple-text accent-3">cloud_upload</i></a>
          <p>Total Count : <b>{{ $estimation_details_uploaded_count }}</b></p>
        </div>
        <div class="divider blue lighten-5"></div>
        <div class="card-action white-text" style=" background: linear-gradient(to right, #4a148c , #d500f9);">
          <a href="/assistantengineer/estimationdetails">View More</a>
        </div>
    </div>
	</div>
  <!--Estimation uploaded count card started-->

  <!--Finished Complaints count card started-->
	<div class="col l3 s12 md12">
		<div class="card blue-grey darken-1 z-depth-5" style=" background: linear-gradient(to right, #2196f3  , #90caf9);">
        <div class="card-content white-text">
          <span class="card-title">Finished Complaints</span>
           <a class="btn-floating halfway-fab waves-effect waves-light grey lighten-4"><i class="material-icons blue-text">check_circle</i></a>
          <p>Total Count: <b>{{ $finish }}</b></p>
        </div>
        <div class="divider blue lighten-5"></div>
        <div class="card-action white-text" style=" background: linear-gradient(to right, #2196f3  , #90caf9);">
          <a href="/assistantengineer/finishedcomplaint">View More</a>
        </div>
      </div>
	</div>
  <!--Ended Finished Complaints count card started-->
</div>
<!--Total inspection chart-->
<div class="row" id="chart">
  <!--approved and declined- panchayath opened -->
  <div class="col l5 z-depth-5">
<div class="tot_inspection"><canvas id="myChart" ></canvas></div>
<script>

var ctx = document.getElementById('myChart');
var myChart = new Chart(ctx, {
    type: 'doughnut',
    data: {
        labels: ['pending estimation', 'approved estimation','finished project'],
        datasets: [{
            label: 'total count',
           
            data: [{{ $count }}, {{ $approved_count }}, {{ $finish }}],
            backgroundColor: [
                'rgba(252, 3, 23, 0.8)',
                'rgba(54, 162, 235, 0.8)',
                'rgba(21, 161, 30, 0.7)'
            ],
            borderColor: [
                'rgba(255, 99, 132, 1)',
                'rgba(54, 162, 235, 1)',
                'rgba(21, 161, 30, 1)'
                
            ],
            borderWidth: 1
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
<p class="card-panel white grey-text text-darken-1 center"><b> Pending and Approved Estimations </b></p>

</div>
<!--approved and declined- panchayath opened -->
  <div class="col l6 z-depth-5" style="margin-left: 20px;">
<div class="tot_inspection"><canvas id="myChart1" ></canvas></div>
<script>

var ctx = document.getElementById('myChart1');
var myChart = new Chart(ctx, {
    type: 'line',
    data: {
        labels: ['level1', 'level2', 'level3', 'level4'],
        datasets: [{
            label: 'total count',
           
            data: [{{ $approved_estimation_count_level1 }}, 
            {{ $approved_estimation_count_level2 }}, 
            {{ $approved_estimation_count_level3 }}, 
            {{ $approved_estimation_count_level4 }}],
            backgroundColor: [
                'rgba(66, 172, 237, 0.5)',
                'rgba(66, 172, 237, 1)',
                'rgba(217, 15, 25, 0.5)',
                'rgba(217, 15, 25, 0.9)'
                
            ],
            borderColor: [
                'rgba(66, 172, 237, 1)',
                'rgba(66, 172, 237, 1)',
                'rgba(217, 15, 25, 1)',
                'rgba(217, 15, 25, 1)'
                
            ],
            borderWidth: 1
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
<p class="card-panel white grey-text text-darken-1 center"><b>Approved Estimations Based on damage level </b></p>

</div>
</div>





       @endsection