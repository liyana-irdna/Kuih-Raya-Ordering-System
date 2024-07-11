<?php 
session_start();
if(empty($_SESSION['userlogged'])):
  header('Location:loginAdmin.php');
endif;
?>
<?php

include ("connection.php");
  $status =mysqli_real_escape_string($conn,$_REQUEST['status']);

 $ins_query="INSERT INTO orders_status (status) VALUES ('$status')";
if(mysqli_query($conn,$ins_query))
{
    function_alert("New data inserted succesfully");

}
else{
    function_alert("Record insert unsucessfull.");

}
mysqli_close($conn);

?>
<?php

function function_alert($message) {
      
    // Display the alert box 
    echo "<script>alert('$message'); window.location = 'status.php'</script>";
}
  

  
?>
