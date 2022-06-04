<?php
    include 'database/_dbcon.php';
    session_start();

    $sqlcat="SELECT * FROM `categories`";
    $all_categories=mysqli_query($db_con, $sqlcat);

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
            $broname = $_POST['brand_name'];
            $bro_cate = $_POST['category'];
            $img = $_POST['image'];
            $exist=false;
            $sherr=false;
            
            $existsql="SELECT * FROM `brands` WHERE brand_name= '$broname';";
            $resultpro= mysqli_query($db_con, $existsql);
            $numRows= mysqli_num_rows($resultpro);
            if($numRows>0){
                $exist=true;
            echo "Already exist";
            }
            else{
                $exist=false;
        if($exist==false){
            $sql="INSERT INTO `brands`(`category_id`, `brand_name`, `brand_image`) 
            VALUES ('$bro_cate','$broname,'$img')";
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
    <div class="container" style="display: flex;margin-bottom: 30px;">
        <form action="" method="post">
            <div class="form-group">
                <label for="brand_name" class="form-label">Brand Name</label>
                <input type="text"  class="form-control" name="brand_name" id="brand_name" placeholder="Brand Name">
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

            
            <div class="form-group">
                <label for="image" class="form-label">Image</label>
                <input type="file" name="image" class="form-control" id="image">
            </div>

            <input type="submit" class="btn btn-default get" value="Add Product">
        </form>
    </div>
<?php include 'partials/footer.php'; ?>