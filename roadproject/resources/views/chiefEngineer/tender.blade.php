@extends('layouts.chiefEngineerLayout')

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
    <form method = "post" action="/chiefEngineer/tender/store" enctype="multipart/form-data" class="z-depth-3">
      @csrf
          <h4 class="grey-text center">Tender Dettails Uploading Form</h4><br>

          
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
                <input type="text" id="state" name="complaint_id" value="{{ $tender->complaint_id }}"  class="validate">
                <label for="complaint id">Complaint ID</label>
              </div><br>
                  <!--state-->
              <div class="input-field">
                <i class="material-icons prefix">location_on</i>
                <input type="text" id="State" name="state" value="{{ $tender->state }}"  class="validate">
                <label for="state">state</label>
              </div><br>
                  <!--District-->
              <div class="input-field">
                <i class="material-icons prefix">add_location</i>
                <input type="text" id="district" name="district" value="{{ $tender->district }}" class="validate">
                <label for="district">District</label>
              </div><br>

                <!-- Panchayath or municipal -->

                 <div class="input-field">
                <i class="material-icons prefix">edit_road</i>
                <input type="text" id="panchayath_or_municipal" name="panchayath_or_municipal" value="{{ $tender->panchayath_or_municipal }}" class="validate">
                <label for="panchayath_or_municipal">panchayath_or_municipal</label>
              </div><br>

        

                <!--city_or_village-->
                 <div class="input-field">
                <i class="material-icons prefix">edit_location</i>
                <input type="text" id="city_or_village" name="city_or_village" value="{{ $tender->city_or_village }}" class="validate">
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
          <input  id="road_name" type="text" class="validate" name="road_name" value="{{ $tender->road_name }}">
          <label for="road name">Road Name</label>
        </div>
        <div class="input-field col s6">
          <i class="material-icons prefix">not_listed_location</i>
          <input id="road_number" type="text" class="validate" name="road_number" value="{{ $tender->road_number }}">
          <label for="road number">Road Number</label>
        </div>
      </div>

       <!-- Damage Level -->
           <div class="input-field">
                <i class="material-icons prefix">mode_edit</i>
                <input type="text" id="damage_level" name="damage_level" value="{{ $tender->damage_level }}" class="validate">
                <label for="damage_level">Damage Level</label>
              </div><br>


      <!--road name and number closed-->

      <div class="row">
        <div class="input-field col s6">
          <i class="material-icons prefix">architecture</i>
          <input  id="RoadSize_Length" type="text" class="validate" value="{{ $tender->RoadSize_Length }}" name="RoadSize_Length">
          <label for="RoadSize_Length">Road Size Length</label>
        </div>
        <div class="input-field col s6">
          <i class="material-icons prefix">architecture</i>
          <input id="RoadSize_Breadth" type="text" class="validate" name="RoadSize_Breadth" value="{{ $tender->RoadSize_Breadth }}">
          <label for="RoadSize_Breadth">Road Size Breadth</label>
        </div>
      </div>

<!--row-->
         <div class="row">
                  <!--name of the work-->
             <div class="input-field col s6">
                <i class="material-icons prefix">receipt_long</i>
                <input type="text" id="name_work" name="name_work"  class="validate">
                <label for="name_work">Name of the Work</label>
              </div>

        
          <!--Estimation cost-->

           <div class="input-field col s6">
                <i class="material-icons prefix">mode_edit</i>
                <input type="text" id="estimationCost" name="estimationCost"  class="validate">
                <label for="estimationCost">Estimation Cost</label>
              </div><br>
           </div>

 <!--row end-->          
 <!--row start-->   
               <!--Earnest Money -->
<div class="row">
                  <!--name of the work-->
             <div class="input-field col s6">
           
                <i class="material-icons prefix">mode_edit</i>
                <input type="text" id="earnestMoney" name="earnestMoney"  class="validate">
                <label for="earnestMoney">Earnest Money</label>
              </div>

               <!--validity period -->

           <div class="input-field col s6">
                <i class="material-icons prefix">mode_edit</i>
                <input type="text" id="validityPeriod" name="validityPeriod"  class="validate">
                <label for="validityPeriod">Validity Period</label>
              </div><br>
</div>
<!--row end-->
<!--row start-->
                <!--Security Deposit -->
<div class="row">
           <div class="input-field col s6">
                <i class="material-icons prefix">mode_edit</i>
                <input type="text" id="securityDeposit" name="securityDeposit"  class="validate">
                <label for="securityDeposit">Security Deposit</label>
              </div>

                 <!--Mode of sending tender -->

           <div class="input-field col s6">
                <i class="material-icons prefix">mode_edit</i>
                <input type="text" id="mode_of_sending_tender" name="mode_of_sending_tender"  class="validate">
                <label for="mode_of_sending_tender">Mode of sending Tender</label>
              </div><br>
