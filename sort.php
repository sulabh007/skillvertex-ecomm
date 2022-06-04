<style>
    .img{
        display: flex;
        width: 300px;
        height: 400px;
        align-items: center;
    }
    #sort{
        width: 400px;;
    }

</style>    
    <form action="" method="POST" id="sort">
        <label for="sorting">Sort By:</label>
        <select name="sorting" id="sorting">
            <option value="">Sort By:</option>
            <option value="product_price ASC">Low to High</option>
            <option value="product_price DESC">High to Low</option>
            <option value="product_name ASC">A to Z</option>
            <option value="product_name DESC">Z to A</option>
            
        </select>
        <input type="submit" value="select" style="margin:10px;">
    </form>

<?php
    include 'database/_dbcon.php';
    if($_SERVER["REQUEST_METHOD"]=="POST"){
        $str=$_POST['sorting'];
        if($str!=''){
           $sort_by= explode(' ',$str);
            $sql="SELECT * FROM `products` ORDER BY `products`.`$sort_by[0]` $sort_by[1]";
        }
        else{
            $sql="SELECT * FROM `products`";
        }
    }
    else{
        $sql="SELECT * FROM `products`";
    }
    $results= mysqli_query($db_con, $sql);
    while($row= mysqli_fetch_assoc($results)):
        $pro_id= $row['product_id'];
        $pname= $row['product_name'];
        $pprice= $row['product_price'];
        $pimg= $row['product_image'];
?>
    <div class="col-sm-4">
		<div class="product-image-wrapper">
			<div class="single-products">
				<div class="productinfo text-center">
                    <div class="img">
                        <a href="product.php?id=<?=$pro_id?>"><img src="<?=$pimg?>" alt="" width="400px"/></a>
                    </div>	
					<h2><?=$pprice?></h2>
					<a href="product.php?id=<?=$pro_id?>"><?=$pname?></a>
				</div>
		    </div>						
	    </div>
	</div>
    <?php endwhile; ?>    