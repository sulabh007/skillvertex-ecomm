<?php
  include 'database/_dbcon.php';
  session_start();
  if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin']!=true){
    header("location:login.php");
    exit;
  }
  else{
    $cart_id=$_GET['cartid'];

    $sql="DELETE FROM `cart` WHERE `cart`.`cart_id` ='$cart_id'";
    $res= mysqli_query($db_con, $sql);
    header("location:cart.php");
  }
 ?>
