<?php 
session_start();
if(empty($_SESSION['userlogged'])):
  header('Location:loginAdmin.php');
endif;
?>
<?php

include ("connection.php"); // Using database connection file here

// get id through query string
$id = mysqli_real_escape_string($conn,$_GET['id']);
$qry = mysqli_query($conn,"select * from item i join supplier s on i.idSupplier=s.idSupplier WHERE idItem='$id'"); // select query
$data = mysqli_fetch_array($qry); // fetch data
mysqli_close($conn); // Close connection

?>
<?php
$imageURL = 'C:/xampp/htdocs/img_dir/'.$data["image"];
$imageData = base64_encode(file_get_contents($imageURL));
?>
<html>
<head>
<link rel="stylesheet" type="text/css" href="styleList.css">
<link rel="stylesheet" 
href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

<title> millyShar Cookies </title>

</head>   
<body>



<!-- start:NAVBAR -->          


  <nav class="navbar navbar-default navbar-fixed-top">    
    <div class="container2">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#myNavbar">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <a href="adminHome.php"><img class="logo" src="logo11.png"></a>
      </div>
      
      <div class="collapse navbar-collapse " id="myNavbar">
        <ul class="nav navbar-nav navbar-right">
          <li class="nav-item "><a  class="nav-link" href=""><span class="glyphicon glyphicon-user"></span> Welcome <?php echo $_SESSION['adminFullName']; ?> </a></li>
          <li  class="nav-item"><a class="nav-link" href="adminHome.php"><span class="glyphicon glyphicon-ok-sign"></span> Home </a></li>
          <li  class="nav-item "><a class="nav-link" href="status.php"><span class="glyphicon glyphicon-ok-sign"></span> Status </a></li>
          <li  class="nav-item "><a class="nav-link" href="supplier.php"><span class="glyphicon glyphicon-user"></span> Supplier </a></li>  
          <li  class="nav-item active"><a class="nav-link" href="item.php"><span class="glyphicon glyphicon-shopping-cart"></span> Item</a></li>  
          <li  class="nav-item "><a class="nav-link" href="orderCustAdmin.php"><span class="glyphicon glyphicon-list-alt"></span> Customer Orders List</a></li>           
          <li  class="nav-item "><a class="nav-link" href="logout.php"><span class="glyphicon glyphicon-log-out"></span> Log Out </a></li>
        </ul>
      
      </div>
    
    </div>
  </nav>
  

<br>
<br>
<br>
<br>
<h2 align="center">DETAILS FOR <?php echo $data['itemName'];?>  </h2>
<hr> <br>
<div class="container">
<form >
  <table class="table table-striped">
    <tbody>
    <tr >
      <th colspan="2"><p align="center"><?php echo '<img src="data:image/jpeg;base64,'.$imageData.'"width="300" height="200">'; ?></p></th>
        <td scope="col" colspan="2"></td>
      </tr>
      <tr> 
        <td> ID Item</td>
        <td><input type="text" class="form-control" name="idItem" value="<?php echo $data['idItem'] ?>" disabled ><br></td>
      </tr>
      <tr> <td>  Item Name</td> 
        <td><input type="text" class="form-control" name="itemName" value="<?php echo $data['itemName'] ?>"disabled ></td>
      </tr>
      <tr><td>Price (RM)</td>
        <td><input type="text" class="form-control" name="price" value="RM <?php echo $data['price'] ?>"disabled ></td>
      </tr>
      <tr><td>ID Supplier</td>
        <td><input type="text" class="form-control" name="idSupplier" value="<?php echo $data['idSupplier'] ?>"disabled ></td>
      </tr>
      <tr><td>Supplier Name</td>
        <td><input type="text" class="form-control" name="supplierName"  value="<?php echo $data['supplierName'] ?>"disabled ></td>
      </tr>
      <tr><td >Description</td>
        <td><textarea class="form-control" name="description" rows="5" cols="85" value=""disabled ><?php echo $data['description'] ?></textarea></td>
      </tr>

  </tbody>

  </table>     
  </div>  
  <div class="container">
    <div class="row">
      <div class="col-md-12 bg-light text-right">
        <a class="btn btn-primary btn float-right" href="item.php" role="button">Back</a>
      </div>
    </div>
  </div> 

</form>




</div>
<br>
<br>
<br>
<br>
<!-- start: FOOTER -->
<footer class="page-footer ">

<!-- Footer Links -->
    <div class="container-fluid text-center text-md-left">

        <!-- Grid row -->
        <div class="row">

            <!-- Grid column -->
            <div class="col-md-6 mt-md-0 mt-3">

            <!-- Content -->

                <p><img src="logo.png" width="250px" height="150px"></p>

            </div>
            <!-- Grid column -->

            <hr class="clearfix w-100 d-md-none pb-3">

            <!-- Grid column -->
            <div class="col-md-3 mb-md-0 mb-3">

                <!-- Links -->
                <h5 class="text-uppercase">Menu</h5>

                <ul class="list-unstyled">
                <li>
                <a href="adminHome.php"> Home</a>
                </li>
                <li>
                <a href="supplier.php"> Supplier</a>
                </li>
                <li>
                <a  href="item.php"> Item</a>
                </li>
                <li>
                <a href="status.php">Status</a>
                <li>
                <a href="orderCustAdmin.php">Customer Orders List</a>
                </li>
                <li>
                <a href="logout.php">Log Out</a>
                </li>
                </li>
                </ul>

            </div>
            <!-- Grid column -->
        </div>
    <!-- Grid row -->
    </div>
    <!-- Footer Links -->

    <!-- Copyright -->
    <div class="footer-copyright text-center py-3">© 2021 Copyright:millyShar Cookies
        <br> millyShar Cookies is optimized for ordering only. All of the content was provide by the admin.
    </div>
    <!-- Copyright -->

</footer>
<!-- end:Footer -->
</div>
</body>
</html>