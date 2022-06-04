<?php
    include 'database/_dbcon.php';
    session_start();

    $sqlcat="SELECT * FROM `categories`";
    $all_categories=mysqli_query($db_con, $sqlcat);

    $sqlb="SELECT * FROM `brands`";
    $all_brands=mysqli_query($db_con, $sqlb);

    if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin']!=true){
        header("location:login.php");
        exit;
    }
    else{
        $email=$_SESSION['email'];
        $sqlid="SELECT user_id FROM `users` WHERE email= '$email'";
        $res= mysqli_query($db_con, $sqlid);
        $id= mysqli_fetch_assoc($res)['user_id'];


        if($_SERVER["REQUEST_METHOD"]=="POST"){
            $proname = $_POST['product_name'];
            $pro_brand = $_POST['brand'];
            $pro_cate = $_POST['category'];
            $price = $_POST['price'];
            $quan = $_POST['quantity'];
            $img = $_POST['image'];
            $detail= $_POST['detail'];
            $seller= $id;
            $exist=false;
            $sherr=false;
            
            $existsql="SELECT * FROM `products` WHERE product_name= '$proname';";
            $resultpro= mysqli_query($db_con, $existsql);
            $numRows= mysqli_num_rows($resultpro);
            if($numRows>0){
                $exist=true;
            echo "Already exist";
            }
            else{
                $exist=false;
        if($exist==false){
            $sql="INSERT INTO `products`(`product_cate_id`, `product_brand_id`, `product_name`, `product_price`, `product_image`, `product_quantity`, `seller`, 'product_detail') 
            VALUES ('$pro_cate','$pro_brand','$proname','$price','$img','$quan','$seller','$detail')";
            $results= mysqli_query($db_con, $sql);
            if($results){
                header("location:index.php");
            }
        }
            }
        }
    }
?>

<?php include 'partials/header.php'; ?>
    <?php include 'partials/navbar.php'; ?>
    <div class="container">
        <form action="" method="post">
            <div class="form-group">
                <label for="product_name" class="form-label">Product Name</label>
                <input type="text"  class="form-control" name="product_name" id="product_name" placeholder="Product Name">
            </div>
            

            <label class="form-label" for="category">Category</label>
            <select class="form-select" name="category">
                <option value="">Choose a Category</option>
                <?php 
                while ($category = mysqli_fetch_array(
                    $all_categories,MYSQLI_ASSOC)):; 
                ?>
                <option value="<?php echo $category["category_id"];?>">
                    <?php echo $category["category_name"];?>
                </option>
                <?php 
                    endwhile; 
                ?>
            </select>

            <label class="form-label" for="brand">Brand</label>
            <select class="form-select" name="brand" id="brand">
                <option value="">Choose a Brand</option>
                <?php 
                while ($brand = mysqli_fetch_array(
                    $all_brands,MYSQLI_ASSOC)):; 
                ?>
                <option value="<?php echo $brand["brand_id"];?>">
                    <?php echo $brand["brand_name"];?>
                </option>
                <?php 
                    endwhile; 
                ?>
            </select>
            <div class="form-group">
                <label for="price" class="form-label">Price</label>
                <input type="number" class="form-control" name="price" id="price">
            </div>        
            <div class="form-group">
                <label for="quantity" class="form-label">Quantity</label>
                <input type="number" name="quantity" class="form-control" id="quantity">
            </div>

            <div class="form-group">
                <label for="image" class="form-label">Image</label>
                <input type="file" name="image" class="form-control" id="image">
            </div>

            <div class="form-group">
              <label for="detail" class="form-label">Details</label>
              <textarea class="form-control" id="detail" rows="3"></textarea>
            </div>
            <input type="submit" class="btn btn-default get" value="Add Product">
        </form>
    </div>
<?php include 'partials/footer.php'; ?>