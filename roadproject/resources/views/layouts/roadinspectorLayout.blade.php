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
  <title>Road Inspector Dashboard</title>
  <style type="text/css">
  nav {
    background-color: white;
    }
    .pagination li.active{
      background-color: white;
      color: blue;
      text-shadow: 0 2px 2px grey;
      font-size: 20px;
    }
    .pagination li a {
    color: #444;
    display: inline-block;
    font-size: 1.2rem;
    padding: 16px 20px;
    line-height: 30px;
}
</style>
  <link rel="icon" href="/images/govt.png" type="image/icon type">

  @if( Session::has('fakecomplaintmsg'))
  <script>
        document.addEventListener('DOMContentLoaded', function () {
            var Modalelem = document.querySelector('.modal');
            var instance = M.Modal.init(Modalelem);
            instance.open();
        });

</script>
@elseif( Session::has('approvedmsg'))
  <script>
        document.addEventListener('DOMContentLoaded', function () {
            var Modalelem = document.querySelector('.modal');
            var instance = M.Modal.init(Modalelem);
            instance.open();
        });

</script>
@endif  

 
</head>
<body>
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.js"></script>

  <!-- navbar -->
  
  <ul id="slide-out" class="sidenav sidenav-fixed">
    <li>
      <div class="user-view">
        <div class="background">
          <img src="/images/3.png"><!--background-->
        </div>
        <a href="#user"><img class="circle" src="/images/ri.jpg"></a><!--profile or avatar-->
        <a href="#name"><span class="white-text name">Name</span></a>
        <a href="#email"><span class="white-text email">Road Inspector</span></a>
      </div>
    </li>

        <!--home page-->
    <li><a href="/roadinspector" class="waves-effect"><i class="material-icons">home</i>Dashboard</a></li>
        <!--Pending complaint-->
    <li><a href="/roadinspector/pc" class="waves-effect"><i class="material-icons">schedule</i>Pending Complaints</a></li>
    <li><a href="/roadinspector/ongoingcomplaint" class="waves-effect">Ongoing Complaint<i class="material-icons">timer</i></a></li>
        <!--Ongoing Complaint-->
    <li><a href="/roadinspector/inspectiondetails" class="waves-effect"><i class="material-icons">cloud_upload</i>Uploaded Inspection Details</a></li>

        <!--Finished Complaints-->
    <li><a href="/roadinspector/finishedcomplaint" class="waves-effect"><i class="material-icons">check_circle</i>Finished Complaints</a></li>
        <!--Approval Status-->
    <li><a class="waves-effect" href="/roadinspector/approval"><i class="material-icons">done_all</i>Approval Status</a></li>
        <!--divider line-->
	  <li><div class="divider"></div></li>
        <!--Notification-->
	  
  </ul>
  <div class="container">
   <a href="#" data-target="slide-out" class="sidenav-trigger"><i class="material-icons">menu</i></a>
  </div>
  <!-- photo / grid -->
  

  <!-- parallax -->

  <!-- services / tabs -->
 @yield('content')
  <!-- parallax -->

  <!-- contact form -->

  <!-- footer -->
  <footer class="grey lighten-3 grey-text text-darken-1 center z-depth-1" style="padding: 10px 40px;margin-top: 500px;">Copyright @2020 by Gujarat Government | Department of Road Maintainance</footer>
  <!-- Compiled and minified JavaScript -->
  <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-beta/js/materialize.min.js"></script>
  <script>
    $(document).ready(function(){

    });
	 $(document).ready(function(){
    $('.sidenav').sidenav();
  });
   $(document).ready(function(){
    $('.collapsible').collapsible();
  });
    $(document).ready(function(){
    $('.tabs').tabs();
  });
        
  $(document).ready(function(){
    $('.materialboxed').materialbox();
  });

   $(document).ready(function(){
         $('.dropdown-trigger').dropdown();
         $('.textarea#textarea2').characterCounter();
    });

   $(document).ready(function(){
   
  });
   
  </script>
   
</body>
</html>