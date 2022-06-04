<?php
$server= "localhost";
$db_user= "root";
$db_pass="";
$db_name="ecomm";

$db_con = mysqli_connect($server, $db_user, $db_pass, $db_name); 

if($db_con){
    #echo "sucessful";
}
else{
    die("error". mysqli_connect_error);
}
?>