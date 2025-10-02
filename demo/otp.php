<?php
    include("connection.php");
    session_start();
    $email=$_SESSION['email'];
    if(isset($_POST['sub']))
    {
        $otp=$_POST['otp'];
        $sql="select otp from otp where email='$email' and otp='$otp'";
        $res=mysqli_query($con,$sql);
        if(mysqli_num_rows($res)>0)
        {
            header("location:change-password.php");
        }
        else
        {
            $msg="Invalid otp";
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <?php include("cdn.php")?>
    <style>
        <?php include("assets/style.php")?>
    </style>
</head>
<body>
<div class="container">
        <div class="row d-flex justify-content-center">
            <div class="col-lg-6"></div>
            <div class="col-lg-6 mt-5 p-5">
               <h3>OTP Confirmation</h3>
               <form method="post">
                <div class="form-group my-3">
                    <label for="">Otp</label>
                    <input type="password" paceholder="Enter Otp" name="otp" class="form-control">
                </div>
                <div class="form-group my-3">
                    <input type="submit" name="sub" value="submit" class="btn btn-light btn-outline-info">
                    <p><?php if(isset($msg)) echo $msg ?></p>
                </div>
               </form>
            </div>
        </div>
    </div>
</body>
</html>