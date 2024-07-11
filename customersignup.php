
<html>
<head>


<link rel="stylesheet" type = "text/css" href ="styleList.css"><link rel="stylesheet" 
href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

<style>
body {
  background-image:url();
}
</style>
<title>millyShar Cookies </title>

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
<li><a href="#" class="dropdown-toggle active" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><span class="glyphicon glyphicon-user"></span> Sign Up <span class="caret"></span> </a>
<ul class="dropdown-menu">
<li> <a href="customersignup.php"> Customer Sign-up</a></li>

</ul>
</li>

<li><a href="#" class="dropdown-toggle active" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><span class="glyphicon glyphicon-log-in"></span> Login <span class="caret"></span></a>
<ul class="dropdown-menu">
<li> <a href="customerlogin.php"> Customer Login</a></li>
<li> <a href="managerlogin.php"> Admin Login</a></li>

</ul>
</li>
</ul>
</div>

</div></div>



<!--  form -->
<div class="container" style="margin-top: 3%; margin-bottom:5%;">
  <div class="col-md-5 col-md-offset-4">
    <div class="panel panel-primary">
      <div class="panel-heading"> Create Account </div>
      <div class="panel-body">

          <form role="form" action="customer_registered_success.php" method="POST">
            <div class="row">
              <div class="form-group col-xs-12">
                <h5 style = "font-size:12px; color:#cc0000; margin-top:10px">*User will login the account using email</h5>
                <label for="email"><span class="text-danger" style="margin-right: 5px;">*</span> Email: </label>
                <div class="input-group">
                  <input class="form-control" id="email" type="email" name="email" placeholder="Email" required="">
                  <span class="input-group-btn">
                  <label class="btn btn-primary"><span class="glyphicon glyphicon-envelope" aria-hidden="true"></label>
                  </span>
                  </span>
                </div>           
              </div> 
            </div>

            <div class="row">
              <div class="form-group col-xs-12">
                <label for="custName"><span class="text-danger" style="margin-right: 5px;">*</span> Full Name: </label>
                <div class="input-group">
                  <input class="form-control" id="custName" type="text" name="custName" placeholder=" custName" required="">
                  <span class="input-group-btn">
                  <label class="btn btn-primary"><span class="glyphicon glyphicon-user" aria-hidden="true"></label>
                  </span>
                  </span>
                </div>          
              </div>
            </div> 

            <div class="row">
              <div class="form-group col-xs-12">
                <label for="contactNum"><span class="text-danger" style="margin-right: 5px;">*</span> Contact: </label>
                <div class="input-group">
                  <input class="form-control" id="contactNum" type="tel" name="contactNum" placeholder="Contact" required="">
                  <span class="input-group-btn">
                  <label class="btn btn-primary"><span class="glyphicon glyphicon-phone" aria-hidden="true"></span></label>
                  </span>
                </div>           
              </div>
            </div>

            <div class="row">
              <div class="form-group col-xs-12">
                <label for="city"><span class="text-danger" style="margin-right: 5px;">*</span> House No: </label>
                <div class="input-group">
                  <input class="form-control" id="houseNo" type="text" name="houseNo" placeholder="House no." required="">
                  <span class="input-group-btn">
                  <label class="btn btn-primary"><span class="glyphicon glyphicon-home" aria-hidden="true"></label>
                  </span>
                  </span>
                </div>           
              </div>
            </div>

            <div class="row">
              <div class="form-group col-xs-12">
                <label for="city"><span class="text-danger" style="margin-right: 5px;">*</span> Street: </label>
                <div class="input-group">
                  <input class="form-control" id="streetName" type="text" name="streetNum" placeholder="street" required="">
                  <span class="input-group-btn">
                  <label class="btn btn-primary"><span class="glyphicon glyphicon-home" aria-hidden="true"></label>
                  </span>
                  </span>
                </div>           
              </div>
            </div>

            <div class="row">
              <div class="form-group col-xs-12">
                <label for="city"><span class="text-danger" style="margin-right: 5px;">*</span> City: </label>
                <div class="input-group">
                  <input class="form-control" id="city" type="text" name="city" placeholder="city" required="">
                  <span class="input-group-btn">
                  <label class="btn btn-primary"><span class="glyphicon glyphicon-home" aria-hidden="true"></label>
                  </span>
                  </span>
                </div>           
              </div>
            </div>

            <div class="row">
              <div class="form-group col-xs-12">
                  <label for="state"><span class="text-danger" style="margin-right: 5px;">*</span> State: </label>
                    <div class="input-group">
                      <input class="form-control" id="state" type="text" name="state" placeholder="state" required="">
                    <span class="input-group-btn">
                  <label class="btn btn-primary"><span class="glyphicon glyphicon-home" aria-hidden="true"></label>
                  </span>
                  </span>
                    </div>           
              </div>
            </div>

            <div class="row">
              <div class="form-group col-xs-12">
                <label for="Postcode"><span class="text-danger" style="margin-right: 5px;">*</span> Postcode: </label>
                <div class="input-group">
                  <input class="form-control" id="postcode" type="number" name="postcode" placeholder="postcode" required="">
                  <span class="input-group-btn">
                  <label class="btn btn-primary"><span class="glyphicon glyphicon-home" aria-hidden="true"></label>
                  </span>
                  </span>
                </div>           
              </div>
            </div>

            <div class="row">
              <div class="form-group col-xs-12">
                <label for="password"><span class="text-danger" style="margin-right: 5px;">*</span> Password: </label>
                <div class="input-group">
                  <input class="form-control" id="custPassword" type="password" name="custPassword" placeholder="Password" required="">
                  <span class="input-group-btn">
                  <label class="btn btn-primary"><span class="glyphicon glyphicon-lock" aria-hidden="true"></span></label>
                  </span>
                </div>           
              </div>
            </div>



            <div class="row">
              <div class="form-group col-xs-4">
                <button class="btn btn-primary" type="submit">Submit</button>
              </div>
            </div>
                <label style="margin-left: 5px;">or</label> <br>
                <label style="margin-left: 5px;"><a href="customerlogin.php">Have an account? Login.</a></label>

          </form>

          </div>
      </div>
    </div>
</div>
<!-- end form -->




<section> <!-- start: FOOTER -->
    <footer class="footer" style="margin-top: 4%;">
      <div class="container">
      <!-- top footer statrs -->
        <div class="row top-footer">
          <div class="col-xs-12 col-sm-3 footer-logo-block color-gray">
          <img src="logo11.png" alt="Footer logo"> </a><span>   
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
                <a href="#"> <img src="facebook.png"> </a>
                </li>
                <li>
                <a href="#"> <img src="instagram.png"> </a>
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
        <!-- bottom footer ends -->
        </div>
      </footer>
  </section>
</body>
</html>