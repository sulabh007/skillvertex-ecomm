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
    <div class="conatiner">
    <div class="row">
        <?php
            $cat_id=$_GET['catid'];
            $sql="SELECT * FROM `categories` WHERE category_id =$cat_id;";
            $result= mysqli_query($db_con, $sql);
            while($row= mysqli_fetch_assoc($result)){
                
                $sql1= "SELECT * FROM `brands` WHERE category_id=$cat_id;";
                $result2= mysqli_query($db_con, $sql1);
                while($row= mysqli_fetch_assoc($result2)){
                    $brand_id= $row['brand_id'];
                    $bimg=$row['brand_image'];
                    $bat= $row['brand_name'];
                    echo '<div class="col-sm-2"  style="margin: 10px;">
                    <div class="card" style="width: 30rem;">
                        <div class="cimg">
                            <a href="brands.php?bid='.$brand_id.'"><img src="'.$bimg.'" class="card-img-top" alt="..." style="width:100%;"></a>
                        </div>
                        <div class="card-body">
                            <a href="brands.php?bid='.$brand_id.'" class="btn btn-primary">'.$bat.'</a>
                        </div>
                    </div>
                </div>';
                }
            }
        ?>
    </div></div>
<?php include 'partials/footer.php'; ?>