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
              <li> <a href="loginAdmin.php"> Admin Login</a></li>
   
            </ul>
            </li>
          </ul>
</div>

</div></div>
    
  

        <?php

            include("connection.php");
            $name = $conn->real_escape_string($_POST['custName']);
            $Email = $conn->real_escape_string($_POST['email']);
            $Contact = $conn->real_escape_string($_POST['contactNum']);            
            $HouseNo = $conn->real_escape_string($_POST['houseNo']);
            $Street = $conn->real_escape_string($_POST['streetNum']);
            $City = $conn->real_escape_string($_POST['city']);
            $State = $conn->real_escape_string($_POST['state']);
            $Postcode = $conn->real_escape_string($_POST['postcode']);
            $Password = $conn->real_escape_string($_POST['custPassword']);

        $query = "INSERT into CUSTOMER(custName,email,contactNum,houseNo,streetNum,city,state,postcode,custPassword) VALUES('".$name."','".$Email."','".$Contact."','".$HouseNo."','".$Street."','".$City."','".$State."','".$Postcode."','".md5($Password)."')";
        $success = $conn->query($query);

        if (!$success){
            die("Couldnt enter data: ".$conn->error);
        }

        mysqli_close($conn); // Close connection
        

        ?>

        <div class="container3">
            <div class="jumbotron" style="text-align: center; margin-top: 10%;">
                <h2> <?php echo "Welcome $name!" ?> </h2>
                <h1>Your account has been created.  </h1>
                <p>CLICK  <a href="customerlogin.php">HERE</a> TO LOGIN</p>
            </div>
        </div>

    </body>
</html>