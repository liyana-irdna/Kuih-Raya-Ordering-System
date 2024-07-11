<?php 
session_start();
if(empty($_SESSION['userlogged'])):
  header('Location:loginAdmin.php');
endif;
?>
<?php

include ("connection.php"); // Using database connection file here

// get id through query string
$id = mysqli_real_escape_string($conn,$_REQUEST['id']);
// $date = mysqli_real_escape_string($conn,$_REQUEST['date']);

$selectQry = "SELECT *, quantity*price FROM ordes_items oi join orders o on oi.idOrders=o.idOrders join customer c on c.idCust = o.idCust join item i on i.idItem=oi.idItem join admin a on a.idAdmin=o.idAdmin join orders_status os on os.idStatus=o.idStatus WHERE o.idOrders='$id'";
$qry = mysqli_query($conn, $selectQry); // select query
$data = mysqli_fetch_array($qry); // fetch data

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
        <li  class="nav-item "><a class="nav-link" href="item.php"><span class="glyphicon glyphicon-shopping-cart"></span> Item</a></li>  
        <li  class="nav-item active"><a class="nav-link" href="orderCustAdmin.php"><span class="glyphicon glyphicon-list-alt"></span> Customer Orders List</a></li>           
        <li  class="nav-item "><a class="nav-link" href="logout.php"><span class="glyphicon glyphicon-log-out"></span> Log Out </a></li>
      </ul>
    </div>
  </div>
</nav>



<br>
<br>
<br>
<br>
<h2 align="center">DETAILS FOR RECEIPT NO "<?php echo $data['idOrders'];?>"  </h2>
<hr> <br>
<div class="container">
<form>
    <table class="table table-striped">
      <tbody>
        
      <tr><td>Receipt No </td>
          <td><input type="text" class="form-control" name="custName" value="<?php echo $data['idOrders'] ?>" disabled ><br></td></tr>
        <tr><td>Customer Name</td>
          <td><input type="text" class="form-control" name="custName" value="<?php echo $data['custName'] ?>" disabled ><br></td></tr>
        <tr> <td>  Address</td> 
          <td><textarea class="form-control"name="address" rows="3" cols="85" disabled ><?php echo $data["houseNo"].' , '.$data["streetNum"].', ' .$data["city"].', '.$data["state"].', '. $data["postcode"];?></textarea>
        <tr> <td>  Contact Num</td> 
          <td><input type="text" class="form-control" name="contactNum" value="<?php echo $data["contactNum"]?>"disabled ></td></tr>
        <tr> <td>  Email</td> 
          <td><input type="text" class="form-control" name="email" value="<?php echo $data["email"]?>"disabled ></td></tr>
        <tr> <td>  Type of Delivery</td> 
          <td><input type="text"  class="form-control" name="deliveryType" value="<?php echo $data["deliveryType"]?>"disabled ></td></tr>
        <tr> <td>  Date (YYYY-mm-dd)</td> 
          <td><input type="text" class="form-control" name="orderDate" value="<?php echo $data["orderDate"]?>"disabled ></td></tr>

        <tr> <td> Status</td> 
          <td><input type="text" class="form-control" name="adminName" value="<?php echo $data["status"]?>"disabled ></td></tr>
         
      </tbody>
    </table>
  </form>
  <form>
  <table class="table table-striped" >
      <thead >
        <tr >
          <th scope="col" >No.</th>
          <th scope="col" >Item Name</th>
          <th scope="col">Quantity</th> 
          <th scope="col">Price (RM) </th>
          <th scope="col">Total (RM) </th>
        </tr>
      </thead>
      <tbody> 
       
        <?php

        $count=1;
        $total_price=0;
        $sql1=mysqli_query($conn,"SELECT *, quantity*price FROM ordes_items oi join orders o on oi.idOrders=o.idOrders join customer c on c.idCust = o.idCust join item i on i.idItem=oi.idItem join admin a on a.idAdmin=o.idAdmin join orders_status os on os.idStatus=o.idStatus WHERE o.idOrders='$id'");
        while($get = mysqli_fetch_array($sql1))
        { ?>
         <tr>
          <td><?php echo $count?></td>               
         <td><input type='text' class='form-control' name='itemName' value='<?php echo $get["itemName"];?>'disabled ></td>
          <td><input type="text" class="form-control" name="quantity" value="<?php echo $get["quantity"];?>"disabled ></td>
          <td><input type="text" class="form-control" name="price" value="<?php echo $get["price"];?>"disabled ></td>
          <td><input type="text" class="form-control" name="price" value="<?php echo $get["quantity*price"];?>"disabled ></td>
           </tr>
           <?php         
          $total_price += $get["quantity*price"];   
          $count++;
        }	
        mysqli_close($conn);
        ?>
     
      </tbody>
    </table>     
  </form>
    <h3 align ="right"> <?php echo "Total: RM ".$total_price;?></h3>
  </div>  
  <div class="container">
    <div class="row">
      <div class="col-md-12 bg-light text-right">
        <a class="btn btn-primary btn float-right" href="orderCustAdmin.php" role="button">Back</a>
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

</body>
</html>