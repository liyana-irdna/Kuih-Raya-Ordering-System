<?php
session_start ();

require 'connection.php';
// require 'checkout.php';

function function_alert($message) {
  
    // Display the alert box 
    echo "<script>alert('$message'); window.location = 'receipt.php'</script>";
    
  }

$idCust=$_SESSION['idCust']; 
$deliveryType=$_POST['deliveryType'];
$idAdmin=10;
$idStatus=50;

// Save new order
mysqli_query($conn, "insert into orders(idStatus, idCust, orderDate,idAdmin,deliveryType)values('$idStatus','$idCust', '".date('Y-m-d')."', '$idAdmin', '$deliveryType')");
$ordersid = mysqli_insert_id($conn);

// Save order details for new order
foreach ($_SESSION["cart_item"] as $item)
{
 
        $sql='insert into ordes_items(idOrders,idItem, quantity) values( "'.$ordersid.'","'.$item['idItem'].'", "'.$item['quantity'].'")';
        // echo $sql;

    $add=mysqli_query($conn,$sql);

}
if($add)
{
  function_alert("You have successfully choose COD as your payment method. Please wait 1~3 days until the order processed.");
  
  

}
else
{
  function_alert("Something is wrong, sorry for the inconvenience");
} 

// Clear all products in cart  
mysqli_close($conn); // Close connection

   
?>
