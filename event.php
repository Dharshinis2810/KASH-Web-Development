<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1,shrink-to-fit=no">
  <title>KASH Educational Trust</title>
  <link rel="icon" type="image/x-icon" href="img/favicon.ico">
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="css/eventpage.css">
  <link rel="stylesheet" href="css/style.css">

  <link rel="stylesheet" href="css/style.default.css">


</head>

<body>
<header id="header" class="d-flex align-items-center">
    <div class="container d-flex align-items-center justify-content-between">

      <div class="logo">
        <h1><a href="index.html">KASH Educational Trust</a></h1>
      </div>

      <!-- .navbar -->

    </div>
  </header>
  <!-- Video Banner -->
  <section class="tm-banner-section" id="tmVideoSection" style="height: 500px; margin-top: 2px;">
    <div class="container tm-banner-text-container">
      <div class="row">
        <div class="col-12">
          <header>
            <h2 class="tm-banner-title">A Small Change Can Make Change</h2>
            <p class="mx-auto tm-banner-subtitle">
              Your Bright Future is our Mission
            </p>
          </header>
        </div>
      </div>
    </div>
    <!-- Video -->
    <video id="hero-vid" autoplay="" loop="" muted
      style="width:auto;opacity:0.8;transform: translate3d(-50%,-277px,0px);">
      <source src="videos/pexels-yan-krukov-8612325.mp4" type="video/mp4" />
      Your browser does not support the video tag.
    </video>
  </section>

  <!-- Header Text -->
  <div class="head-text">
    <p>--- Programs ---</p>
  </div>
  <section id="values" class="values">
    <div class="container">

      <div class="row justify-content-md-center">
        <?php 
        require_once('connect.php');
        $q="select * from event1";
        $query=@mysqli_query($dbc,$q);
        $num=mysqli_num_rows($query);
        while($row=mysqli_fetch_array($query,MYSQLI_ASSOC))
                      { echo'
        <div class="col-md-6 d-flex align-items-stretch" data-aos="fade-up">
          <div class="card" style="background: linear-gradient(#43C6AC, #F8FFAE);">
            <div class="card-body">
              <h5 class="card-title" style="font-size:20px;">'.$row['eheader'].'</h5>
              <p class="card-text justify-content-center" style="font-size:17px;">'.$row['edesc'].'<br /><br /></p>
              <h2 style="float:left;font-size:15px;"> Date : '.$row['edate'].' </h2>
              <h2 style="float:right; font-size:15px;"> Place : '.$row['eplace'].' </h2>  
            </div>
          </div>
        </div>
      ';
     }
    ?>
      </div>
    </div>
  </section>

  <!-- Footer section start -->

  <footer class="footer">
    <div class="footer__addr">
      <h1 class="footer__logo">KASH</h1>
      <h1 class="footer__logo">Educational Trust</h1>
      <hr />
      <h2>About Us</h2>
      <p>Our main goal is to provide educational <br />support to students</p>
    </div>

    <ul class="footer__nav">
      <li class="nav__item">
        <h2 class="nav__title">Information</h2>

        <ul class="nav__ul">
          <li>
            <a href="about.html">About Us</a>
          </li>
          <li>
            <a href="event.php">Events</a>
          </li>
          <li>
            <a href="gallery.html">Gallery</a>
          </li>
          <li>
            <a href="donate.php">Donate</a>
          </li>
        </ul>
      </li>

      <li class="nav__item nav__item--extra">
        <h2 class="nav__title">Services</h2>
        <ul class="nav__ul">
          <li>
            <a href="help.html">Help</a>
          </li>
        </ul>
      </li>

      <li class="nav__item">
        <h2 class="nav__title">Contact</h2>
        <div class="footer__addr">
          <h1 class="footer__logo">Swaminathan Selvam</h1>
          <h6 style="font-style: normal; color: #999;">9025650560</h6>
          <h6 style="font-style: normal; color: #999;">kasheducationaltrust@gmail.com</h6>
          <hr />
          <address>
            188/3 Ganga Nagar,<br />
            APJ Abdul Kalam Street,<br />
            Soniya kovil Back Side,<br />
            Anupanadi,<br />
            Madurai.
          </address>
        </div>

      </li>
    </ul>

    <div class=" legal">
      <p>&copy;CopyRight.All Rights Reserved </p>
    </div>
  </footer>


  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js"></script>
</body>

</html>