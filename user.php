<?php
    include 'database/_dbcon.php';
    session_start();
    include 'partials/header.php'; 
    include 'partials/navbar.php';
    if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin']!=true):
     	header("location:login.php");
     	exit;
              
	else:
        $em=$_SESSION['email'];
        $sql="SELECT * FROM `users` WHERE email ='$em';";
        $result= mysqli_query($db_con, $sql);
        while($row= mysqli_fetch_assoc($result)):
            $u_id= $row['user_id'];
            $phone= $row['number'];
            $fname= $row['first_name'];
            $lname= $row['last_name'];
            $phone= $row['number'];
            $Address= $row['address'];
        
?>

    <div class="container"><!--/user-information-->
        <h1 style="font-size:70px;"><?=$fname." ".$lname?></h1>
        <p><b>Web Id:</b><?=$u_id?></p>
        <div class="details" style="font-size:25px;margin: 40px;">
            <p><b>Email:</b> <?=$em?></p>
            <p><b>Mobile No:</b> <?=$phone?></p>
            <p><b>Address:</b> <?=$Address?></p>
            
            <a href="cart.php">Your Cart</a>
            </div>
            
        </div>
        
        
        
	</div><!--/product-information-->
    <?php endwhile;?>
<?php endif;?>
<?php include 'partials/footer.php'; ?>