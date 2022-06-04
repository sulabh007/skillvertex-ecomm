<?php
  include 'database/_dbcon.php';
  session_start();
  include 'partials/header.php'; 
  include 'partials/navbar.php';
    if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin']!=true):
     	header("location:login.php");
     	exit;
              
	else:
?>
<style>
	.cart_quantity_button  {
  display: flex;
}
.cart_quantity_inc, .cart_quantity_inc{
  background:#F0F0E9;
  color: #696763;
  display: inline-block;
  font-size: 16px;
  height: 28px;
  overflow: hidden;
  text-align: center;
  width: 35px;
  float: left;
  border:none;
}
</style>
  <section id="cart_items">
		<div class="container">
			<div class="breadcrumbs">
				<ol class="breadcrumb">
				  <li><a href="index.php">Home</a></li>
				  <li class="active">Shopping Cart</li>
				</ol>
			</div>
			<div class="table-responsive cart_info">
				<table class="table table-condensed">
					<thead>
						<tr class="cart_menu">
							<td class="image">Item</td>
							<td class="description"></td>
							<td class="price">Price</td>
							<td class="quantity">Quantity</td>
							<td class="total">Total</td>
							<td></td>
						</tr>
					</thead>
					<tbody>
            <?php

                $email= $_SESSION['email'];

                $sqlid="SELECT user_id FROM `users` WHERE email= '$email'";
                $res= mysqli_query($db_con, $sqlid);
                $id= mysqli_fetch_assoc($res)['user_id'];

                $sql="SELECT * FROM `cart` WHERE buyer_id= $id";
                $result= mysqli_query($db_con, $sql);
                $total=0;
                while($row=mysqli_fetch_assoc($result)):
                  $pro= $row['item_id'];
                  $sqlpro="SELECT * FROM `products` WHERE product_id =$pro;";
                  $resultp= mysqli_query($db_con, $sqlpro);
				  $total=$total+$row['item_price'];
                  while($rowp= mysqli_fetch_assoc($resultp)):

            ?>			
						<tr>
							<td class="cart_product" style="width: 100px;height: 200px;">
								<a href="product.php?id=<?=$pro?>"><img src="<?=$rowp['product_image']?>" width='100%' alt=""></a>
							</td>
							<td class="cart_description">
								<h4><a href="product.php?id=<?=$pro?>"><?=$rowp['product_name']?></a></h4>
								<p>Web ID: <?=$pro?></p>
							</td>
							<td class="cart_price">
								<p>₹<?=$rowp['product_price']?></p>
							</td>
							<td class="cart_quantity">
								<form action="inc.php" method="post">
									<div class="cart_quantity_button">
										<input type="hidden" name="cartid" value="<?=$row['cart_id']?>">
										<input class="cart_quantity_inc" name="inc" type="submit" value="+">
										<input class="cart_quantity_input" type="text" name="quantity" value="<?=$row['quantity']?>" autocomplete="off" size="2">
										<input class="cart_quantity_inc" type="submit" name="inc" value="-">
									</div>
								</form>
							</td>
							<td class="cart_total">
								<p class="cart_total_price">₹<?=$row['item_price']?></p>
							</td>
							<td class="cart_delete">
								<a class="cart_quantity_delete" href="removefcart.php?cartid=<?=$row['cart_id']?>"><i class="fa fa-times"></i></a>
							</td>
						</tr>
            <?php
                  endwhile;
                endwhile;  
              endif;
            ?>
					</tbody>
				</table>
			</div>
		</div>
	</section> <!--/#cart_items-->
	<section>
		<div class="container">
			<div class="total_area" style="margin-bottom: 50px; max-width: 575px;">
				<ul>
					<li>Cart Sub Total <span>₹<?=$total?></span></li>
					<li>Eco Tax <span>₹<?=$total/50?></span></li>
					<li>Shipping Cost <span>Free</span></li>
					<li>Total <span>₹<?=$total+$total/50?></span></li>
				</ul>
				<a class="btn btn-default update" href="index.php">Shop More</a>
				<a class="btn btn-default check_out" href="">Check Out</a>
			</div>
		</div>
	</section>
	
<?php include 'partials/footer.php'; ?>