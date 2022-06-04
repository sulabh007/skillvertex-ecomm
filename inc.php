<?php
  include 'database/_dbcon.php';
  session_start();
  if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin']!=true){
    header("location:login.php");
    exit;
  }
  else{
    if(isset($_POST['cartid'], $_POST['inc'], $_POST['quantity'])){
      $cart_id=$_POST['cartid'];
      $inc=$_POST['inc'];
      $quan=$_POST['quantity'];
      $product="SELECT * FROM `cart` WHERE cart_id='$cart_id';";
      $respro= mysqli_query($db_con, $product);
      while($prows= mysqli_fetch_assoc($respro)){
        $price= $prows['item_price'];
        $q= $prows['quantity'];
      }
      $y= $price/$q;
      if ($inc=='+') {
       $x=$quan+1;
      }
      else if($inc=='-') {
       $x=$quan-1;
       if($x==0){
        $sql="DELETE FROM `cart` WHERE `cart`.`cart_id` ='$cart_id'";
        $res= mysqli_query($db_con, $sql);
        header("location:cart.php");
       }
      }
      $pr=$x*$y;
      $sql="UPDATE `cart` SET `quantity` = '$x',`item_price`= '$pr' WHERE `cart`.`cart_id` = '$cart_id';";
      $res= mysqli_query($db_con, $sql);
      header("location:cart.php");
    }
  }
 ?>
