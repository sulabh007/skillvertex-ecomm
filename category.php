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
        $sql= "SELECT * FROM `categories`";
        $result= mysqli_query($db_con, $sql);
        while($row= mysqli_fetch_assoc($result)){
            $cat_id= $row['category_id'];
            $img=$row['category_images'];
            $cat= $row['category_name'];
            echo '<div class="col-sm-2" style="margin: 10px;">
                <div class="card" style="width: 30rem;">
                    <div class="cimg">
                        <a href="cate_sort.php?catid='.$cat_id.'"><img src="'.$img.'" class="card-img-top" alt="..." style="width:100%;"></a>
                    </div>   
                    <div class="card-body">
                        <a href="cate_sort.php?catid='.$cat_id.'" class="btn btn-primary">'.$cat.'</a>
                    </div>
                </div>
            </div>';
        }
    ?>
    </div></div>
<?php include 'partials/footer.php'; ?>



  
