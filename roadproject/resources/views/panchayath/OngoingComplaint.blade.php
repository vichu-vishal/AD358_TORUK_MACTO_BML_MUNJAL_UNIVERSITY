@extends('layouts.panchayathLayout')

 

      @section('content')
 
  
      <div class="container">
      

       <p class="orange-text text-darken-2 card-panel white center" style="margin-left: 300px;" ><b>Ongoing Complaint: </b><b class="grey-text text-darken-2">{{ $updation_count }}</b></p>
       
       <br>
      		@foreach($updation as $updations)
      		<ul class="collapsible popout" style="margin-left: 200px;">
    			<li> 
      				<div class="collapsible-header grey-text"><i class="material-icons green-text">book_online</i><b class="orange-text">Ongoing Complaint -  </b><b class="grey-text text-darken-2">{{ $updations-> panchayath_or_municipal }} - {{ $updations->road_name }}</b>    -   {{ $updations->damage_level }}</div>
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

