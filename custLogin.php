<?php
function function_alert($message) {
  
    // Display the alert box 
    echo "<script>alert('$message'); window.location = 'foodlist.php'</script>";
  }
  function function_alert1($message) {
  
    // Display the alert box 
    echo "<script>alert('$message'); window.location = 'customerlogin.php'</script>";
  }

include ("connection.php");


    $username = mysqli_real_escape_string($conn,$_POST['email']);
    $password = mysqli_real_escape_string($conn,$_POST['custPassword']);
    
    $sql = "SELECT * FROM customer
    WHERE email = '".$username."'
    AND custPassword = '".md5($password)."'";
    
    
    
    $qry = mysqli_query($conn,$sql);
    $row = mysqli_num_rows($qry);
    
    if($row > 0 )
    {
        $r = mysqli_fetch_assoc($qry);
        session_start();
        $_SESSION['userlogged'] = 2;
        $_SESSION['email'] = $username;
        $_SESSION['custName'] = $r['custName'];
        $_SESSION['idCust'] = $r['idCust'];
        $_SESSION['houseNo'] = $r['houseNo'];
        $_SESSION['streetNum']=$r['streetNum'];
        $_SESSION['city']=$r['city'];
        $_SESSION['state']=$r['state'];


        
        
        // header("Location: foodlist.php");
        function_alert("You have succesfully login");
    }
    
    else
    {
        function_alert1("Login failed. Please check your username and password");
    }

mysqli_close($conn); // Close connection

?>