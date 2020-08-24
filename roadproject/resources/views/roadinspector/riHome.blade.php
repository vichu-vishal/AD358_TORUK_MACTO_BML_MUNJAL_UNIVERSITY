 @extends('layouts.roadinspectorLayout')

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
          <a class="btn-floating halfway-fab waves-effect waves-light grey lighten-4 pulse"><i class="material-icons red-text">schedule</i></a>
          <p>Total Count : <b>{{ $panchayath_count }}</b> (panchayath)</p>
          <p>Total Count : <b>{{ $municipal_count }}</b> (municipal)</p>
        </div>
        <div class="divider blue lighten-5"></div>
        <div class="card-action white-text" style=" background: linear-gradient(to right, #240b36  , #c31432);">
          <a href="/roadinspector/pc">View More</a>
        </div>
    </div>
	</div>
  <!--ended Pending complaints count card start-->

  <!--Ongoing Complaints count card started-->
	<div class="col l3 s12 md12">
		<div class="card blue-grey darken-1 z-depth-5" style=" background: linear-gradient(to right, #4a148c , #d500f9);">
        <div class="card-content white-text">
          <span class="card-title">Site Inspection</span>
          <a class="btn-floating halfway-fab waves-effect waves-light grey lighten-4"><i class="material-icons  purple-text accent-3">timer</i></a>
          <p>Total Count : <b>{{ $panchayath_inspection_complaint_count }} </b>(Panchayath)</p>
          <p>Total Count : <b>{{ $municipal_inspection_complaint_count }} </b>(Municipal)</p>

        </div>
        <div class="divider blue lighten-5"></div>
        <div class="card-action white-text" style=" background: linear-gradient(to right, #4a148c , #d500f9);">
          <a href="/roadinspector/inspectiondetails">View More</a>
        </div> 
    </div>
	</div>
  <!--Ended Ongoing Complaints count card started-->

  <!--Finished Complaints count card started-->
	<div class="col l3 s12 md12">
		<div class="card blue-grey darken-1 z-depth-5" style=" background: linear-gradient(to right, #2196f3  , #90caf9);">
        <div class="card-content white-text">
          <span class="card-title">Finished Complaints</span>
           <a class="btn-floating halfway-fab waves-effect waves-light grey lighten-4"><i class="material-icons blue-text">check_circle</i></a>
          <p>Total Count:<b>{{ $finish }}</b></p>
        </div>
        <div class="divider blue lighten-5"></div>
        <div class="card-action white-text" style=" background: linear-gradient(to right, #2196f3  , #90caf9);">
          <a href="#">View More</a>
        </div>
      </div>
	</div>
  <!--Ended Finished Complaints count card started-->
</div>

<!--Total inspection chart-->
<div class="row" id="chart">
  <!--approved and declined- panchayath opened -->
  <div class="col l6 z-depth-5">
    
      <div class="tot_inspection"><canvas id="myChart"></canvas></div>
<script>
var ctx = document.getElementById('myChart');
var myChart = new Chart(ctx, {
    type: 'bar',
    data: {
        labels: [ 'Approved', 'Declined'],
        datasets: [{
            label: 'Number of complaints',
            data: [{{ $complaints_riapproved_panchayath_count }}, {{ $complaints_rideclined_panchayath_count }}],
            backgroundColor: [
                'rgba(20, 128, 42, 0.8)',
                'rgba(222, 22, 42, 0.8)'
                
            ],
            borderColor: [
                'rgba(20, 128, 42, 1)',
                'rgba(222, 22, 42, 1)'
                
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
<p class="card-panel white grey-text text-darken-2"><b>Approved And Declined Complaints for panchayath</b></p>
  </div>
 <!--approved and declined- panchayath closed -->
 <!--pending and inspection complaint- municipal opened -->
<div class="col l5 z-depth-5 " style="margin-left: 20px;">
    
      <div class="tot_inspection_doughnut"><canvas id="myChart1"></canvas></div>
<script>
var ctx = document.getElementById('myChart1');
var myChart = new Chart(ctx, {
    type: 'horizontalBar',
    data: {
        labels: [ 'Non-Inspected complaints', 'Inspected Complaints'],
        datasets: [{
            label: 'Number of complaints',
            data: [{{ $panchayath_pending_complaint_count }}, {{ $panchayath_inspection_complaint_count }}],
            backgroundColor: [
                'rgba(222, 22, 42, 0.8)',
                'rgba(20, 128, 42, 0.8)'
                
            ],
            borderColor: [
                'rgba(222, 22, 42, 1)',
                'rgba(20, 128, 42, 1)'
                
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
<p class="card-panel white grey-text text-darken-2"><b>Inspected and Non-Inspected complaints for panchayath</b></p>
  </div>
<!--pending and inspection complaint- municipal closed -->

</div>

<!-- End Total inspection chart-->

<!--Total inspection chart-->
<div class="row" id="chart">
  <!--approved and declined- panchayath opened -->
  <div class="col l6 z-depth-5">
    
      <div class="tot_inspection"><canvas id="myChart2"></canvas></div>
<script>
var ctx = document.getElementById('myChart2');
var myChart = new Chart(ctx, {
    type: 'bar',
    data: {
        labels: [ 'Approved', 'Declined'],
        datasets: [{
            label: 'Number of complaints',
            data: [{{ $complaints_riapproved_municipal_count }}, {{ $complaints_rideclined_municipal_count }}],
            backgroundColor: [
                'rgba(20, 128, 42, 0.8)',
                'rgba(222, 22, 42, 0.8)'
                
            ],
            borderColor: [
                'rgba(20, 128, 42, 1)',
                'rgba(222, 22, 42, 1)'
                
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
<p class="card-panel white grey-text text-darken-2"><b> Approved And Declined Complaints for Municipal</b></p>
  </div>
 <!--approved and declined- panchayath closed -->
 <!--pending and inspection complaint- municipal opened -->
<div class="col l5 z-depth-5 " style="margin-left: 20px;">
    
      <div class="tot_inspection"><canvas id="myChart3"></canvas></div>
<script>
var ctx = document.getElementById('myChart3');
var myChart = new Chart(ctx, {
    type: 'horizontalBar',
    data: {
        labels: [ 'Non-Inspected complaints', 'Inspected Complaints'],
        datasets: [{
            label: 'Number of complaints',
            data: [{{ $municipal_pending_complaint_count }}, {{ $municipal_inspection_complaint_count }}],
            backgroundColor: [
                'rgba(222, 22, 42, 0.8)',
                'rgba(20, 128, 42, 0.8)'
                
            ],
            borderColor: [
                'rgba(222, 22, 42, 1)',
                'rgba(20, 128, 42, 1)'
                
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
<p class="card-panel white grey-text text-darken-2"><b>Inspected and Non-Inspected complaints for Municipal</b></p>
  </div>
<!--pending and inspection complaint- municipal closed -->


</div>

<!-- End Total inspection chart-->




       @endsection