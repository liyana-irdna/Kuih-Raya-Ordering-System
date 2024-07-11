<?php
session_start();
if(empty($_SESSION['userlogged'])):
  header('Location:customerlogin.php');
endif;
?>

<html>
<head>
  <link rel="stylesheet" type="text/css" href="styleList.css">
  <link rel="stylesheet" 
  href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" type="text/css" href="styleList.css">
  <link rel="stylesheet" type="text/css" href="foodlist1.css">
  <link rel="stylesheet"        
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
          <li class="nav-item "><a href="foodlist.php"><span class="glyphicon glyphicon-cutlery"></span> Menu </a></li>
          <li class="nav-item active"><a href="cart.php"><span class="glyphicon glyphicon-shopping-cart"></span> Cart 
          (<?php
          if(isset($_SESSION["cart_item"]))
          {   
            // display total quantity in nav bar
            // has session
            $cartCount = 0;
            foreach($_SESSION["cart_item"] as $keys => $values) {
              $cartCount = $cartCount + $_SESSION["cart_item"][$keys]["quantity"];
            }        
            echo $cartCount;
          } 
          else
          {
            // has no session
            // auto display 1 as the cart item number
            // the session is created after the navbar creation
            echo "0";
          }
          ?>)
          </a>
          </li>
          <li class="nav-item "><a href="index.php"><span class="glyphicon glyphicon-log-out"></span> Log Out </a></li>
        </ul>    
      </div>
    </div>
  </nav>
</div>

<br>
<br>
<br>
<br>
<!-- end of navbar-->  

<div class="container">
<center>
<h1>Your Orders</h1>
<h2>Please review before payment</h2> 
<br />
<div style="text-align: center;">
  <div style="display: inline-block; text-align: left;">
    <table>
      <tr>
        <td width="200px">
        <img height='100' width='150' src="logo11.png">
        </td>
        <td>
        <p><h4><span class="glyphicon glyphicon-map-marker"><b> Delivery Address<b</span></h4></p> 
        <?php echo $_SESSION['custName'] .",";?><br />
        <?php echo $_SESSION['houseNo'] .", ".$_SESSION['streetNum'].",";?><br />
        <?php echo $_SESSION['city'] .","; ?><br />
        <?php echo $_SESSION['state']; ?>
        </td>
      </tr>
    </table>
  </div>
</div>
</center>
<br />
<?php
if(isset($_SESSION["cart_item"])){
  $no= 0;
  ?>
  <table class="table table-bordered">
    <thead>
      <tr>
        <th scope="col" width="10%">No.</th>
        <th scope="col" width="15%">Item</th>
        <th scope="col">Item Name</th>
        <th scope="col">Quantity</th>
        <th scope="col">Price (RM) </th>
        <th scope="col">Total (RM)</th>
      </tr>
    </thead>
    <tbody>
      <?php
      $total_quantity = 0;
      $total_price = 0;
      foreach ($_SESSION["cart_item"] as $item) //loop for each item
      {
        $no = $no + 1;
        ?>        
        <tr>
          <td><b><?php echo $no ?></b></td>
          <td><img src="<?php echo $item["image"]; ?>" style = "width: 100px; height :100px"/></td>
          <td><?php echo $item["itemName"]; ?></td>
          <td id = "quanti"><?php echo $item["quantity"]; ?></td>
          <td><?php echo $item["price"]; ?></td>
          <td id = "sum"><?php echo number_format($item["quantity"] * $item["price"], 2); ?></td>
        </tr>
        <?php  }
        $total_quantity += $item["quantity"];
        ?>
        <tr>
          <td style="font-weight: bold" colspan="3" > Total </td>
          <td style="font-weight: bold" id="amount"></td>
          <td></td>
          <td style="font-weight: bold" id="total"></td>
        </tr>
    </tbody>
  </table>		
    <?php } ?>
    <script>
      $(function()
      {
        var TotalPrice = 0;
        $("tr #sum").each(function(index,value){
          currentRow= parseFloat($(this).text());
          TotalPrice += currentRow;
        })    
        document.getElementById('total').innerHTML = "RM "+ TotalPrice;
        
      });
      
      $(function()
      {
        var totalQuantity = 0;
        $("tr #quanti").each(function(index,value){
          currentRow= parseFloat($(this).text());
          totalQuantity += currentRow;
        })    
        document.getElementById('amount').innerHTML = totalQuantity;
        });
    </script>
    <div>    
      <center>
        <h3>Choose Payment :</h3>
        <!-- <form method="post" action=check.php > -->
        <form name = "PaymentMethod" method = "POST">
          <div class="form-check">
            <button type="submit" class="btn btn-primary" name="deliveryType" value = "COD" OnClick="CODLocation()">COD</button> 
            <button type="submit" class="btn btn-primary" name="deliveryType" value = "ONLINE BANKING " OnClick="BankingLocation()">ONLINE BANKING</button> 
              
            <SCRIPT LANGUAGE="JavaScript">
              function CODLocation()
              {
                document.forms["PaymentMethod"].action = "checkCOD.php";
              }
              
              function BankingLocation()
              {
                document.forms["PaymentMethod"].action = "checkOnlineBanking.php";
              }    
            </script>      
          </div>
        </form>
        <a class="btn btn-primary" href="foodlist.php" role="button">Back to Menu</a>
      </center>  
    </div>
   
</body>
</html>
    