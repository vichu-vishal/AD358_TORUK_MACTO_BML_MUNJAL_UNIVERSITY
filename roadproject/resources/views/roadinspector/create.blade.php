@extends('layouts.roadinspectorLayout')

      @section('content')
<style type="text/css">
        form{
          padding: 60px;
        }
      </style>
<body>


  <!-- Form -->
<div class="container">
  <div class="row">
    <div class="col l9 s12 m12 right">
    <form method = "post" action="{{ route('roadinspector.store') }}" enctype="multipart/form-data" class="z-depth-3">
      @csrf
          <h4 class="grey-text center">Inspection Dettails Uploading Form</h4><br>

          
  @if(count($errors))

   @foreach($errors->all() as $error)
            
                <div class="card-panel red lighten-2">
                    <ul>
                       
                            <li>{{$error}}</li>
                       
                    </ul>
                </div>
      @endforeach       
        @endif

              <!--complaint id-->
              <div class="input-field">
                <i class="material-icons prefix">mode_edit</i>
                <input type="text" id="state" name="complaint_id" value="{{ $complaint->id }}"  class="validate">
                <label for="complaint id">Complaint ID</label>
              </div><br>
                  <!--state-->
              <div class="input-field">
                <i class="material-icons prefix">location_on</i>
                <input type="text" id="State" name="state" value="{{ $complaint->state }}"  class="validate">
                <label for="state">state</label>
              </div><br>
                  <!--District-->
              <div class="input-field">
                <i class="material-icons prefix">add_location</i>
                <input type="text" id="district" name="district" value="{{ $complaint->district }}" class="validate">
                <label for="district">District</label>
              </div><br>

                <!-- Panchayath or municipal -->

                 <div class="input-field">
                <i class="material-icons prefix">edit_road</i>
                <input type="text" id="panchayath_or_municipal" name="panchayath_or_municipal" value="{{ $complaint->panchayath_or_municipal }}" class="validate">
                <label for="panchayath_or_municipal">panchayath_or_municipal</label>
              </div><br>

        

                <!--city_or_village-->
                 <div class="input-field">
                <i class="material-icons prefix">edit_location</i>
                <input type="text" id="city_or_village" name="city_or_village" value="{{ $complaint->city_or_village }}" class="validate">
                <label for="city_or_village">City/Village</label>
              </div><br>

                  <!--RoadSize_Length
                 <div class="input-field">
                <i class="material-icons prefix">mode_edit</i>
                <input type="text" id="city_or_village" name="RoadSize_Length"  class="validate">
                <label for="RoadSize_Length">Road Size </label>
              </div><br>-->
      <!--road name and number opened-->
      <div class="row">
        <div class="input-field col s6">
          <i class="material-icons prefix">pin_drop</i>
          <input  id="road_name" type="text" class="validate" name="road_name" value="
          {{ $complaint->road_name }}">
          <label for="road name">Road Name</label>
        </div>
        <div class="input-field col s6">
          <i class="material-icons prefix">not_listed_location</i>
          <input id="road_number" type="text" class="validate" name="road_number">
          <label for="road number">Road Number</label>
        </div>
      </div>
      <!--road name and number closed-->

      <div class="row">
        <div class="input-field col s6">
          <i class="material-icons prefix">architecture</i>
          <input  id="RoadSize_Length" type="text" class="validate" name="RoadSize_Length">
          <label for="RoadSize_Length">Road Size Length</label>
        </div>
        <div class="input-field col s6">
          <i class="material-icons prefix">architecture</i>
          <input id="RoadSize_Breadth" type="text" class="validate" name="RoadSize_Breadth">
          <label for="RoadSize_Breadth">Road Size Breadth</label>
        </div>
      </div>

       <!--repairmethod-->
             <div class="input-field">
                <i class="material-icons prefix">receipt_long</i>
                <input type="text" id="pincode" name="repairmethod"  class="validate">
                <label for="repairmethod">Repair methodology Applied</label>
              </div><br>

                  <!--Budjet-->
             <div class="input-field">
                <i class="material-icons prefix">receipt_long</i>
                <input type="text" id="pincode" name="budget"  class="validate">
                <label for="budget">Budget</label>
              </div><br>

        
          <!--total cost-->

           <div class="input-field">
                <i class="material-icons prefix">mode_edit</i>
                <input type="text" id="totalCost" name="totalCost"  class="validate">
                <label for="totalCost">TotalCost</label>
              </div><br>

          <!-- Damage Level -->

           <select class='dropdown-trigger btn white grey-text text-darken-1' data-target='dropdown1' name="damage_level" id=""  class="validate">
                    <option value="LEVEL 1 (Block,Linear,Transverse,Edge,Joint,Slippage)">LEVEL 1 <br>(Block,Linear,Transverse,Edge,Joint,Slippage)</option>
                    <option value="LEVEL 2 (Pot Holes,Rutting,Shoving,Upheavel,Hoving)">LEVEL 2 <br>(Pot Holes,Rutting,Shoving,Upheavel,Hoving)</option>
                    <option value="LEVEL 3 (Severe Damage(Unusable Road))">LEVEL 3 <br>(Severe Damage(Unusable Road))</option>
                    <option value="LEVEL 4 (Construction Of New Road Required)">LEVEL 4 <br>(Construction Of New Road Required)</option>
          </select><br><br>

          <!-- traffic intensity -->
          <label class="center grey-text" style="font-size: 15px;">Level of Traffic</label><br>
           <select class='dropdown-trigger btn white grey-text text-darken-1' data-target='dropdown1' name="trafficintense" id=""  class="validate">
                    <option value="a-low">Low </option>
                    <option value="b-medium">Medium</option>
                    <option value="c-high">High</option>
                    
          </select><br><br>

          <!-- Additional description-->
            <div class="row">
          <div class="input-field col s12">
             <i class="material-icons prefix">add_comment</i>
            <textarea id="textarea2" class="materialize-textarea" data-length="220" name="additional_inspection_description"  class="validate"></textarea>
            <label for="textarea2">Additional description about the Inspection</label>
          </div>
        </div><br>

          <!--people complaint photo upload -->

         <div class="file-field input-field">
              <div class="btn">
                  <span>File</span>
                    <input type="file" name="image">
              </div>
              <div class="file-path-wrapper">
                     <input class="file-path validate" type="text" placeholder="Upload one or more files">
              </div>
          </div>

         <!-- <input type="file" name="image"  class="validate">-->
            
              <div class="input-field center">
                <button class="btn btn-large" name="">Upload Inspection Details</button>
              </div>

              




            </form>
          </div>
        </div>
</div>
  <!-- footer -->

  @endsection
