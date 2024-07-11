
<!DOCTYPE html>
<html>
<head>
<title>
    millyShar Cookie
</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<!-- style css -->
<link rel="stylesheet" type = "text/css" href ="styleList.css"><link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<script type="text/javascript" src="js/jquery.min.js"></script>
<script type="text/javascript" src="js/bootstrap.min.js"></script>
</head>
<body>



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
        <ul class="nav navbar-nav">
          
        </ul>
        <ul class="nav navbar-nav navbar-right">
                <li><a class="dropdown-toggle active" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><span class="glyphicon glyphicon-user"></span> Sign Up <span class="caret"></span> </a>
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

<div class="container" style="margin-top: 4%; margin-bottom: 2%;">
    <div class="col-md-5 col-md-offset-4">
        <div class="panel panel-primary">
            <div class="panel-heading"> Admin Login </div>
                <div class="panel-body">                
                    <form method="post" action="adminLogin.php">
                        <div class="row">
                            <div class="form-group col-xs-12">
                                <label for="adminUsername"><span class="text-danger" style="margin-right: 5px;">*</span> Username: </label>
                                <div class="input-group">
                                    <input class="form-control" id="adminUsername" type="text" name="adminUsername" placeholder="Enter Username" required="" autofocus="">
                                    <span class="input-group-btn">
                                        <label class="btn btn-primary"><span class="glyphicon glyphicon-user" aria-hidden="true"></label></span>
                                    </span>
                                </div>           
                            </div> 
                        </div>

                        <div class="row">
                            <div class="form-group col-xs-12">
                                <label for="password"><span class="text-danger" style="margin-right: 5px;">*</span> Password: </label>
                                <div class="input-group">
                                    <input class="form-control" id="adminPassword" type="password" name="adminPassword" placeholder="Password" required="">
                                        <span class="input-group-btn">
                                            <label class="btn btn-primary"><span class="glyphicon glyphicon-lock" aria-hidden="true"></span></label>
                                        </span>                    
                                </div>           
                            </div>
                        </div>

                        <div class="row">

                            <div class="form-group col-xs-4">
                                <button class="btn btn-primary" name="submit" type="submit" value="submit">Submit</button>
                                
                            </div>
                            <div class="row">
                            <div class="col-md-12 bg-light text-right">
                                <a class="btn btn-primary btn float-right" href="boos1.php" role="button">Back</a>
                            </div>
                        </div>

                        </div>
                    </form>
                </div>
            </div>     
        </div>      
    </div>
</div>

<section> <!-- start: FOOTER -->
    <footer class="footer">
        <div class="container">
               <!-- top footer statrs -->
            <div class="row top-footer">
                <div class="col-xs-12 col-sm-3 footer-logo-block color-gray">
                  <img src="logo11.png" alt="Footer logo"> </a> 
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
                                 <a href="#"> <img src="facebook.png" alt="Paypal"> </a>
                              </li>
                              <li>
                                 <a href="#"> <img src="instagram.png" alt="Mastercard"> </a>
                              </li>                               
                           </ul>
                        </div>
                        
                            
                        <div class="col-xs-12 col-sm-4 address color-gray">
                           <h5>Address</h5>
                           <p>Jalan Seri Putri 1,50460 Damansara Utama, Selangor.</p>
                           <h5>Phone: </h5> <p>+600108752012</p> 
                        </div>
                        <div class="row bottom-footer">              
                        </div>
                    </div>
                </div>
            </div>
               <!-- bottom footer ends -->
        </div>
    </footer>
</section>
</body>
</html>