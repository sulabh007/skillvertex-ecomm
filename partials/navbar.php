<?
include 'database/_dbcon.php';
session_start();
?>
  <header id="header"><!--header-->
		<div class="header_top"><!--header_top-->
			<div class="container">
				<div class="row">
					<div class="col-sm-6">
						<div class="contactinfo">
							<ul class="nav nav-pills">
								<li><a href="#"><i class="fa fa-phone"></i> +91 950188 8210</a></li>
								<li><a href="#"><i class="fa fa-envelope"></i> info@domain.com</a></li>
							</ul>
						</div>
					</div>
					<div class="col-sm-6">
						<div class="social-icons pull-right">
							<ul class="nav navbar-nav">
								<li><a href="#"><i class="fa fa-facebook"></i></a></li>
								<li><a href="#"><i class="fa fa-twitter"></i></a></li>
								<li><a href="#"><i class="fa fa-linkedin"></i></a></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div><!--/header_top-->

<div class="header-middle"><!--header-middle-->
			<div class="container">
				<div class="row">
					<div class="col-sm-4">
						<div class="logo pull-left">
							<a href="index.php"><img src="images/home/logo.png" alt="" /></a>
						</div>
					</div>
					<div class="col-sm-8">
						<div class="shop-menu pull-right">
							<ul class="nav navbar-nav">
								<li class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> Account <b class="caret"></b></a>
						<ul class="dropdown-menu">
									<li><a class="dropdown-item" href="category.php">Category</a></li>
									<li><a class="dropdown-item" href="all_brands.php">Brands</a></li>
									<li><a class="dropdown-item" href="add_product.php">Sell Product</a></li>
									<li><a class="dropdown-item" href="add_brands.php">Add Brands</a></li>
									<li class="divider"></li>
								</ul>
								</li>
								<li><a href="cart.php"><i class="fa fa-shopping-cart"></i> Cart</a></li>
<?php
if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin']!=true){
  echo '
				  <li class="dropdown">
<a href="#" class="dropdown-toggle" data-toggle="dropdown">Login & Sign Up <b class="caret"></b></a>
<ul class="dropdown-menu">
  <li><a class="dropdown-item" href="login.php">Login</a></li>
<li><a class="dropdown-item" href="signup.php">Sign Up</a></li>
  <li class="divider"></li>
</ul>
  </li>';
  
}
else{
  echo '<li class="nav-item">
<a class="navbar-brand" href="user.php">'.$_SESSION['email'].'</a>
  </li>
  <li class="nav-item">
<a class="nav-link active" aria-current="page" href="logout.php">Log Out</a>
  </li>';
}

  ?>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div><!--/header-middle-->
</header>