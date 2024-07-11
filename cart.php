<?php
session_start();
if(empty($_SESSION['userlogged'])):
    header('Location:customerlogin.php');
endif;
$status="";
include("connection.php");

/**
* Creating CART SESSION -- IMPORTANT ***
* moved the section on top of the document before the nav bar creation
*/
// $cartCount = 0;
if(!empty($_GET["action"])) {
    switch($_GET["action"]) {
        //code for adding product in cart
        case "add":
            if(!empty($_POST["quantity"])) {
                $idItem=$_REQUEST["idItem"];
                $result=mysqli_query($conn,"SELECT * FROM item WHERE idItem='$idItem'");
                while($row=mysqli_fetch_array($result)){
                    $itemArray = array($row["idItem"]=>array('idItem'=>$row["idItem"],'itemName'=>$row["itemName"], 'quantity'=>$_POST["quantity"], 'price'=>$row["price"], 'image'=>$row["image"]));
                    if(!empty($_SESSION["cart_item"])) {
                        if(in_array($row["idItem"],array_keys($_SESSION["cart_item"]))) {
                            foreach($_SESSION["cart_item"] as $k => $v) {
                                if($row["idItem"] == $k) {
                                    if(empty($_SESSION["cart_item"][$k]["quantity"])) {
                                        $_SESSION["cart_item"][$k]["quantity"] = 0;
                                    }
                                    $_SESSION["cart_item"][$k]["quantity"] += $_POST["quantity"];
                                    $status="Item succesfully added to cart";                          }
                                }
                            } else {
                                $_SESSION["cart_item"] = array_merge($_SESSION["cart_item"],$itemArray);
                            }
                        }  else {
                            $_SESSION["cart_item"] = $itemArray;
                        }
                    }
                }
                break;
                
                // code for removing product from cart
                case "remove":
                    if(!empty($_SESSION["cart_item"])) {
                        foreach($_SESSION["cart_item"] as $k => $v) {
                            if($_GET["idItem"] == $k)
                            unset($_SESSION["cart_item"][$k]);				
                            if(empty($_SESSION["cart_item"]))
                            unset($_SESSION["cart_item"]);
                        }
                        $status="Item succesfully DELETE from cart";                          
                    }
                    
                    
                    break;
                    // code for if cart is empty
                    case "empty":
                        unset($_SESSION["cart_item"]);
                        break;	
                    }
                }
                ?>
                <html>
                <head>  
                <link rel="stylesheet" type="text/css" href="styleList.css">
                <link rel="stylesheet" type="text/css" href="foodlist1.css">
                <link rel="stylesheet" 
                href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
                <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
                <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
                
                <title>millyShar Cookies</title>
                </head>   
                <body>
                
                
                <!-- start:NAVBAR -->          
                
                
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
                                <li class="nav-item "><a href="#"><span class="glyphicon glyphicon-user"></span> Welcome <?php echo $_SESSION['custName']; ?> </a></li>
                                <li class="nav-item "><a href="foodlist.php"><span class="glyphicon glyphicon-cutlery"></span> Menu </a></li>
                                <li class="nav-item active"><a href="cart.php"><span class="glyphicon glyphicon-shopping-cart"></span> Cart 
                                <?php
                                if(isset($_SESSION["cart_item"]))
                                {
                                    // display total quantity in nav bar
                                    // has session
                                    
                                    $cartCount = 0;
                                    foreach($_SESSION["cart_item"] as $keys => $values) {
                                        $cartCount = $cartCount + $_SESSION["cart_item"][$keys]["quantity"];
                                    }        
                                    echo $cartCount;
                                }
                                else
                                {
                                    // has no session
                                    // auto display 1 as the cart item number
                                    // the session is created after the navbar creation
                                    echo "1";
                                }
                                ?>
                                
                                </a></li>
                                <li class="nav-item "><a href="logoutCust.php"><span class="glyphicon glyphicon-log-out"></span> Log Out </a></li>
                                </ul>    
                            </div>
                        
                        </div>
                    </nav>
                </div> 

                
                
                <br>
                <br>
                <br>
                <br>
                <!-- end of navbar-->        
                
                <!-- cart says -->
                <div class="container">
                <h1>Your Shopping Cart</h1>
                <h2>Selamat Hari Raya!!!</h2>
                <a id="btnEmpty" href="cart.php?action=empty"class="btn btn-primary"><p>Empty Cart</p></a>
                
                <?php
                if(isset($_SESSION["cart_item"]))
                {
                    $no= 0;
                    $total_quantity = 0;
                    $total_price = 0;
                    ?>	
                    <div class="table-responsive" style="padding-left: 100px; padding-right: 100px;" >
                        <div style = "font-size:20px; color:#cc0000; margin-top:10px"><?php echo $status; ?></div>
                            
                            <table class="table table-striped" id="tableID">
                            <thead class="thead-dark">
                            <tr>
                                <th scope="col" width="10%">No.</th>
                                <th scope="col" width="15%">Item</th>
                                <th scope="col">Item Name</th>
                                <th scope="col">Quantity</th>
                                <th scope="col">Price (RM) </th>
                                <th scope="col">Total (RM)</th>
                            </tr>
                            
                            <tbody>
                            <?php 
                            foreach ($_SESSION["cart_item"] as $item)
                            {   
                                
                                $no = $no + 1;
                                ?>
                                <tr>
                                <td><b><?php echo $no ?></b></td>
                                <td><img src="<?php echo $item["image"]; ?>" style = "width: 100px; height :100px"/></td>
                                <td><?php echo $item["itemName"]; ?></td>
                                <td id = "quanti"><?php echo $item["quantity"]; ?></td>
                                <td><?php echo $item["price"]; ?></td>
                                
                                <td id = "sum"><?php echo number_format($item["quantity"] * $item["price"], 2); ?></td>
                                
                                <td><a href="cart.php?action=remove&idItem=<?php echo $item['idItem']; ?>" class="btnRemoveAction"><i class='glyphicon glyphicon-trash' title="Delete"></i></a></td>
                                </tr>
                                <?php
                                $total_quantity += $item["quantity"];
                                
                            }
                            ?>
                            
                            <tr>
                            <td style="font-weight: bold" colspan="3" > Total </td>
                            <td style="font-weight: bold" id="amount"></td>
                            <td></td>
                            <td style="font-weight: bold" colspan="2" id="total"></td>
                            </tr>
                            </tbody>
                            </table>		
                            <?php
                        } else {
                            ?>
                            
                            <div class="jumbotron" style="text-align: center; margin-top: 10%;">
                            <h2> No result </h2>
                            </div>
                            
                            <?php 
                        }
                        ?>
                    </div>
                
                    <a class="btn btn-primary" href="foodlist.php" role="button">Back to Menu</a>
                    <a class="btn btn-primary" href="checkout.php" role="button">Payment</a>
                </div>

                <script>
                $(function()
                {
                    var TotalPrice = 0;
                    $("tr #sum").each(function(index,value){
                        currentRow= parseFloat($(this).text());
                        TotalPrice += currentRow;
                    })    
                    document.getElementById('total').innerHTML = "RM "+ TotalPrice;
                    
                });

                $(function()
                {
                    var totalQuantity = 0;
                    $("tr #quanti").each(function(index,value){
                        currentRow= parseFloat($(this).text());
                        totalQuantity += currentRow;
                    })    
                    document.getElementById('amount').innerHTML = totalQuantity;
                    
                });
                </script>
                </body>
                <!-- cart says end -->
                
                </html>
