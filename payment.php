<?php 
session_start();
if(empty($_SESSION['userlogged'])):
  header('Location:loginAdmin.php');
endif;
?>


<html>
<head>
  <title>millyShar Cookies</title>
  <link rel="stylesheet" type="text/css" href="styleList.css">
  <link rel="stylesheet"   href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <meta charset="UTF-8">
</head>

<body>
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
                                <li class="nav-item "><a href="#"><span class="glyphicon glyphicon-user"></span>  <?php echo $_SESSION['custName']; ?> </a></li>
                                <li class="nav-item ">""   </li>
                                <li class="nav-item"></li>
                                <li class="nav-item "></li>
                                </ul>    
                            </div>
                        
                        </div>
                    </nav>
                </div> 
<?php
    $type=$_SESSION['idCust'];
    $date=date('Y-m-d');
    
    include ("connection.php");
    $sql =mysqli_query($conn,"select MAX(idOrders) as maximum from orders ");
    if(mysqli_num_rows($sql)>0)
    {
      
      while($row = mysqli_fetch_array($sql))
      {
        $max=$row['maximum'];
      }
      
    }
    mysqli_close($conn); // Close connection
?>
<div style="float:left; margin-left : 15%; margin-top:2%;">
  <div style="display: inline-block; text-align: left;">   
    <img height='100' width='150' src="logo11.png"><br /><br />
    <?php echo "MillyShar Cookies," ;?><br />
    <?php echo "Jalan Seri Putri 1," ;?><br />
    <?php echo "50460 Damansara Utama," ;?><br />
    <?php echo "selangor"; ?><br /></b>
    <br>


  </div>
</div>



<div style="margin-left:70%; margin-top:5%; ">
  <div style=" text-align: left;">

  <table border="1" style= "width:250px" >
  <tr><td> 
    <?php echo "Receipt No: ". $max ; ?><br>
    <?php echo "Date: " .$date; ?><br>
    <?php echo "Payment: Online Banking (Delivery) "; ?> 
  </td> </tr>
</table>
<br>
<table border="1" style= "width:250px" >
  <tr><td> 
    <p><h4> DELIVERY ADDRESS:</h4></p>
            <?php echo $_SESSION['custName'] .",";?><br />
            <?php echo $_SESSION['houseNo'] .", ".$_SESSION['streetNum'].",";?><br />
            <?php echo $_SESSION['city'] .","; ?><br />
            <?php echo $_SESSION['state']; ?> <br><br>
</td></td>
</table>
           



  </div>
</div>





<div class="container">
  <div class="row">
      <div class="col-md-12">
        <hr/>
        <h3><b>ORDER RECEIPT</b></h3>
        <table class="table table-bordered print">
          <thead>
            <tr>
            <th scope="col" width="10%">No.</th>
            <th scope="col">Item Name</th>
            <th scope="col">Quantity</th>
            <th scope="col">Price</th>
            <th scope="col">Total Price</th>
            </tr>
          </thead>
          <tbody>
            <?php
            $no=0;
            foreach ($_SESSION["cart_item"] as $item) //loop for each item
            {
              $no = $no + 1;
              ?>
              <tr>
              <td><b><?php echo $no ?></b></td>
              <td><?php echo $item["itemName"]; ?></td>
              <td style="text-align:center;"><?php echo $item["quantity"]; ?></td>
              <td  style="text-left:right;"><?php echo "RM ".$item["price"]; ?></td>
              <td id = "sum"><?php echo number_format($item["quantity"] * $item["price"], 2); ?></td>
              </tr>
              <?php  }?>
              <td style ="text-align:center;" colspan="4"><b> TOTAL  </b></td>
              <td style ="text-align:left;" colspan="4" id="total"></td>
          </tbody>
        </table>
        </div>
  </div>
</div>
        <div class="text-center">  
          <form action="uploadReceipt.php" method="post" enctype="multipart/form-data">
            <b>FOR ONLINE PAYMENT :</b>
            <p style="color:red;"><i>(PLEASE PROVIDE PAYMENT PROOF FOR ONLINE PAYMENT. <br>DO NOTE THAT ORDER STATUS WILL NOT BE UPDATED IF FAIL TO DO SO.
            <br>ONLY JPG,PNG,JPEG AND PDF ARE ALLOWED.)</i></p>
            <center>
            <input type="file" name="file" id="fileToUpload">
            <input type="submit" class="btn btn-primary" href="receipt" name="submit" value="SUBMIT">
            </center>
          </form>  
        </div>



 
  <script>
    $(function(){
      var TotalPrice = 0;
      $("tr #sum").each(function(index,value){
        currentRow= parseFloat($(this).text());
        TotalPrice += currentRow;
      })    
      document.getElementById('total').innerHTML = "RM "+ TotalPrice;
      
    });
  </script>
  </body>
  
  </html>
  
