<?php
session_start();
?>
<html>
    <head>
        <title>
       millyShar Cookies
        </title>
     
      <link rel="stylesheet" type="text/css" href="styleList.css">
        <link rel="stylesheet" 
        href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<!-- style css -->
      
<body>
 
        <!-- start:NAVBAR -->     
     
    



<div class="dropdown">  
  <div class="container2">
      <div class="navbar-header">
         <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#myNavbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
         </button>
         <a href="index.php"><img class="logo" src="logo11.png"></a>
      </div>

      <div class="collapse navbar-collapse " id="myNavbar">
         <ul class="nav navbar-nav"></ul>
         <ul class="nav navbar-nav navbar-right">
            <li><a href="#" class="dropdown-toggle active" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><span class="glyphicon glyphicon-user"></span> Sign Up <span class="caret"></span> </a>
               <ul class="dropdown-menu">
                  <li> <a href="customersignup.php"> Customer Sign-up</a></li>
               </ul>
            </li>

            <li><a href="#" class="dropdown-toggle active" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><span class="glyphicon glyphicon-log-in"></span> Login <span class="caret"></span></a>
               <ul class="dropdown-menu">
                  <li> <a href="customerlogin.php"> Customer Login</a></li>
                  <li> <a href="loginAdmin.php"> Admin Login</a></li>   
               </ul>
            </li>
         </ul>
      </div>
   </div>
</div>

  
<section>
   <div id="myCarousel" class="carousel slide" data-ride="carousel"  style=margin-top:0.2%>
         <ol class="carousel-indicators">
            <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
            <li data-target="#myCarousel" data-slide-to="1"></li>
            <li data-target="#myCarousel" data-slide-to="2"></li>
         </ol>
      <div class="carousel-inner">  
      <div class="item active">
         <img src="images2/SLIDE3.png" style="height: 500px;" style="width:100%;">
         <div class="carousel-caption">
         </div>
      </div>

      <!--div class="item">
      <img src="images/home.jpg" style="width:100%;">
      <div class="carousel-caption">

      </div>
      </div-->

      <div class="item">
         <img src="images2/SLIDE1.png" style="height: 500px;" style="width:100%;">
            <div class="carousel-caption">
            </div>
         </div>
         <div class="item">
            <img src="images2/SSLIDE2.png" style="height: 500px;"style="width:100%;">
            <div class="carousel-caption"> 
            </div>
         </div>
      </div>
      <a class="left carousel-control" href="#myCarousel" data-slide="prev">
         <span class="glyphicon glyphicon-chevron-left"></span>
         <span class="sr-only">Previous</span>
      </a>
      <a class="right carousel-control" href="#myCarousel" data-slide="next">
         <span class="glyphicon glyphicon-chevron-right"></span>
         <span class="sr-only">Next</span>
      </a>
   </div>
</section>

<section>
<!-- BODY-->
   <div class="container"  style="margin-top: 2%; margin-bottom: 3%;">
      <div class="row">
         <div class="col-sm-6 banner-image">
            <img src="logoBig.png" class="img-responsive">
         </div>   
         <div class="col-sm-6 banner-info">           
            <p class="big-text">MillyShar Cookies Online System</p>
            <h3>The existence of the MillyShar Cookies System is to assist our beloved customers in facilitating purchases. </h3>
            <a class="btn btn-first" href="customerlogin.php">Order Now</a>
            <a class="btn btn-second" href="customerlogin.php">Log in</a>
         </div>
      </div>
   </div>
</section>
 <!-- BODY-->
          <section> <!-- start: FOOTER -->
           <footer class="footer">
            <div class="container">
               <!-- top footer statrs -->
               <div class="row top-footer">
                  <div class="col-xs-12 col-sm-3 footer-logo-block color-gray">
                   <img src="logo11.png" alt="Footer logo"> </a> <span>  </span> 
                  </div>
                 
               <!-- top footer ends -->
               <!-- bottom footer statrs -->
               <div class="row bottom-footer">
                  <div class="container">
                     <div class="row">
                        <div class="col-xs-12 col-sm-3 payment-options color-gray">
                           <h5>Find us at:</h5>
                           <ul>
                              <li>
                                 <a href="#"> <img src="facebook.png" alt="facebook"> </a>
                              </li>
                              <li>
                                 <a href="#"> <img src="instagram.png" alt="Instagram"> </a>
                              </li>                               
                           </ul>
                        </div>
                        
                            
                        <div class="col-xs-12 col-sm-4 address color-gray">
                           <h5>Address</h5>
                           <p>Jalan Seri Putri 1,50460 Damansara Utama, Selangor.</p>
                           
                        </div>
                        <div class="col-xs-12 col-sm-7 phone color-gray">
                        <h5>Phone: </h5> <p>+600108752012</p>                             
                        </div>
                       
                        
                       
                     </div>
                  </div>
               </div>
               <!-- bottom footer ends -->
            </div>
         </footer></section>
         <!-- end:Footer -->
      </div>
      <!-- end:page wrapper -->
    </body>
</html>