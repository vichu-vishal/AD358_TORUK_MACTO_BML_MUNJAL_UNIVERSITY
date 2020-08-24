 @extends('layouts.executiveEngineerLayout')

      @section('content')
      <style type="text/css">
      	.card .card-action a:not(.btn):not(.btn-large):not(.btn-small):not(.btn-large):not(.btn-floating){
      		color: white;
      	}

    .one{
      width: 400px;
      height: 800px;
      margin-left: 400px;
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
          <span class="card-title">Pending Estimation</span>
          <a class="btn-floating pulse halfway-fab waves-effect waves-light grey lighten-4"><i class="material-icons red-text">schedule</i></a>
          <p>Total Count : <b>{{ $count }}</b></p>
        </div>
        <div class="divider blue lighten-5"></div>
        <div class="card-action white-text" style=" background: linear-gradient(to right, #240b36  , #c31432);">
          <a href="/executiveEngineer/pe">View More</a>
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
          <p>Total Count : <b>{{ $estimation_count }}</b></p>
        </div>
        <div class="divider blue lighten-5"></div>
        <div class="card-action white-text" style=" background: linear-gradient(to right, #4a148c , #d500f9);">
          <a href="/executiveEngineer/UploadedEstimationDetail">View More</a>
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
          <a href="/executiveEngineer/finishedcomplaint">View More</a>
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
    type: 'horizontalBar',
    data: {
        labels: ['pending estimation', 'approved estimation',],
        datasets: [{
            label: 'total count',
           
            data: [{{ $count }}, {{ $estimation_count }}],
            backgroundColor: [
                'rgba(252, 3, 23, 0.8)',
                'rgba(54, 162, 235, 0.8)'
                
            ],
            borderColor: [
                'rgba(255, 99, 132, 1)',
                'rgba(54, 162, 235, 1)'
                
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
    type: 'doughnut',
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