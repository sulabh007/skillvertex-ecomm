<?php include 'partials/header.php'; 
include 'database/_dbcon.php';
session_start();
include 'partials/navbar.php'; ?>
    
    
    <section id="slider"><!--slider-->
		<div class="container">
			<div class="row">
				<div class="col-sm-12">
					<div id="slider-carousel" class="carousel slide" data-ride="carousel">
						<ol class="carousel-indicators">
							<li data-target="#slider-carousel" data-slide-to="0" class="active"></li>
							<li data-target="#slider-carousel" data-slide-to="1"></li>
							<li data-target="#slider-carousel" data-slide-to="2"></li>
						</ol>						
						<div class="carousel-inner">
							<div class="item active">
								<div class="col-sm-6">
									<h1><span>E</span>-SHOPPER</h1>
									<h2>Shop Online on E-Shopper</h2>
									<p>A web project made by Sulabh Jha and Saksham Gupta for their Skill Vertex major project. </p>
									<form action="signup.php">
										<button type="submit" class="btn btn-default get">Sign up now</button>
									</form>

								</div>
								<div class="col-sm-6">
									<img src="images/home/girl.jpg" class="girl img-responsive" alt="" />
								</div>
							</div>
							<div class="item">
								<div class="col-sm-6">
									<h1><span>E</span>-SHOPPER</h1>
									<h2>100% Responsive Design</h2>
									<p>Frontend Designing done by Saksham Gupta. </p>
									<form action="signup.php">
										<button type="submit" class="btn btn-default get">Sign up now</button>
									</form>
								</div>
								<div class="col-sm-6">
									<img src="images\home\Sasksham.jpeg" class="girl img-responsive" alt="" />
								</div>
							</div>
							
							<div class="item">
								<div class="col-sm-6">
									<h1><span>E</span>-SHOPPER</h1>
									<h2>100% Responsive Design</h2>
									<p>Backend Designing done by Sulabh Jha.</p>
									<form action="signup.php">
										<button type="submit" class="btn btn-default get">Sign up now</button>
									</form>
								</div>
								<div class="col-sm-6">
									<img src="" class="girl img-responsive" alt="" />		<!-- @Sulabh Jha insert your image here -->
								</div>
							</div>	
						</div>
						
						<a href="#slider-carousel" class="left control-carousel hidden-xs" data-slide="prev">
							<i class="fa fa-angle-left"></i>
						</a>
						<a href="#slider-carousel" class="right control-carousel hidden-xs" data-slide="next">
							<i class="fa fa-angle-right"></i>
						</a>
					</div>
					
				</div>
			</div>
		</div>
	</section><!--/slider-->
	<div class="row" style="margin-bottom: 30px;">
		<div class="col-sm-3">
			<div class="left-sidebar">
				<h2>Category</h2>
				<div class="category-name"><!--category-productsr-->
					<ul class="nav nav-pills nav-stacked">	
						<?php
							$sqlcat= "SELECT * FROM `categories`";
							$resultcat= mysqli_query($db_con, $sqlcat);
							while($row= mysqli_fetch_assoc($resultcat)){
								$cat_id= $row['category_id'];
								$cat= $row['category_name'];
								echo '<a href="cate_sort.php?catid='.$cat_id.'">
										<h5 style="color: #696763;padding: 5px 25px;text-decoration: none;text-transform: uppercase;">'.$cat.'</h5>
									</a>';
							}
						?>
					</ul>
				</div>
				<div class="brands_products">
					<h2>Brands</h2>
					<div class="brands-name">
						<ul class="nav nav-pills nav-stacked">	
							<?php
							$sqlbran= "SELECT * FROM `brands`";
							$resultbran= mysqli_query($db_con, $sqlbran);
							
							while($rowb= mysqli_fetch_assoc($resultbran)){
								$brand_id= $rowb['brand_id'];
								$bat= $rowb['brand_name'];
								$count="SELECT COUNT(*) AS total  FROM `products` WHERE product_brand_id= '$brand_id';";
								$resc= mysqli_query($db_con, $count);
								$c= mysqli_fetch_assoc($resc);
								echo '<li><a href="brands.php?bid='.$brand_id.'"><span class="pull-right">('.$c["total"].')</span>
										<h5>'.$bat.'</h5>
										
									</a></li>';
							}
							?>	

						</ul>
					</div>
				</div>
				<div class="shipping text-center"><!--shipping-->
					<img src="images/home/shipping.jpg" alt="" />
				</div><!--/shipping-->
				
			</div>
			
		</div><div class="col-sm-9 padding-right">
					<div class="features_items"><!--features_items-->
						<h2 class="title text-center">Features Items</h2>
						<?php include('sort.php') ?>
					</div>
				</div>			
	</div>
	<!--/category-products-->
  <?php include 'partials/footer.php'; ?>