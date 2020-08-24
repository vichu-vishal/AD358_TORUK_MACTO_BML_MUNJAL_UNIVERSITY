@extends('layouts.assistantEngineerLayout')

      @section('content')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- font awesome -->
      <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous">
      <!--Import Google Icon Font-->
      <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
      <!-- Compiled and minified CSS -->
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-beta/css/materialize.min.css">
    <title>Estimate Details</title>
    
<style type="text/css">
  form
  {
    padding: 60px;
    margin-left: 100px;
    margin-right: -150px;
  }
</style>

 </head>
 <body>
    <div class="container">
  <div class="row">
    <div class="col s12 m12 l11 right">
    <form method="post" action="/assistantengineer/lowlevel/"  class="z-depth-4 ">
    @csrf
      <h4 class="grey-text text-darken-2 center">Estimation Uploading Form</h4><br>
      <div class="input-field col s12">
          <i class="material-icons prefix">mode_edit</i>
          <input  id="complaint_id" type="text" class="validate" name="complaint_id" value="{{ $complaint->complaint_id }}">
          <label for="complaint_id">complaint id</label>
        </div>

        <div class="input-field col s12">
          <i class="material-icons prefix">edit_location</i>
          <input  id="state" type="text" class="validate" name="state" value="{{ $complaint->state }}">
          <label for="state">State</label>
        </div>

        <div class="input-field col s12">
          <i class="material-icons prefix">add_location</i>
          <input  id="district" type="text" class="validate" name="district" value="{{ $complaint->district }}">
          <label for=""></label>
        </div>

        <div class="input-field col s12">
          <i class="material-icons prefix">pin_drop</i>
          <input  id="city_or_village" type="text" class="validate" name="city_or_village" value="{{ $complaint->city_or_village }}">
          <label for="city or village">city or village</label>
        </div>

        <div class="input-field col s12">
          <i class="material-icons prefix">architecture</i>
          <input  id="RoadSize_Length" type="text" class="validate" name="RoadSize_Length" value="{{ $complaint->RoadSize_Length }}">
          <label for="RoadSize Length">RoadSize Length</label>
        </div>

        <div class="input-field col s12">
          <i class="material-icons prefix">architecture</i>
          <input  id="RoadSize_Breadth" type="text" class="validate" name="RoadSize_Breadth" value="{{ $complaint->RoadSize_Breadth }}">
          <label for="RoadSize Breadth">RoadSize Breadth</label>
        </div>

        <div class="input-field col s12">
          <i class="material-icons prefix">mode_edit</i>
          <input  id="damage_level" type="text" class="validate" name="damage_level" value="{{ $complaint->damage_level }}">
          <label for="damagelevel">Damage Level</label>
        </div>

        <div class="input-field col s12">
          <i class="material-icons prefix">edit_road</i>
          <input  id="road_name" type="text" class="validate" name="road_name" value="{{ $complaint->road_name }}">
          <label for="road name">Road Name</label>
        </div>
        <div class="input-field col s12">
          <i class="material-icons prefix">mode_edit</i>
          <input  id="road_number" type="text" class="validate" name="road_number" value="{{ $complaint->road_number }}">
          <label for="road number">Road Number</label>
        </div>

       

   
      <!--Road Type-->

       <select class='dropdown-trigger btn white grey-text text-darken-1' data-target='dropdown1' name="roadType" id=""  class="validate">
                    <option value="Water Bound Macadam">Water Bound Macadam</option>
                    <option value="Bituminous Road">Bituminous Road</option>
                     <option value="Concrete Road">Concrete Road</option>
          </select><br><br>


        <!--Road Methodology-->
         <select class='dropdown-trigger btn white grey-text text-darken-1' data-target='dropdown1' name="repairMethodology" id=""  class="validate">
                    <option value="Throw-and-roll">Throw-and-roll</option>
                    <option value="Semi-Permanent Patches">Semi-Permanent Patches</option>
                     <option value="Spray injection method">Spray injection method</option>
                     <option value="Full-depth patching">Full-depth patching</option>
          </select><br><br>
        
          <!--Estimated Amount-->
           <div class="input-field col s12">
          <i class="material-icons prefix">mode_edit</i>
          <input  id="Estimatedamount" type="text" class="validate" 
          name="Estimatedamount" >
          <label for="Estimated amount">Estimated amount</label>
        </div>

        <!--Budjet-->
           <div class="input-field col s12">
          <i class="material-icons prefix">mode_edit</i>
          <input  id="Budjet" type="text" class="validate" 
          name="Budjet" >
          <label for="Budjet">Budjet</label>
        </div>

        <!--Fund detail-->

        <h4 class="grey-text center" style="">Fund Details</h4> 
        <hr>

         <!--Fund Scheme-->
                   <div class="input-field col s12">
          <i class="material-icons prefix">mode_edit</i>
          <input  id="FundScheme" type="text" class="validate" 
          name="FundScheme" >
          <label for="FundScheme">Fund Scheme</label>
        </div>

        <h5 class="grey-text center" style="">Account Details(Head of Municipal/Panchayath)</h5> 
        <hr>
        
         <!--Account Number-->
                   <div class="input-field col s12">
          <i class="material-icons prefix">mode_edit</i>
          <input  id="AccountNumber" type="text" class="validate" 
          name="AccountNumber" >
          <label for="AccountNumber">Account Number</label>
        </div>

        <!--Account Number Name-->
                   <div class="input-field col s12">
          <i class="material-icons prefix">mode_edit</i>
          <input  id="AccountName" type="text" class="validate" 
          name="AccountName" >
          <label for="AccountName">Account Name</label>
        </div>

        <!--IFSC Code-->
                   <div class="input-field col s12">
          <i class="material-icons prefix">mode_edit</i>
          <input  id="IFSC_Code" type="text" class="validate" 
          name="IFSC_Code" >
          <label for="IFSC_Code">IFSC Code</label>
        </div>

         <!--Branch Name-->
                   <div class="input-field col s12">
          <i class="material-icons prefix">mode_edit</i>
          <input  id="Branch_name" type="text" class="validate" 
          name="Branch_name" >
          <label for="Branch_name">Branch Name</label>
        </div>

         <!--Bank Name-->
                   <div class="input-field col s12">
          <i class="material-icons prefix">mode_edit</i>
          <input  id="IFSC_Code" type="text" class="validate" 
          name="Bank_name" >
          <label for="Bank_name">Bank name</label>
        </div>
        
        
        



     <center><input type="submit" value="Upload Estimation" class="btn btn-primary"></center>
    </form>
     </div>
        </div>
</div>
  <!-- footer -->

  <!-- Compiled and minified JavaScript -->
  <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-beta/js/materialize.min.js"></script>
  <script>
    $(document).ready(function(){
         $('.dropdown-trigger').dropdown();
         $('.textarea#textarea2').characterCounter();
    });
  </script>
</body>
</html>
 @endsection