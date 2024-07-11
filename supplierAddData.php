<?php 
session_start();
if(empty($_SESSION['userlogged'])):
  header('Location:loginAdmin.php');
endif;
?>
<?php

include ("connection.php");
  $supplierName =mysqli_real_escape_string($conn,$_REQUEST['supplierName']);

 $ins_query="INSERT INTO supplier (supplierName) VALUES ('$supplierName')";
if(mysqli_query($conn,$ins_query))
{
    function_alert("New data inserted succesfully");

}
else{
    function_alert("Record insert unsucessfully.");

}
mysqli_close($conn);

?>
<?php

function function_alert($message) {
      
    // Display the alert box 
    echo "<script>alert('$message'); window.location = 'supplier.php'</script>";
}
  

  
?>
