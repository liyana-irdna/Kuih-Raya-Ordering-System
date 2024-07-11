<?php
function function_alert($message) {
  
  // Display the alert box 
  echo "<script>alert('$message'); window.location = 'item.php'</script>";
}
include ("connection.php"); // Using database connection file here

// get id through query string


$itemName = mysqli_real_escape_string($conn,$_POST['itemName']);
$price = mysqli_real_escape_string($conn,$_POST['price']);
$description = mysqli_real_escape_string($conn,$_POST['description']);
$idSupplier = mysqli_real_escape_string($conn,$_POST['idSupplier']);
$stock = mysqli_real_escape_string($conn,$_POST['stock']);

  $statusMsg = '';
  $targetDir = "C:/xampp/htdocs/img_dir/"; //directory to save the pic
  $fileName = basename($_FILES["file"]["name"]); //file name that will be upload
  $targetFilePath = $targetDir . $fileName;
  $fileType = pathinfo($targetFilePath,PATHINFO_EXTENSION);
  $allowTypes = array('jpg','png','jpeg','gif','pdf');
  $insertsql="UPDATE item SET itemName='$itemName',price='$price',description='$description',idSupplier='$idSupplier',stock='$stock',image='$fileName' WHERE idItem='$id'";
  $insert = mysqli_query($conn, $insertsql);
  if($insert)
  {
    function_alert("Item is sucessfully updated .");
    ?>
    
    <?php 
    
    mysqli_close($conn); // Close connection
  }
  else{
    function_alert("File upload failed, please try again.");
    
  } 


  if(in_array($fileType, $allowTypes))
  {
    // Upload file to server
    if(move_uploaded_file($_FILES["file"]["tmp_name"], $targetFilePath))
    {
          $insertsql="UPDATE item SET image='$fileName' WHERE idItem='$id'";

       
    }
    else
      {
        function_alert("Sorry, there was an error uploading your file.");
        
      }
    
  }
  else
    {
      function_alert("Sorry, only JPG, JPEG, PNG, GIF, & PDF files are allowed to upload.");
    }
  


mysqli_close($conn); // Close connection

// Display status message
?>