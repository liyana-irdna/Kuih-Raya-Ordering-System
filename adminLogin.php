
<?php

function function_alert($message) {
  
    // Display the alert box 
    echo "<script>alert('$message'); window.location = 'adminHome.php'</script>";
  }
  function function_alert1($message) {
  
    // Display the alert box 
    echo "<script>alert('$message'); window.location = 'loginAdmin.php'</script>";
  }

include ("connection.php");

    $adminUsername = mysqli_real_escape_string($conn,$_POST['adminUsername']);
    $password = mysqli_real_escape_string($conn,$_POST['adminPassword']);
    
    $sql = "SELECT * FROM admin
    WHERE adminUsername = '".$adminUsername."'
    AND adminPassword = '".md5($password)."'";
    // .md5($password)
    
    
    $qry = mysqli_query($conn,$sql);
    $row = mysqli_num_rows($qry);
    
    if($row > 0 )
    {
        $r = mysqli_fetch_assoc($qry);
        session_start();
        $_SESSION['userlogged'] = 1;
        $_SESSION['adminUsername'] = $adminUsername;
        $_SESSION['adminFullName'] = $r['adminFullName'];
        
        
       function_alert("Admin succesfully login");
    }
    
    else
    {
        function_alert1("Login failed. Please check your username and password again");
    }

?>