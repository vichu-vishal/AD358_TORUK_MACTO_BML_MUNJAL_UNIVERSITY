@extends('layouts.municipalLayout')

 

      @section('content')
 
  
      <div class="container">

        <p class="green-text text-darken-2 card-panel white center" style="margin-left: 200px;" ><b>Finished Complaint: </b><b class="grey-text text-darken-2">{{ $finish_count }}</b></p><br>
        
      		@foreach($finish as $finished)
      		<ul class="collapsible popout" style="margin-left: 200px;">
    			<li> 
      				<div class="collapsible-header grey-text"><i class="material-icons green-text">book_online</i><b class="green-text">Finished Complaint -  </b><b class="grey-text text-darken-2">{{ $finished-> panchayath_or_municipal }} - {{ $finished->road_name }}</b>    -   {{ $finished->damage_level }}</div>
      				<div class="collapsible-body">
      					<span class="grey-text text-darken-2">{{ $finished->ongoingstatusdescription }} - </span>  
      					 <i class="material-icons green-text" >done_all</i><b class="green-text text-darken-2">{{ $finished->ongoingstatus }}</b>
      				</div> 
    			</li>
    
 			 </ul>
			@endforeach
        <ul class="pagination center">
          <li>
          {{ $finish->links() }}
        </li>
        </ul>
 
        

	  </div> 

      @endsection

