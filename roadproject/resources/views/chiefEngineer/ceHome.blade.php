 @extends('layouts.chiefEngineerLayout')

      @section('content')
      <style type="text/css">
      	.card .card-action a:not(.btn):not(.btn-large):not(.btn-small):not(.btn-large):not(.btn-floating){
      		color: white;
      	}
         #chart{
          margin-left: 320px;
          margin-top: 200px;

        }
        .tot_inspection{
         width="600"; 
          height="600";
          padding-top: 10px;
        }
      </style> 
       @if( Session::has('tendermsg'))
  <script>
        document.addEventListener('DOMContentLoaded', function () {
            var Modalelem = document.querySelector('.modal');
            var instance = M.Modal.init(Modalelem);
      var preventScrolling = false;
            instance.open();
        });

</script>
@endif

  <!-- Modal Structure -->
  <div id="modal1" class="modal modal-fixed-footer" style="background: white;">
    <div class="modal-content">
       <div class="row">
      <div class="col s12 l6">
        <img src="/images/approved.gif" width="130%">
      </div>
          <div class="col s12 l6">
        <p class="grey-text text-darken-2" style="margin-top: 50px;padding: 20px; font-size: 25px;" >
          Appreciate your critical thinking around this project
        <p class="grey-text text-darken-2 z-depth-3" style="padding: 20px;"><b>{{ session('tendermsg') }}</b></p>
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
          <span class="card-title">Pending Estimation</span>
          <a class="btn-floating pulse halfway-fab waves-effect waves-light grey lighten-4"><i class="material-icons red-text">schedule</i></a>
          <p>Total Count : <b>{{ $pending_estimation_count }}</b></p>
        </div>
        <div class="divider blue lighten-5"></div>
        <div class="card-action white-text" style=" background: linear-gradient(to right, #240b36  , #c31432);">
          <a href="/chiefEngineer/pe">View More</a>
        </div>
    </div>
	</div>
  <!--ended Pending complaints count card start-->

  <!--Estimation uploaded count card started-->
	<div class="col l3 s12 md12">
		<div class="card blue-grey darken-1 z-depth-5" style=" background: linear-gradient(to right, #4a148c , #d500f9);">
        <div class="card-content white-text">
          <span class="card-title">Estimation Approved</span>
          <a class="btn-floating halfway-fab waves-effect waves-light grey lighten-4"><i class="material-icons  purple-text accent-3">cloud_upload</i></a>
          <p>Total Count : <b>{{ $approved_estimation_count }}</b></p>
        </div>
        <div class="divider blue lighten-5"></div>
        <div class="card-action white-text" style=" background: linear-gradient(to right, #4a148c , #d500f9);">
          <a href="/chiefEngineer/approved_details">View More</a>
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
          <a href="/chiefEngineer/finishedcomplaint">View More</a>
        </div>
      </div>
	</div>
<br>

  <!--Ended Finished Complaints count card started-->
  <!--Total inspection chart-->
<div class="row" id="chart">
  <!--approved and declined- panchayath opened -->
  <div class="col l5 z-depth-5">
    
      <div class="tot_inspection"><canvas id="myChart"></canvas></div>
<script>
var ctx = document.getElementById('myChart');
var myChart = new Chart(ctx, {
    type: 'line',
    data: {
        labels: ['level1', 'level2', 'level3', 'level4'],
        datasets: [{
            label: 'count',
            data: [{{ $approved_estimation_count_level1 }}, 
            {{ $approved_estimation_count_level2 }}, 
            {{ $approved_estimation_count_level3 }}, 
            {{ $approved_estimation_count_level4 }}
            ],
            backgroundColor: [
                'rgba(54, 162, 235, 0.8)',
                'rgba(255, 99, 132, 0.8)',
                'rgba(255, 206, 86, 0.8)',
                'rgba(75, 192, 192, 0.8)'
                
            ],
            borderColor: [
                'rgba(54, 162, 235, 1)',
                'rgba(255, 99, 132, 1)',
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
 <!--approved and declined- panchayath closed -->
 <!--pending and inspection complaint- municipal opened -->
<div class="col l6 z-depth-5 " style="margin-left: 20px;">
<div class="tot_inspection"><canvas id="myChart1"></canvas></div>
  <script>
var ctx = document.getElementById('myChart1');
var myChart = new Chart(ctx, {
    type: 'doughnut',
    data: {
        labels: ['level1', 'level2', 'level3', 'level4'],
        datasets: [{
            label: 'count',
            data: [{{ $pending_estimation_count_level1 }}, 
            {{ $pending_estimation_count_level2 }}, 
            {{ $pending_estimation_count_level3 }}, 
            {{ $pending_estimation_count_level4 }}
            ],
            backgroundColor: [
                'rgba(255, 99, 132, 0.8)',
                'rgba(54, 162, 235, 0.8)',
                'rgba(255, 206, 86, 0.8)',
                'rgba(75, 192, 192, 0.8)'
                
            ],
            borderColor: [
                'rgba(255, 99, 132, 1)',
                'rgba(54, 162, 235, 1)',
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
<p class="card-panel white grey-text center"><b >Pending estimation based on damage level</b></p>

    
</div>
<!--pending and inspection complaint- municipal closed -->

</div>

<!-- End Total inspection chart-->


</div>





       @endsection