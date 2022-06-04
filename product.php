<style>
    .img-responsive{
        width: 400px;
    }
    #quantity{
        width:50px;
        height:35px;
        margin-left: 10px;
    }
</style>
<?php
    include 'database/_dbcon.php';
    $p_id=$_GET['id'];
    $sql="SELECT * FROM `products` WHERE product_id =$p_id;";
    $result= mysqli_query($db_con, $sql);
    while($row= mysqli_fetch_assoc($result)):
        $pname= $row['product_name'];

        $b_id= $row['product_brand_id'];
        $sqlbrand= "SELECT * FROM `brands` WHERE brand_id=$b_id;";
        $result1= mysqli_query($db_con, $sqlbrand);
        $pbrand= mysqli_fetch_assoc($result1)['brand_name'];

        $pc_id= $row['product_cate_id'];
        $sqlcat="SELECT * FROM `categories` WHERE category_id =$pc_id;";
        $result1= mysqli_query($db_con, $sqlcat);
        $pcat= mysqli_fetch_assoc($result1)['category_name'];

        $pdetail= $row['product_detail'];
        $pprice= $row['product_price'];
        $pquantity= $row['product_quantity'];
        $pimg= $row['product_image'];
        $pseller= $row['seller'];
        $usql= "SELECT * FROM `users` WHERE user_id ='$pseller';";
        $usersql= mysqli_query($db_con, $usql);
        while($urow= mysqli_fetch_assoc($usersql)):
            $user=$urow['first_name'].' '.$urow['last_name'];
        endwhile;
?>
<?php include 'partials/header.php'; ?>
    <?php include 'partials/navbar.php'; ?>
    <div class="container product-information"><!--/product-information-->
        <img src="images/product-details/new.jpg" class="newarrival" alt="" />
        <h1><?=$pname?></h1>
        <p><b>Product Id:</b><?=$p_id?></p>
        <div class="details" style="display: flex;font-size:20px;">
        <img src="<?=$pimg?>" alt="" class="share img-responsive"/>
            <div class="pro-de">
                <span>
        	<span>IND ₹<?=$pprice?></span>
        </span>
            <p><b>Availability:</b><?php if($pquantity>0){echo 'In Stock';} else{echo 'Sold Out';}?> </p>
            <p><b>Category:</b> <?=$pcat?></p>
            <p><b>By:</b> <?=$user?></p>
            <p><b>Brand:</b><?=$pbrand?></p>
            <a href=""><img src="images/product-details/share.png" class="share img-responsive"  alt="" /></a>
            </div>
            
        </div>
        
        
        
	</div><!--/product-information-->
    <div class="container">
        <form action="addcart.php" method="post">
            <label style="font-size:20px;">Quantity:</label>
            <input type="number" name="quantity" value="1" min="1" max="<?=$pquantity?>" id="quantity">
            <input type="hidden" name="product_id" value="<?=$p_id?>">
            <input type="submit" value="Add To Cart" class="btn btn-fefault cart">
        </form>
    </div>
    <div class="container" style="font-size:20px;">
        <p><b>Detail:</b><br></p>
        <p style="margin-left: 30px;"><?=$pdetail?></p>
    </div>
<?php endwhile;?>
<?php include 'partials/footer.php'; ?>