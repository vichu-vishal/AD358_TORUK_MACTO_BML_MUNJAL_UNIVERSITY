<!doctype html>



<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <!-- font awesome -->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous">
  <!--Import Google Icon Font-->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <!-- Compiled and minified CSS -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-beta/css/materialize.min.css">
  <title>People complaint form</title>
   <link rel="icon" href="/images/govt.png" type="image/icon type">
  <style>
    form{
      padding: 40px;
    }

    .brand
      {
        background-color: #1e88e5;
      }
      header
        {
           background-image: linear-gradient(rgba(0,0,0,0.5),rgba(0,0,0,0.5)),url('/images/bg_road.jpg');
          background-size: cover;
          background-position: center;
          height: 40vh;
          
        }
  </style>
   @if( Session::has('complaintmsg'))
  <script>
        document.addEventListener('DOMContentLoaded', function () {
            var Modalelem = document.querySelector('.modal');
            var instance = M.Modal.init(Modalelem);
      var preventScrolling = false;
            instance.open();
        });

</script>
@endif
</head>
<body>
<!--header-->
<!-- Modal Structure -->
  <div id="modal1" class="modal modal-fixed-footer" style="background: white;">
    <div class="modal-content">
       <div class="row">
      <div class="col s12 l6">
        <img src="/images/giphy.gif" width="130%">
      </div>
          <div class="col s12 l6">
        <p class="grey-text text-darken-2" style="margin-top: 50px;padding: 20px; font-size: 25px;" >Your extraodinary attention to detail took this problem to another level
        <p class="grey-text text-darken-2 z-depth-3" style="padding: 20px;"><b>{{ session('complaintmsg') }}</b></p>
        </p>
      </div>
    </div>
   </div>
    <div class="modal-footer" style="background: white;">
      <a href="#!" class="modal-close btn-flat btn-medium white blue-text">Close</a>
    </div>
  </div>
  <!---end modal structure-->

  <header>
  <nav class="transparent z-depth-1">
    <div class="container">
    <div class="nav-wrapper">

      <a href="index.php" class="brand-logo grey-text text-lighthen-1" style="font-size: 20px;"><b> GOVT OF GUJARATH </b></a>
      
    </div>
  </div>
  </nav>
  <h2 class="center grey-text text-darken-1 center" style="margin-top: 40px;">Write your Complaint</h2>
  <p class="center grey-text text-darken-1 center" style="margin-top: 20px;">We ready to provide service for you</p>
</header>
<!--header end-->
<br><br><br>
  <!-- Form -->
<div class="container">
  <div class="row">
    <div class="col s12 m12 l12">
    <form method = "post" action="{{ route('people.store') }}" enctype="multipart/form-data"  class="z-depth-4">
      @csrf
          <h4 class="grey-text text-darken-2 center">People Complaint Registration form</h4>
<!--Error message -->
  @if(count($errors))

   @foreach($errors->all() as $error)
            
                <div class="card-panel red lighten-2">
                    <ul>
                       
                            <li>{{$error}}</li>
                       
                    </ul>
                </div>
      @endforeach       
        @endif

