<?php
$login=false;
$loggedin=false;
if($_SERVER["REQUEST_METHOD"]=="POST"){
    include 'database/_dbcon.php';
    $email = $_POST['email'];
    $password = $_POST['password'];
    
    
    $sql= "Select * from users where email='$email' AND password= '$password'";
    $results= mysqli_query($db_con, $sql);
    $num= mysqli_num_rows($results);
    if($num== 1){
        $login=true;
        session_start();
        $_SESSION['loggedin']=true;
        $_SESSION['email']=$email;
        echo $_SESSION['loggedin'];
        header("location:index.php");
    }
    else{
        echo "Invalid";
    }
    
}
  
?>
<?php include 'partials/header.php'; ?>
<style>
  .log{
    display: flex;
    align-items: center;
    flex-direction: column;
  }
</style>
    <?php include 'partials/navbar.php'; ?>
  <div class="container log" style="margin-bottom: 30px;">
    <form action="login.php" method="post" >
      <div class="input-group">
        <h1>Log In</h1>
        <div class="form-group">
          <label for="email" class="form-label">Email address</label>
          <input type="email" name="email" class="form-control" id="email" placeholder="name@example.com">
        </div>
        
        <div class="form-group">
          <label for="password" class="form-label">Password</label>
          <input type="password" name="password" class="form-control" id="password">  
        </div>

        <input type="submit" class="btn btn-default get" value="Log In" name="login">
        
      </div>
    </form>
    <div class="container log" style=" margin-top: 25px;padding: 0;">
      <a id="signup" style="font-size:22px;" href="signup.php">Sign Up</a>
    </div>
    
  </div>
<?php include 'partials/footer.php'; ?>