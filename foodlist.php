<?php session_start();
if(empty($_SESSION['userlogged'])):
  header('Location:customerlogin.php');
endif;
?>
<html>
<head>  
<link rel="stylesheet" type="text/css" href="styleList.css">
<link rel="stylesheet" type="text/css" href="foodlist1.css">
<link rel="stylesheet" 
href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

<title>millyShar Cookies</title>
</head>   
<body>



<!-- start:NAVBAR -->          


<div class="dropdown">
  <nav class="navbar navbar-default navbar-fixed-top">    
    <div class="container2">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#myNavbar">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <a href="foodlist.php"><img class="logo" src="logo11.png"></a>
      </div>

      <div class="collapse navbar-collapse " id="myNavbar">
        <ul class="nav navbar-nav navbar-right">
        <li class="nav-item "><a href="#"><span class="glyphicon glyphicon-user"></span> Welcome <?php echo $_SESSION['custName']; ?> </a></li>
        <li class="nav-item active"><a href="foodlist.php"><span class="glyphicon glyphicon-cutlery"></span> Menu </a></li>
        <li class="nav-item "><a href="cart.php"><span class="glyphicon glyphicon-shopping-cart"></span> Cart 
        (<?php
        if(isset($_SESSION["cart_item"]))
        {
          // display in navbar
          $cartCount = 0;
          foreach($_SESSION["cart_item"] as $keys => $values) {
              $cartCount = $cartCount + $_SESSION["cart_item"][$keys]["quantity"];
          }        
          echo $cartCount; 
        }
        else
        {
          echo "0";}
          ?>)
          
          </a></li>
          <li class="nav-item "><a href="logoutCust.php"><span class="glyphicon glyphicon-log-out"></span> Log Out </a></li>
          </ul>    
      </div>
      
    </div>

    <nav>
</div>  
  
  <br>
  <br>
  <br>
  <br>
<div class="container">
    <form action="searchItemCust.php" method="post">
      <h2>Search </h2>
      <div class="input-group">
        <select  class="form-control" name="search">
          <option disabled selected value>Select one...</option>
          <?php
          include "connection.php";  
          $records = mysqli_query($conn, "SELECT itemName from item order by itemName asc ");  
          
          while($data = mysqli_fetch_array($records))
          {
            echo "<option name='itemName' value='". $data['itemName'] ."'>" .$data['itemName'] ."</option>";  // displaying data in option menu
          }	
          ?>  
          
        </select>
        <!-- Submit button -->
        <span class="input-group-btn">
          <button type="submit" class="btn btn-primary">Submit</button>
        </span>
      </div>
    </form>
    <?php
    
    
    include("connection.php");
    
    
    $sql = "SELECT * FROM ITEM WHERE stock = 'AVAILABLE' ORDER BY idItem";
    $result = mysqli_query($conn, $sql);
    
    if (mysqli_num_rows($result) > 0)
    {
      $count=0;
      
      while($row = mysqli_fetch_assoc($result)){
        if ($count == 0)
        echo "<div class='row'>";
        
        ?>
        <div class="col-md-3" style="margin-top:2%; ">      
          <form method="POST" action="cart.php?action=add&idItem=<?php echo $row["idItem"]; ?>">

            <div class="mypanel" align="center";>
              <img src="<?php echo $row["image"]; ?>" class="img-responsive" style = "width: 200px; height: 200px">
              <h4 class="text-dark"><?php echo $row["itemName"]; ?></h4>
              <h5 class="text-info"><?php echo $row["description"]; ?></h5>
              <h5 class="text-danger">RM<?php echo $row["price"]; ?></h5>
              
              <input type="hidden" name="price" value="<?php echo $row["price"]; ?>">
              <input type="hidden" name="hidden_name" value="<?php echo $row["itemName"]; ?>">
              <input type="hidden" name="hidden_idSupplier" value="<?php echo $row["idSupplier"]; ?>">
              
              <!-- <div class="cart-action"><input type="text" class="product-quantity" name="quantity" value="0" size="2" /><input type="submit" value="Add to Cart" class="btnAddAction" /></div> -->

              Jar Quantity (450ml/jar): <input type="number" max = "100" min = "1" class="product-quantity" name="quantity" value=" " size="2" /><br/>
              <input type="submit" name="add"class="btn btn-primary"  style="margin-top:5px;" class="btnAddAction" value="Add to Cart">
            </div>
          </form>    
        
        </div>
        
        <?php
        $count++;
        if($count==4)
        {
          echo "</div>";
          $count=0;
        }
      }
      ?>
      
      </div>
      
      <?php
    }
    else
    {
      ?>
      
      <div class="container">
        <div class="jumbotron">
          <center>
          <label style="margin-left: 5px;color: red;"> <h1>The cookies is not available.</h1> </label>
          <p>Sorry</p>
          </center>
        
        </div>
      </div>
      
      <?php
      
    }
    mysqli_close($conn); // Close connection
   
    ?>
</div>  
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
                <a href="#"> <img src="facebook.png" > </a>
                </li>
                <li>
                <a href="#"> <img src="instagram.png" > </a>
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
  <!-- end:Footer -->
  </div>
  </body>
  </html>