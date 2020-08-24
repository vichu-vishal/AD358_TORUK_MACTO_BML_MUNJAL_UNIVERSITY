@extends('layouts.assistantEngineerLayout')

      @section('content')

<div class="container">
	<div class="row">
		<div class="col s12 l6 offset-l4">
	<form method="post" class="z-depth-4" action="/assistantengineer/workupdation" style="padding: 30px;">
	@csrf
	<!--<input type="text" name="complaint_id" value="{{ $tender->complaint_id }}">-->
	 <div class="input-field col s12">
          <input placeholder="Placeholder" id="complaint_id" type="text" name="complaint_id" value="{{ $tender->complaint_id }}"class="validate">
          <label for="complaint_id">Complaint ID</label>
        </div>
	<!--<input type="text" name="ongoingstatus">-->

		 <div class="input-field col s12">
          <input placeholder="ongoing status %" id="ongoingstatus" type="text" name="ongoingstatus" value=""class="validate">
          <label for="ongoingstatus">Ongoing Status in %</label>
        </div>
	<!--<input type="text" name="ongoingstatusdescription">-->
	
		<div class="input-field col s12">
          <input placeholder="Ongoing status Description" id="ongoingstatusdescription" type="text" name="ongoingstatusdescription" value=""class="validate">
          <label for="ongoingstatusdescription">Ongoing Status Description</label>
        </div>

	<input type="submit" class="btn btn-large blue center" name="" value="update the work">
	<br><br>
	</form>
</div>
</div>
@endsection