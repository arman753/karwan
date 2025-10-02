<?php
    include("connection.php");
    session_start();
    if(isset($_POST['submit']))
    {
        $email=$_POST['email'];
        $password=$_POST['password'];
        $sql="select * from register where email='$email' and password='$password'";
        $res=mysqli_query($con,$sql);
        if(mysqli_num_rows($res)>0)
        {     
            $_SESSION['email']=$email;
            $row=mysqli_fetch_array($res);
            if($row['user_type'] == 'admin')
            {
                header("location:admin/dashboard.php");
            }   
            else
            {
                header("location:user/dashboard.php");
            }    
        }
        else
        {
            $msg="Invalid Login Cridential";
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <?php include("cdn.php") ?>
    <style>
        <?php include("assets/style.css") ?>
    </style>
</head>
<body>
   <?php include("header.php") ?>
   <div class="container-fluid mt-5 mb-5 p-5">
    <div class="row">
        <div class="col-lg-6 p-5">
            <img src="assets/2.jpg" alt="" class="d-block w-100">
        </div>
        <div class="col-lg-6 p-5 bg">
                   <form method="post" class="">
                    <h3>Login Form</h3>
                     <div class="form-group mb-4">
                         <label for="">Email</label>
                         <input type="email" name="email" class="form-control">
                     </div>
                     <div class="form-group mb-4">
                         <label for="">Password</label>
                         <input type="password" name="password" class="form-control">
                     </div>
                     <div class="form-group mb-4">
                        <input type="submit" name="submit" value="Login" class="btn btn-light ">
                     </div>
                     <div class="form-group">
                        <div class="row">
                            <div class="col-6">
                            <a href="forget-password.php" class="mt-4">Forget Password</a>
                            </div>
                            <div class="col-6">
                            <a href="register.php" class="">Create A New Account</a>    
                            </div>
                        </div>
                     </div>
                     <p class="text-danger"><?php if(isset($msg))echo $msg ?></p>
                  </form>
        </div>
    </div>
   </div>
   <?php include("footer.php") ?>
</body>
</html>