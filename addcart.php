<?php
  include 'database/_dbcon.php';
  session_start();
  if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin']!=true){
    header("location:login.php");
    exit;
  }
  else{
    $email= $_SESSION['email'];

    $sqlid="SELECT user_id FROM `users` WHERE email= '$email'";
    $res= mysqli_query($db_con, $sqlid);
    $id= mysqli_fetch_assoc($res)['user_id'];

    $sql="SELECT * FROM `cart` WHERE buyer_id= $id";
    $result= mysqli_query($db_con, $sql);

    if(isset($_POST['product_id'], $_POST['quantity'])){
      $pro_id=$_POST['product_id'];
      $quan= $_POST['quantity'];

      $tsql="SELECT * FROM `cart` WHERE item_id= $pro_id AND buyer_id=$id";
      $tresult= mysqli_query($db_con, $tsql);

      $qsql="SELECT * FROM `products` WHERE product_id=$pro_id;";
      $qresult= mysqli_query($db_con, $qsql);
      while($qrow= mysqli_fetch_assoc($qresult)){
        $qp= $qrow['product_quantity'];
        $price= $qrow['product_price'];
      }
  
      if($trow=mysqli_fetch_assoc($tresult)){
        $cartid= $trow['cart_id'];
        $qx=$quan+$trow['quantity'];
        if($qp-($qx)>=0){
          $x=$price*$qx;
          $update_pro= "UPDATE `cart` SET `quantity` = '$qx', `item_price` ='$x' WHERE `cart`.`cart_id` = $cartid;";
          $up= mysqli_query($db_con, $update_pro);
        }
        else{
          echo "Not enough";
        }
        
      }
      else{
        $x=$price*$quan;
        $add_cart="INSERT INTO `cart`(`buyer_id`, `item_id`, `quantity`, `item_price`) VALUES ('$id','$pro_id','$quan','$x')";
        $add_res= mysqli_query($db_con, $add_cart);
      }
    }
    header("location:cart.php");
  }
 ?>
