<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Student Dashboard</title>
  <meta name="description" content="">
  <link rel="icon" type="image/x-icon" href="img/favicon.ico">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="robots" content="all,follow">
  <!-- Google fonts - Roboto -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700">
  <!-- Choices CSS-->
  <link rel="stylesheet" href="vendor/choices.js/public/assets/styles/choices.min.css">
  <!-- Custom Scrollbar-->
  <link rel="stylesheet" href="vendor/overlayscrollbars/css/OverlayScrollbars.min.css">
  <!-- theme stylesheet-->
  <link rel="stylesheet" href="css/style.default.css" id="theme-stylesheet">
  <!-- Custom stylesheet - for your changes-->
  <link rel="stylesheet" href="css/custom.css">

</head>

<body>
  <?php
require_once('connect.php');
session_start();
if(!ISSET($_SESSION['user_id'])){
  header('location:signin.php');
}
?>
  <!-- Side Navbar -->
  <nav class="side-navbar">
    <!-- Sidebar Header    -->
    <div class="sidebar-header d-flex align-items-center justify-content-center p-3 mb-3">
      <!-- User Info-->
      <div class="sidenav-header-inner text-center">
        <?php
          $q1="select * from admin where user_id='$_SESSION[user_id]'";
          $q2="select * from student1 where user_id='$_SESSION[user_id]'";
          $r2=@mysqli_query($dbc,$q2); #STUDENT
          $r1=@mysqli_query($dbc,$q1); #ADMIN
          $num1=@mysqli_num_rows($r1); #ADMIN
          if($num1>0)
          {
            #IF ADMIN USER ID IS LOGGING IN ... USER ID WILL BE FETCHED FROM THE ADMIN DATABASE
            $fetch=@mysqli_fetch_array($r1); 
            $n3=$fetch['first'];
            $name=$fetch['first']." " .$fetch['last'];
          }
          else
          {
            #IF STUDENT IS LOGGING IN 
            $fetch=@mysqli_fetch_array($r2);
            $n3=$fetch['first']; 
            $name=$fetch['first']." " .$fetch['last'];
          }       
         echo '          
       <h2 class="h5 text-white text-uppercase mb-0">'.$name.'</h2>';?>
      </div>
      <!-- Small Brand information, appears on minimized sidebar--><a class="brand-small text-center" href="index.html">
        <p class="h1 m-0">KASH</p>
      </a>
    </div>

    <!-- Sidebar Navigation Menus-->
    <!-- First Menu -->
    <span class="text-uppercase text-black text-sm fw-bold letter-spacing-0 mx-lg-2 heading">Main</span>
    <ul class="list-unstyled">
      <li class="sidebar-item"><a class="sidebar-link" href="studentprofile.php">
          <svg class="svg-icon svg-icon-sm svg-icon-heavy me-xl-2">
            <use xlink:href="#real-estate-1"> </use>
          </svg>Profile </a></li>
      <li class="sidebar-item"><a class="sidebar-link" href="studentprogram.php">
          <svg class="svg-icon svg-icon-sm svg-icon-heavy me-xl-2">
            <use xlink:href="#survey-1"> </use>
          </svg>Programs </a></li>
      <li class="sidebar-item"><a class="sidebar-link" href="studentqueries.php">
          <svg class="svg-icon svg-icon-sm svg-icon-heavy me-xl-2">
            <use xlink:href="#sales-up-1"> </use>
          </svg>Queries </a></li>
      <li class="sidebar-item"><a class="sidebar-link" href="studentmessages.php">
          <svg class="svg-icon svg-icon-sm svg-icon-heavy me-xl-2">
            <use xlink:href="#sales-up-1"> </use>
          </svg>Messages </a></li>


      <li class="sidebar-item"><a class="sidebar-link" href="logout.php">
          <svg class="svg-icon svg-icon-xs svg-icon-heavy me-xl-2">
            <use xlink:href="#security-1"> </use>
          </svg>Logout</a></li>
    </ul>
  </nav>

  <div class="page">
    <!-- navbar-->
    <header class="header">
      <nav class="navbar">
        <div class="container-fluid">
          <div class="d-flex align-items-center justify-content-between w-100">
            <div class="d-flex align-items-center"><a
                class="menu-btn d-flex align-items-center justify-content-center p-2 bg-gray-900" id="toggle-btn"
                href="#">
                <svg class="svg-icon svg-icon-sm svg-icon-heavy text-white">
                  <use xlink:href="#menu-1"> </use>
                </svg></a><a class="navbar-brand ms-2" href="index.html">
                <div class="brand-text d-none d-md-inline-block text-uppercase letter-spacing-0"><span
                    class="text-primary text-black">KASH </span><strong class="text-white fw-normal text-xs"
                    style="padding-left: 6px;">Educational Trust </strong></div>
              </a></div>
          </div>
        </div>
      </nav>
    </header>

    <!-- Breadcrumb-->
    <div class="bg-gray-200 text-sm">
      <div class="container-fluid">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb mb-0 py-3">
            <li class="breadcrumb-item active fw-light" aria-current="page">Home </li>

          </ol>
        </nav>
      </div>
    </div>



    <!-- Page Header-->
    <header class="py-4">
      <div class="container-fluid py-2">
        <h1 class="h3 fw-normal mb-0">Profile</h1>

      </div>

    </header>

    <!-- Updates Section -->

    <section class="tables">
      <div class="container-fluid">
        <div class="row">
          <div class="col-lg-12">
            <div class="card">
              <div class="card-header border-bottom">
                <h3 class="h4 mb-0">Profile</h3>
              </div>
              <div class="card-body">
                <div class="table-responsive">
                  <?php  
                 $q="select * from student1 where user_id='$_SESSION[user_id]'";
                 $result=@mysqli_query($dbc,$q);                 
                 while($row=mysqli_fetch_array($result,MYSQLI_ASSOC)) {
                   echo '
                  <table class="table text-sm mb-0"  id="example">
                    <tbody>
                      <tr>                       
                        <th>First Name</th>
                        <td>'.$row['first'].'</td>                   
                      </tr>
                      <tr>                       
                      <th>Last Name</th>
                      <td>'.$row['last'].'</td>                   
                    </tr>
                    <tr>                       
                    <th>Class</th>
                    <td>'.$row['class'].'</td>                   
                  </tr>
                  <tr>                       
                  <th>DOB</th>
                  <td>'.$row['dob'].'</td>                   
                </tr>
                <tr>                       
                <th>Email</th>
                <td>'.$row['email'].'</td>                   
              </tr>
              <tr>                       
              <th>Phone</th>
              <td>'.$row['phone'].'</td>                   
            </tr>
            
                      ';      

                   
                      }
                      
                      mysqli_close($dbc);?>


                  </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>


    <!-- Footer Page -->
    <footer class="main-footer w-100 position-absolute bottom-0 start-0 py-2" style="background: #222">
      <div class="container-fluid">
        <div class="row text-center gy-3">
          <div class="col-sm-6 text-sm-start">
            <p class="mb-0 text-sm text-gray-600">KASH Educational Trust &copy; Student Growth</p>
          </div>
          <div class="col-sm-6 text-sm-end">
            <p class="mb-0 text-sm text-gray-600">Design by <a href="https://bootstrapious.com/p/bootstrap-4-dashboard"
                class="external">Students</a></p>
            <!-- Please do not remove the backlink to us unless you support further theme's development at https://bootstrapious.com/donate. It is part of the license conditions and it helps me to run Bootstrapious. Thank you for understanding :)-->
          </div>
        </div>
      </div>
    </footer>
  </div>
  <!-- JavaScript files-->
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="vendor/chart.js/Chart.min.js"></script>
  <script src="vendor/just-validate/js/just-validate.min.js"></script>
  <script src="vendor/choices.js/public/assets/scripts/choices.min.js"></script>
  <script src="vendor/overlayscrollbars/js/OverlayScrollbars.min.js"></script>
  <!-- Main File-->
  <script src="js/front.js"></script>
  <script>
  // ------------------------------------------------------- //
  //   Inject SVG Sprite - 
  //   see more here 
  //   https://css-tricks.com/ajaxing-svg-sprite/
  // ------------------------------------------------------ //
  function injectSvgSprite(path) {

    var ajax = new XMLHttpRequest();
    ajax.open("GET", path, true);
    ajax.send();
    ajax.onload = function(e) {
      var div = document.createElement("div");
      div.className = 'd-none';
      div.innerHTML = ajax.responseText;
      document.body.insertBefore(div, document.body.childNodes[0]);
    }
  }
  // this is set to BootstrapTemple website as you cannot 
  // inject local SVG sprite (using only 'icons/orion-svg-sprite.svg' path)
  // while using file:// protocol
  // pls don't forget to change to your domain :)
  injectSvgSprite('https://bootstraptemple.com/files/icons/orion-svg-sprite.svg');
  </script>
  <!-- FontAwesome CSS - loading as last, so it doesn't block rendering-->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css"
    integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
</body>

</html>