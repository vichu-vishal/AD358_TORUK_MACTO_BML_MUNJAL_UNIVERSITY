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
    <title>Estimation Details</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script>$(document).ready(function() {
    var max_fields = 100;
    var wrapper = $(".container1");
    var add_button = $("#add_form_field");
    var wrappers = $(".container2");
    var add_buttons = $("#add_form_fields");

    var x = 1;
    $(add_button).click(function(e) {
        e.preventDefault();
        if (x < max_fields) {
            x++;
            $(wrapper).append('<div  name="mytext[]">Equipment : <input type="text" placeholder="Equipment" name="equipment[]"/> Quantity: <input type="text" placeholder="quantity" name="equipment_quantity[]"/>  Cost : <input type="text" placeholder="cost" name="equipment_cost[]"/><button id="delete" class="btn red">Delete</button></div><br><br>'); //add input box
        } else {
            alert('You Reached the limits')
        }
    });

    $(wrapper).on("click", "#delete", function(e) {
        e.preventDefault();
        $(this).parent('div').remove();
        x--;
    })


    var x = 1;
    $(add_buttons).click(function(e) {
        e.preventDefault();
        if (x < max_fields) {
            x++;
            $(wrappers).append('<div  name="mytext[]">Roadfurnitures : <input type="text" placeholder="Roadfurniture" name="roadfurnitures[]"/> Quantity: <input type="text" placeholder="quantity" name="roadfurnitures_quantity[]"/>  Cost : <input type="text" placeholder="cost" name="roadfurnitures_cost[]"/><button class="btn red" id="delete">Delete</button></div><br><br>'); //add input box
        } else {
            alert('You Reached the limits')
        }
    });

    $(wrappers).on("click", "#delete", function(e) {
        e.preventDefault();
        $(this).parent('div').remove();
        x--;
    })
});
</script>
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
    <form method="post" action="/assistantengineer/store" enctype="multipart/form-data" class="z-depth-4 ">
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

        <div class="input-field col s12">
          <i class="material-icons prefix">mode_edit</i>
          <input  id="total_estimation_cost" type="text" class="validate" 
          name="total_estimation_cost" >
          <label for="total estimation cost">total estimation cost</label>
        </div>

    <!--mazon-->
         <div class="row">
        <div class="input-field col s6">
          <i class="material-icons prefix">engineering</i>
          <input  id="mazon" type="text" class="validate" name="mazon">
          <label for="mazon">Enter mazon</label>
        </div>
        <div class="input-field col s6">
          <i class="material-icons prefix">receipt_long</i>
          <input id="mazon_cost" type="text" class="validate" name="mazon_cost">
          <label for="mazon_cost">Enter mazon cost</label>
        </div>
      </div>
    <br>
    <!--mazdoor-->
 <div class="row">
        <div class="input-field col s6">
          <i class="material-icons prefix">engineering</i>
          <input  id="mazdoor" type="text" class="validate" name="mazdoor">
          <label for="mazdoor">Enter mazdoor</label>
        </div>
        <div class="input-field col s6">
          <i class="material-icons prefix">receipt_long</i>
          <input id="mazdoor_cost" type="text" class="validate" name="mazdoor_cost">
          <label for="mazdoor_cost">Enter mazdoor cost</label>
        </div>
      </div>
    <br>
    
<!--equipment-quantity-cost-->
 <div class="container1">
    
    <div name="mytext[]">

      <div class="row">
        <div class="input-field col s3">
          <i class="material-icons prefix">handyman</i>
          <input  id="equipment" type="text" class="validate autocomplete" name="equipment[]">
          <label for="equipment">Enter equipment</label>
        </div>
        <div class="input-field col s4">
          <i class="material-icons prefix">design_services</i>
          <input id="equipment_quantity" type="text" class="validate" name="equipment_quantity[]">
          <label for="equipment_quantity">Enter Equipment quantity</label>
        </div>
         <div class="input-field col s4">
          <i class="material-icons prefix">mode_edit</i>
          <input id="equipment_cost" type="text" class="validate" name="equipment_cost[]">
          <label for="equipment_cost">Enter Equipment cost</label>
        </div>
     <div class="input-field col s1">
        <button id="add_form_field" class="btn-floating" style="font-size:16px; font-weight:bold;"> Add</button>
      </div>
      </div>
    
             <!-- Equipment : <input type="text" placeholder="Equipment Name" name="equipment[]">
              Quantity: <input type="text" placeholder="Equipment quantity" name="equipment_quantity[]" >
             Cost : <input type="text" placeholder="Equipment cost" name="equipment_cost[]">-->
 </div>
            
</div>
<!--roadfurnitures-quantity-cost-->
<div class="container2">
   
    <div name="mytext[]">

 <div class="row">
        <div class="input-field col s3">
          <i class="material-icons prefix">construction</i>
          <input  id="roadfurnitures" type="text" class="validate autocomplete" name="roadfurnitures[]">
          <label for="roadfurnitures">Enter roadfurnitures</label>
        </div>
        <div class="input-field col s4">
          <i class="material-icons prefix">design_services</i>
          <input id="roadfurnitures_quantity" type="text" class="validate" name="roadfurnitures_quantity[]">
          <label for="roadfurnitures_quantity">Enter roadfurnitures quantity</label>
        </div>
         <div class="input-field col s4">
          <i class="material-icons prefix">mode_edit</i>
          <input id="roadfurnitures_cost" type="text" class="validate" name="roadfurnitures_cost[]">
          <label for="roadfurnitures_cost">Enter furntiture cost</label>
        </div>
     <div class="input-field col s1">
        <button id="add_form_fields" class="btn-floating" style="font-size:16px; font-weight:bold;"> Add</button>
      </div>
      </div>
    <br><br><br>

       <!-- RoadFurnitures : <input type="text" placeholder="roadfurnitures" name="roadfurnitures[]">
        Quantity: <input type="text" placeholder="Roadfurnitures quantity" name="roadfurnitures_quantity[]" >
        Cost : <input type="text" placeholder="Roadfurnitures cost" name="roadfurnitures_cost[]">-->
    </div> 
       
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