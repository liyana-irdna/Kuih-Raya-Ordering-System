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
    echo "<script>alert('$message'); window.location = 'item.php'</script>";
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
              
                $idItem =mysqli_real_escape_string($conn,$_REQUEST['idItem']);
                $itemName = mysqli_real_escape_string($conn,$_REQUEST['itemName']);
                $price = mysqli_real_escape_string($conn,$_REQUEST['price']);
                $description = mysqli_real_escape_string($conn,$_REQUEST['description']);
                $idSupplier = mysqli_real_escape_string($conn,$_POST['idSupplier']);
                $stock = mysqli_real_escape_string($conn,$_REQUEST['stock']);
                $insertsql="INSERT INTO item (idItem,itemName,price,description,idSupplier,stock,image) VALUES ('$idItem','$itemName','$price','$description','$idSupplier','$stock','$fileName')";
                $insert = mysqli_query($conn, $insertsql);
                
                
                if($insert){
                    function_alert("New Item has been updated succesfully");
                }else{
                    function_alert("Item has NOT been updated succesfully");
                } 
            }
            else
            {
                function_alert("Sorry, there was an error uploading your file.");

            }
        }else{
            function_alert("Sorry, only JPG, JPEG, PNG, GIF, & PDF files are allowed to upload.");
        }
    }else{
        function_alert("Please select a file to upload.");
    }
    mysqli_close($conn); // Close connection
   

    ?>
