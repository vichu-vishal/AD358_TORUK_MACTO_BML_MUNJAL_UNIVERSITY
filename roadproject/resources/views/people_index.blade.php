  
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
      <link href='https://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet'>
      <title>complaint Register</title>
  
      <style>
       
       
        #one:hover
        {
          border-bottom: 2px solid blue;
          font-size: 18px; 
          letter-spacing: 2px;
        }
        #two-video
        {
          border-left: 1px solid grey;
  
        }
        #three-video
        {
          padding-right: 30px;
          color: grey;
          background-color: #242d40;
        }
        .section
        {
          padding-top: 4vw;       /*vw = viewport width*/
          padding-bottom: 4vw;
        }
     
        @media screen and (max-width: 670px)
        {
  
          header
          {
            height: 50vh;
          }
  
        }
      </style>
    </head>
    <body>
      <div class="preloader"></div>
    
      <!-- navbar -->
    <header>
      
      <ul id='dropdown1' class='dropdown-content'>
        <li><a href="#!" class="blue-text" >Road Inspector</a></li>
        <li class="divider" tabindex="-1"></li>
        <li><a href="#!"  class="blue-text">Assistant Engineer</a></li>
        <li class="divider" tabindex="-1"></li>
        <li><a href="#!"  class="blue-text">Executive Engineer</a></li>
        <li class="divider" tabindex="-1"></li>
        <li><a href="#!"  class="blue-text">Cheif Engineer</a></li>
        
      </ul>
  
  
      <nav class="nav-wrapper transparent">
        <div class="container">
          <a href="#!" class="brand-logo blue-text" style="font-size: 23px; letter-spacing: 2px;">Govt Of Gujarat</a>
           
          <a href="" class="sidenav-trigger" data-target="mobile-view">
            <i class="material-icons">menu</i>
          </a>
          <ul class="right hide-on-med-and-down">
            <li><a href="/people" class="blue-text" style="border-bottom: 2px solid blue; font-size: 18px; letter-spacing: 2px;">Home</a></li>
          
          </ul>
        </div>
      </nav>
     
     
    </header>
    <br>

    <!--Feature-1-->

<div class="section">
    <div class="row">
     
     
      <div class="col s12 l5">
       <img src="/images/image/online.jpg" alt="" width="90%" style="margin-top: -70px;margin-right: -300px; margin-left: 100px;">
  
      </div>
     
      <!--card-1-->
      <div class="col s12 m6 l6 offset-l1 " style="margin-top: -50px;">
        <br><br>
        <h3 class="grey-text text-darken-1 ">Time to Show your <b class="blue-text" style="letter-spacing: 2px; ">Accountability</b></h3>
        <p class=" grey-text">__________________________________</p>  
        <h5 class="grey-text text-darken-1" style="letter-spacing: 3px;">Let's take Responsibility of your Area Road</h5> 
        <p class=" grey-text" style="letter-spacing: 4px;"> Individual Responsibility is the way to develope <br>our country to the developed one</p><br><br>
        <a href="/people/create" class="waves-effect waves-light btn-large blue hoverable"><b style="letter-spacing: 2px;">Register your Complaint</b></a>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!--feature -1 end-->
      
      
      <!-- footer -->
      <footer class="page-footer grey darken-3">
        <section class="section center">
         <h6 style="line-height: 25px; letter-spacing: 5px;;"><b style="font-size: 30px;">"</b>   The quality in a service is not what you put into it.<br> It is what the people gets out of it    <b style="font-size: 30px;">"</b></h6>
        </section>
        <div class="footer-copyright grey darken-4">
          <div class="container center-align">&copy;2020 Reserved by Govt of Gujarat</div>
        </div>
      </footer>
      <!-- Compiled and minified JavaScript -->
      <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-beta/js/materialize.min.js"></script>
      <script>
        $(document).ready(function(){
          $('.sidenav').sidenav();
          $('.materialboxed').materialbox();
          $('.parallax').parallax();
          $('.tabs').tabs();
          $('.datepicker').datepicker();
          $('.tooltipped').tooltip();
          $('.dropdown-trigger').dropdown();
        });
        //autocomplete
        $(document).ready(function(){
    $('input.autocomplete').autocomplete({
      data: {
        "Poster Design": null,
        "Flyer Design": null,
        "Buisness-card": null,
        "Function-Card": null,
        "Logo design": null,
        "Certificate Design": null
      },
    });
  });
      </script>
      <script>
        setTimeout(function(){
          $('.preloader').fadeToggle();
        }, 1500);
      </script>
  
    </body>
    </html>