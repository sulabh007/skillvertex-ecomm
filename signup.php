<?php
if($_SERVER["REQUEST_METHOD"]=="POST"){
    include 'database/_dbcon.php';
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $cpassword = $_POST['cpassword'];
    $Phoneno = $_POST['Phoneno'];
    $address = $_POST['address'];
    $exist=false;
    $sherr=false;
    
    $existsql="SELECT * FROM `users` WHERE email= '$email';";
    $results= mysqli_query($db_con, $existsql);
    $numRows= mysqli_num_rows($results);
    if($numRows>0){
        $exist=true;
        echo "Already exist";
    }
    else{
        $exist=false;
        if(($password == $cpassword) &&($exist==false)){
            $sql= "INSERT INTO `users` ( `first_name`, `last_name`, `email`, `password`, `number`, `address`) VALUES ('$firstname', '$lastname', '$email', '$password', '$Phoneno','$address')";
            $results= mysqli_query($db_con, $sql);
            if($results){
                echo "sus";
                header("location:login.php");
            }
        }
        else{
            echo "Passwords doesn't match";
        }
    }
}
  
?>
<style>
  .sign{
    display: flex;
    align-items: center;
    flex-direction: column;
  }
</style>
<?php include 'partials/header.php'; ?>
    <?php include 'partials/navbar.php'; ?>
  <div class="container sign" style="margin-bottom: 30px;">
    <form action="signup.php" method="post">
      <div class="input-group">
        <h1>Sign Up</h1>
        <div class="form-group">
          <label for="email" class="form-label">Email address</label>
          <input type="email" name="email" class="form-control" id="email" placeholder="name@example.com">
        </div>
        <div class="form-group">
          <label for="firstname" class="form-label">First Name</label>
          <input type="text" name="firstname" class="form-control" id="firstname" placeholder="First Name">
        </div>
        <div class="form-group">
          <label for="lastname" class="form-label">Last Name</label>
          <input type="text" name="lastname" class="form-control" id="lastname" placeholder="Last Name">
        </div>
        <div class="form-group">
          <label for="Phoneno" class="form-label">Phone Number</label>
          <input type="number" name="Phoneno" class="form-control" id="Phoneno" placeholder="Phone No">
        </div>
        <div class="form-group">
          <label for="address" class="form-label">Address</label>
          <textarea class="form-control" id="address" rows="3"></textarea>
        </div>
        <div class="form-group">
          <label for="password" class="form-label">Password</label>
          <input type="password" name="password" class="form-control" id="password">  
        </div>
        <div class="form-group">
          <label for="cpassword" class="form-label">Confirm Password</label>
          <input type="password" name="cpassword" class="form-control" id="cpassword">
        </div>
        

        <input type="submit" class="btn btn-default get" value="Sign Up" name="create">
      </div>
    </form>

  </div>
<?php include 'partials/footer.php'; ?>