<!-- End error message-->
          <p class="msg grey black-text">{{ session('msg') }}</p>
                  <!--state-->
              <div class="input-field">
                <i class="material-icons prefix">edit_location</i>
                <input type="text" id="state" name="state"  class="validate">
                <label for="state">state</label>
              </div><br>
                  <!--District
              <div class="input-field">
                <i class="material-icons prefix">mode_edit</i>
                <input type="text" id="district" name="district"  class="validate">
                <label for="district">District</label>
              </div><br>-->

              <select class='dropdown-trigger btn white grey-text text-darken-1' data-target='dropdown1' name="district" id=""  class="validate">

                <!--Central Gujarath District-->
                    <option value="Central Gujarat Ahmedabad">Ahmedabad</option>
                    <option value="Central Gujarat Vadodara">Vadodara</option>
                    <option value="Central Gujarat Anand">Anand</option>
                    <option value="Central Gujarat Chhota Udaipur">Chhota Udaipur</option>
                    <option value="Central Gujarat Dahod">Dahod</option>
                    <option value="Central Gujarat Kheda">Kheda</option>
                    <option value="Central Gujarat Mahisagar">Mahisagar</option>
                    <option value="Central Gujarat Panchmahal">Panchmahal</option>

                    <!--North Gujarath District-->
                    <option value="North Gujarat Gandhinagar">Gandhinagar</option>
                    <option value="North Gujarat Aravalli">Aravalli</option>
                    <option value="North Gujarat Banaskantha">Banaskantha</option>
                    <option value="North Gujarat Mehsana">Mehsana</option>
                    <option value="North Gujarat Patan">Patan</option>
                    <option value="North Gujarat Sabarkantha">Sabarkantha</option>

                    <!--Saurashtra - Kutch District-->
                    <option value="Saurashtra Kutch Rajkot">Rajkot</option>
                    <option value="Saurashtra Kutch Amreli">Amreli</option>
                    <option value="Saurashtra Kutch Bhavnagar">Bhavnagar</option>
                    <option value="Saurashtra Kutch Botad">Botad</option>
                    <option value="Saurashtra Kutch Devbhoomi Dwarka">Devbhoomi Dwarka</option>
                    <option value="Saurashtra Kutch Gir Somnath">Gir Somnath</option>
                    <option value="Saurashtra Kutch Jamnagar">Jamnagar</option>
                    <option value="Saurashtra Kutch Junagadh">Junagadh</option>
                    <option value="Saurashtra Kutch Morbi">Morbi</option>
                    <option value="Saurashtra Kutch Porbandar">Porbandar</option>
                    <option value="Saurashtra Kutch Surendranagar">Surendranagar</option>
                    <option value="Saurashtra Kutch Kachchh">Kachchh</option>

                    <!--South Gujarath-->
                    <option value="South Gujarath Surat">Surat</option>
                    <option value="South Gujarath Bharuch">Bharuch</option>
                    <option value="South Gujarath Dang">Dang</option>
                    <option value="South Gujarath Narmada">Narmada</option>
                    <option value="South Gujarath Navsari">Navsari</option>
                    <option value="South Gujarath Tapi">Tapi</option>
                    <option value="South Gujarath Valsad">Valsad</option>

          </select><br><br>

                  <!--city_or_village-->
                 <div class="input-field">
                <i class="material-icons prefix">add_location_alt</i>
                <input type="text" id="city_or_village" name="city_or_village"  class="validate">
                <label for="city_or_village">City/Village</label>
              </div><br>
                  <!--Pincode-->
             <div class="input-field">
                <i class="material-icons prefix">mode_edit</i>
                <input type="text" id="pincode" name="pincode"  class="validate">
                <label for="pincode">Pincode</label>
              </div><br>

          <!-- Panchayath or municipla -->

           <select class='dropdown-trigger btn white grey-text text-darken-1' data-target='dropdown1' name="panchayath_or_municipal" id=""  class="validate">
                    <option value="panchayath">panchayath</option>
                    <option value="municipal">municipal</option>
          </select><br><br>


          <!--road name-->

           <div class="input-field">
                <i class="material-icons prefix">room</i>
                <input type="text" id="road_name" name="road_name"  class="validate">
                <label for="road_name">Road Name</label>
              </div><br>

          <!-- Damage Level -->

           <select class='dropdown-trigger btn white grey-text text-darken-1' data-target='dropdown1' name="damage_level" id=""  class="validate">
                    <option value="LEVEL 1 (Block,Linear,Transverse,Edge,Joint,Slippage)">LEVEL 1 <br>(Block,Linear,Transverse,Edge,Joint,Slippage)</option>
                    <option value="LEVEL 2 (Pot Holes,Rutting,Shoving,Upheavel,Hoving)"> LEVEL 2 <br>(Pot Holes,Rutting,Shoving,Upheavel,Hoving)</option>
                    <option value="LEVEL 3 (Severe Damage(Unusable Road))">LEVEL 3 <br>(Severe Damage(Unusable Road))</option>
                    <option value="LEVEL 4 (Construction Of New Road Required)">LEVEL 4 <br>(Construction Of New Road Required)</option>
          </select><br><br>

          <!-- Additional description-->
            <div class="row">
          <div class="input-field col s12">
             <i class="material-icons prefix">insert_comment</i>
            <textarea id="textarea2" class="materialize-textarea" data-length="120" name="additional_description"  class="validate"></textarea>
            <label for="textarea2">Additional description about the Problem</label>
          </div>
        </div><br>

          <!--people complaint photo upload -->

         <!-- <div class="file-field input-field">
            <div class="btn">
              <span>Upload Photo</span>
               <input type="file">
            </div>
            <div class="file-path-wrapper">
               <input class="file-path validate" type="text" placeholder="upload the damaged area photo for authentication" name="complaint_images">
           </div>
         </div><br>-->

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
                <button class="btn btn-large blue" name="">Send your Complaint</button>
              </div>

              




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