</div>
<!--row end-->

                <!--date on or before which the date tender must reach in office -->

           <div class="input-field">
                <i class="material-icons prefix">mode_edit</i>
                <input type="text" id="deadline" name="deadline"  class="datepicker">
                <label for="deadline">Date on or before which the date tender must reach in office</label>
              </div><br>

               <!-- Mode of quality  -->

           <select class='dropdown-trigger btn white grey-text text-darken-1' data-target='dropdown1' name="mode_of_quality_rate" id=""  class="validate">
                    <option value="class_A1">Class A1</option>
                    <option value="class_B1">Class B1</option>
                   
          </select><br><br>

  <!--row start-->
           <!--Tender issuing date-->
<div class="row">
           <div class="input-field col s6">
                <i class="material-icons prefix">today</i>
                <input type="text" id="tender_issue_date" name="tender_issue_date"  class="datepicker">
                <label for="tender_issue_date">Tender issuing date</label>
              </div>
            <!--Tender Receiving Date-->
              <div class="input-field col s6">
                <i class="material-icons prefix">today</i>
                <input type="text" id="tender_receive_date" name="tender_receive_date"  class="datepicker">
                <label for="tender_receive_date">Tender receive date</label>
              </div><br>
</div>
  <!--row end-->
 

 <h4 class="grey-text center">Contracter Details</h4>
   <hr><br>

       <!--row start-->
                <!--Name of the person/ Partner/ Company -->
<div class="row">
           <div class="input-field col s6">
                <i class="material-icons prefix">mode_edit</i>
                <input type="text" id="Contracter" name="Contracter"  class="validate">
                <label for="Contracter">Name of the Contracter/Company</label>
              </div>

                 <!--The buisness place Full address -->

           <div class="input-field col s6">
                <i class="material-icons prefix">mode_edit</i>
                <input type="text" id="buisness_full_address" name="buisness_full_address"  class="validate">
                <label for="buisness_full_address">The buisness place Full address</label>
              </div><br>
</div>
<!--row end-->   

 <!--row start-->
                <!--Telephone(office) -->
<div class="row">
           <div class="input-field col s6">
                <i class="material-icons prefix">mode_edit</i>
                <input type="text" id="telephone_office" name="telephone_office"  class="validate">
                <label for="telephone_office">Telephone(office)</label>
              </div>

                 <!--Telephone(REsidential) -->

           <div class="input-field col s6">
                <i class="material-icons prefix">mode_edit</i>
                <input type="text" id="telephone_residential" name="telephone_residential"  class="validate">
                <label for="telephone_residential">Telephone(Residential)</label>
              </div><br>
</div>
<!--row end-->   

<!--row start-->
                <!--Residential(Address) -->
<div class="row">
           <div class="input-field col s6">
                <i class="material-icons prefix">mode_edit</i>
                <input type="text" id="residential_address" name="residential_address"  class="validate">
                <label for="residential_address">Residential(Address)</label>
              </div>

                 <!--Income tax(Address) -->

           <div class="input-field col s6">
                <i class="material-icons prefix">mode_edit</i>
                <input type="text" id="income_tax_address" name="income_tax_address"  class="validate">
                <label for="income_tax_address">Full address of Inc.Tax office</label>
                <p class="grey-text"><b> Note:  </b>Full address of income tax office where income tax return is filled.</p>
              </div><br>
</div>


<!--row end-->   

          <!-- Damage Level 

           <select class='dropdown-trigger btn white grey-text text-darken-1' data-target='dropdown1' name="damage_level" id=""  class="validate">
                    <option value="LEVEL 1 (Block,Linear,Transverse,Edge,Joint,Slippage)">LEVEL 1 <br>(Block,Linear,Transverse,Edge,Joint,Slippage)</option>
                    <option value="LEVEL 2 (Pot Holes,Rutting,Shoving,Upheavel,Hoving)">LEVEL 2 <br>(Pot Holes,Rutting,Shoving,Upheavel,Hoving)</option>
                    <option value="LEVEL 3 (Severe Damage(Unusable Road))">LEVEL 3 <br>(Severe Damage(Unusable Road))</option>
                    <option value="LEVEL 4 (Construction Of New Road Required)">LEVEL 4 <br>(Construction Of New Road Required)</option>
          </select><br><br>-->

          
         

         <!-- <input type="file" name="image"  class="validate">-->
            
              <div class="input-field center">
                <button class="btn btn-large" name="">Upload Tender Details</button>
              </div>

              




            </form>
          </div>
        </div>
</div>
  <!-- footer -->

  @endsection
