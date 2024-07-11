<?php 
session_start();
if(empty($_SESSION['userlogged'])):
  header('Location:loginAdmin.php');
endif;
?>
<html>
<head>
<link rel="stylesheet" type="text/css" href="styleList.css">
<link rel="stylesheet" 
href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

<title> millyShar Cookies</title>

</head>   
<body>



<!-- start:NAVBAR -->          

<nav class="navbar navbar-default navbar-fixed-top">    
  <div class="container2">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#myNavbar">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
    <a href="adminHome.php"><img class="logo" src="logo11.png"></a>
    </div>

    <div class="collapse navbar-collapse " id="myNavbar">
      <ul class="nav navbar-nav navbar-right">
        <li class="nav-item "><a  class="nav-link" href=""><span class="glyphicon glyphicon-user"></span> Welcome <?php echo $_SESSION['adminFullName']; ?> </a></li>
        <li  class="nav-item"><a class="nav-link" href="adminHome.php"><span class="glyphicon glyphicon-ok-sign"></span> Home </a></li>
        <li  class="nav-item "><a class="nav-link" href="status.php"><span class="glyphicon glyphicon-ok-sign"></span> Status </a></li>
        <li  class="nav-item "><a class="nav-link" href="supplier.php"><span class="glyphicon glyphicon-user"></span> Supplier </a></li>  
        <li  class="nav-item active"><a class="nav-link" href="item.php"><span class="glyphicon glyphicon-shopping-cart"></span> Item</a></li>  
        <li  class="nav-item "><a class="nav-link" href="orderCustAdmin.php"><span class="glyphicon glyphicon-list-alt"></span> Customer Orders List</a></li>           
        <li  class="nav-item "><a class="nav-link" href="logout.php"><span class="glyphicon glyphicon-log-out"></span> Log Out </a></li>
      </ul>
    </div>
  </div>
</nav>
    
  
<br>
<br>
<br>
<br>
<div class="container">
    <?php
    include("connection.php");
    $search = mysqli_real_escape_string($conn,$_POST['search']);?>
    <h2 align="center" ><b> SEARCH FOR "<?php echo $search?>"</b></h2>
    <hr> <br>

    <?php
    
    if ($conn->connect_error){
        die("Connection failed: ". $conn->connect_error);
    }

    $sql = "SELECT * FROM item where itemName like '%$search%'";
        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) > 0)
        {
            ?>
            <br>
            <form >
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col">No.</th>
                            <th scope="col">Image</th>
                            <th scope="col">Item Name</th>
                            <th scope="col">Price</th>
                            <th scope="col">Stock</th>
                            <th scope="col" colspan="2">ACTION</th>        
                        </tr>
                    </thead>
                    <?php
                    
                    $count=1;
                    while($row = mysqli_fetch_assoc($result))
                    {
                        $imageURL = 'C:/xampp/htdocs/img_dir/'.$row["image"];
                        $imageData = base64_encode(file_get_contents($imageURL));
                        ?>
                        <tbody>
                            <tr>
                                <th scope="row"><?php echo $count;?></th>
                                <td><?php echo '<img src="data:image/jpeg;base64,'.$imageData.'"width="300" height="200">'; ?></td>
                                <td><?php echo $row["itemName"];?></td>
                                <td><?php echo "RM " . $row["price"];?></td>
                                <td><?php echo $row["stock"];?></td>
                                <td><a href="itemUpdate.php?id=<?php echo $row['idItem']; ?>"><i class='glyphicon glyphicon-pencil' title="Update"></i> </a></td>
                                <td><a href="itemView.php?id=<?php echo $row['idItem']; ?>"><i class='glyphicon glyphicon-eye-open' title="View"></i> </a></td>
                            </tr>
                        
                        </tbody>
                        
                        <?php 
                        $count++;
                        
                    } 
                    
                    ?>
                </table>
            </form>
            <?php
        }
        else{
            echo "No result";
        }
mysqli_close($conn);
        
        ?>
     
    <div class="container">
        <div class="row">
            <div class="col-md-12 bg-light text-right">
            <a class="btn btn-primary btn float-right" href="item.php" role="button">Back</a>
            </div>
        </div>
    </div> 
</div>
<br>
<br>
<br>
<br>
<!-- start: FOOTER -->
<footer class="page-footer ">

<!-- Footer Links -->
    <div class="container-fluid text-center text-md-left">

        <!-- Grid row -->
        <div class="row">

            <!-- Grid column -->
            <div class="col-md-6 mt-md-0 mt-3">

            <!-- Content -->

                <p><img src="logo.png" width="250px" height="150px"></p>

            </div>
            <!-- Grid column -->

            <hr class="clearfix w-100 d-md-none pb-3">

            <!-- Grid column -->
            <div class="col-md-3 mb-md-0 mb-3">

                <!-- Links -->
                <h5 class="text-uppercase">Menu</h5>

                <ul class="list-unstyled">
                <li>
                <a href="adminHome.php"> Home</a>
                </li>
                <li>
                <a href="supplier.php"> Supplier</a>
                </li>
                <li>
                <a  href="item.php"> Item</a>
                </li>
                <li>
                <a href="status.php">Status</a>
                <li>
                <a href="orderCustAdmin.php">Customer Orders List</a>
                </li>
                <li>
                <a href="logout.php">Log Out</a>
                </li>
                </li>
                </ul>

            </div>
            <!-- Grid column -->
        </div>
    <!-- Grid row -->
    </div>
    <!-- Footer Links -->

    <!-- Copyright -->
    <div class="footer-copyright text-center py-3">© 2021 Copyright:millyShar Cookies
        <br> millyShar Cookies is optimized for ordering only. All of the content was provide by the admin.
    </div>
    <!-- Copyright -->

</footer>
<!-- end:Footer -->
</div>
</body>
</html>
    