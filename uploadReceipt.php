<?php 
session_start();
if(empty($_SESSION['userlogged'])):
  header('Location:loginAdmin.php');
endif;
?>
<?php
// Include the database configuration file
include "connection.php";
function function_alert($message) {
      
    // Display the alert box 
    echo "<script>alert('$message'); window.location = 'receipt.php'</script>";
  } 
  function function_alert1($message) {
      
    // Display the alert box 
    echo "<script>alert('$message'); window.location = 'payment.php'</script>";
  } 
// File upload path
$targetDir = "C:/xampp/htdocs/img_dir/"; //directory to save the pic
$fileName = basename($_FILES["file"]["name"]); //file name that will be upload
$targetFilePath = $targetDir . $fileName;
$fileType = pathinfo($targetFilePath,PATHINFO_EXTENSION);

if(isset($_POST["submit"]) && !empty($_FILES["file"]["name"])){
    // Allow certain file formats
    $allowTypes = array('jpg','png','jpeg','gif','pdf');
    if(in_array($fileType, $allowTypes)){
        // Upload file to server
        if(move_uploaded_file($_FILES["file"]["tmp_name"], $targetFilePath)){
            function_alert("Your order have been received");

               
            }
            else
            {
                function_alert1("Sorry, there was an error uploading your file.");

            }
        }else{
            function_alert1("Sorry, only JPG, JPEG, PNG, GIF, & PDF files are allowed to upload.");
        }
    }else{
      function_alert1( "Please select a file to upload.");
    }
   

    ?>
