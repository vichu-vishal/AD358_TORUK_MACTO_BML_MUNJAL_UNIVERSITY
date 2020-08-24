@extends('layouts.roadinspectorLayout')

 

      @section('content')
 
  
      <div class="container">
        <p class="card-panel white orange-text center" style="margin-left: 200px;"><b>Ongoing Complaints -</b><b class="grey-text text-darken-2"> {{ $updation_count }}</b></p>
      		@foreach($updation as $updations)
      		<ul class="collapsible popout" style="margin-left: 200px;">
    			<li> 
      				<div class="collapsible-header grey-text"><i class="material-icons green-text">book_online</i><b class="grey-text text-darken-2">{{ $updations-> panchayath_or_municipal }} - {{ $updations->road_name }}</b>    -   {{ $updations->damage_level }}</div>
      				<div class="collapsible-body">
      					<span class="grey-text text-darken-2">{{ $updations->ongoingstatusdescription }} - </span>  
      					 <i class="material-icons green-text" >done_all</i><b class="green-text text-darken-2">{{ $updations->ongoingstatus }}</b>
      				</div> 
    			</li>
    
 			 </ul>
			@endforeach
        <ul class="pagination center">
          <li>
          {{ $updation->links() }}
        </li>
        </ul>
 
        

	  </div> 

      @endsection

