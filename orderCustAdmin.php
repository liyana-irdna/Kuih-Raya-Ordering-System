<?php 
session_start();
if(empty($_SESSION['userlogged'])):
  header('Location:loginAdmin.php');
endif;
?>
<html>
<head>
<link rel="stylesheet" type="text/css" href="styleList.css">
<link rel="stylesheet" 
href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

<title> millyShar Cookies</title>

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

</div></nav>


<br>
<br>
<br>
<br>
<h2 align="center" ><b> Customer Order List</b></h2>
<hr> <br>
<div class="container">


    <form action="search.php" method="post">
    <div class="input-group">

    <h2>Search</h2>
    <select class="form-control" name="days" style="width: 350px">

    <label for="day"></label>
    <option disabled selected value>Select Day(s)</option>
      <option value="01">1</option>
      <option value="02">2</option>
      <option value="03">3</option>
      <option value="04">4</option>
      <option value="05">5</option>
      <option value="06">6</option>
      <option value="07">7</option>
      <option value="08">8</option>
      <option value="09">9</option>
      <option value="10">10</option>
      <option value="11">11</option>
      <option value="12">12</option>
      <option value="13">13</option>
      <option value="14">14</option>
      <option value="15">15</option>
      <option value="16">16</option>
      <option value="17">17</option>
      <option value="18">18</option>
      <option value="19">19</option>
      <option value="20">20</option>
      <option value="21">21</option>
      <option value="22">22</option>
      <option value="23">23</option>
      <option value="24">24</option>
      <option value="25">25</option>
      <option value="26">26</option>
      <option value="27">27</option>
      <option value="28">28</option>
      <option value="29">29</option>
      <option value="30">30</option>
      <option value="31">31</option>
      
     </select>
     
    
  

    <label for="month"></label>
    <select class="form-control" name="month" style="width: 350px">
      <option disabled selected value>Select Month(s)</option>

      <option value="1">January</option>
      <option value="2">February</option>
      <option value="3">Mac</option>
      <option value="4">April</option>
      <option value="5">May</option>
      <option value="6">June</option>
      <option value="7">July</option>
      <option value="8">August</option>
      <option value="9">September</option>
      <option value="10">October</option>
      <option value="11">November</option>
      <option value="12">December</option>
     </select>
  
    <input type="number" min="2010" class="form-control" style="width: 350px" name="year" placeholder="Enter Year(s)" class="currency"   required >

        <button type="submit" class="btn btn-primary">Submit</button>
  
  </div>
  </form>
  <br>
  <?php
  include("connection.php");
  $sql = "SELECT DISTINCT o.orderDate,oi.idOrders,os.status,c.custName FROM orders o join orders_status os on o.idStatus = os.idStatus join ordes_items oi on oi.idOrders=o.idOrders join customer c on c.idCust=o.idCust join item i on oi.idItem=i.idItem order by o.idOrders desc";
  $result = mysqli_query($conn, $sql);
  if (mysqli_num_rows($result) > 0)
  {
    ?>
    <br>
    <form >
      <table class="table table-striped">
        <thead>
          <tr>
            <th scope="col">No.</th>
            <th scope="col">ID ORDERS</th>
            <th scope="col">CUSTOMER NAME</th>

            <th scope="col">ORDER DATE</th>
            <!-- <th scope="col">DELIVERY TYPE</th> -->
            <th scope="col">STATUS</th>
            <th scope="col" colspan="2">Action</th>          
          </tr>
        </thead>
        <?php        
        $count=1;
        while($row = mysqli_fetch_assoc($result))
        {
          
          ?>
          <tbody>
            <tr>
              <th scope="row"><?php echo $count;?></th>
             
<!-- &date= ?> -->
              <td><?php echo $row["idOrders"];?></td>  
              <td><?php echo $row["custName"];?></td>
              <td><?php echo $row["orderDate"];?></td>

              <td><?php echo $row["status"];?></td>            
              <td><a href="orderCustAdminStatusUpdate.php?id=<?php echo $row['idOrders']; ?>"><i class='glyphicon glyphicon-pencil' title="Update"></i> </a></td>
              <td><a href="orderCustAdminView.php?id=<?php echo $row['idOrders'] ?>"><i class='glyphicon glyphicon-eye-open' title="View"></i> </a></td>
            </tr>          
          </tbody>          
          <?php 
          $count++;          
        }         
        ?>
      </table>
    </form>
    <?php
  }
  else{?>
    <div class="container3">
            <div class="jumbotron" style="text-align: center; margin-top: 10%;">
                <h2> No result </h2>
            </div>
        </div>
        <?php
  }
  mysqli_close($conn);
  ?>
  </div>
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