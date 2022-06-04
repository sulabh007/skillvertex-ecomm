<?php
    include 'database/_dbcon.php';
    include 'partials/header.php'; 
?>
<style>
    .row{
        display: flex;
    flex-wrap: wrap;
    justify-content: center;
    }
    .card-body{
        display: flex;
        justify-content: center;
    }
    .card-body a{
       height: 50px;
    font-size: 16px;
    text-transform: uppercase;
    display: flex;
    align-items: center;
    justify-content: center;
    }
    .cimg{
            width: 300px;
        height: 300px;
        display: flex;
    }
</style>
    <?php include 'partials/navbar.php'; ?>
    <div class="row">
        <?php
            $brand_id=$_GET['bid'];
            $sql= "SELECT * FROM `brands` WHERE brand_id=$brand_id;";
            $result= mysqli_query($db_con, $sql);
            while($row= mysqli_fetch_assoc($result)){
                $sql1= "SELECT * FROM `products` WHERE product_brand_id =$brand_id;";
                $result2= mysqli_query($db_con, $sql1);
                while($row= mysqli_fetch_assoc($result2)){
                    $pro_id= $row['product_id'];
                    $pname= $row['product_name'];
                    $pimg= $row['product_image'];
                    echo '<div class="col-sm-2"  style="margin: 10px;">
                        <div class="card" style="width: 30rem;">
                            <div class="cimg">
                                <a href="brands.php?bid='.$pro_id.'"><img src="'.$pimg.'" class="card-img-top" alt="..." style="width:100%;"></a>
                                </div>
                                <div class="card-body">
                                    <a href="product.php?id='.$pro_id.'" class="btn btn-primary">'.$pname.'</a>
                                </div>
                            </div>
                        </div>';
                }
            }
        ?>
    </div>

<?php include 'partials/footer.php'; ?>