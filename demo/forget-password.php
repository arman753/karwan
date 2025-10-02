<?php
    include("connection.php");
    include("mail-api/mail.php");
    session_start();
    if(isset($_POST['submit']))
    {
        $otp=rand(999,9999);
        $email=$_POST['email'];
        $sql="select email from register where email='$email'";
        $res=mysqli_query($con,$sql);
        if(mysqli_num_rows($res)>0)
        {
            $sql1="insert into otp(email,otp)values('$email','$otp')";
            $res1=mysqli_query($con,$sql1);
            if($res1)
            {
                $_SESSION['email']=$email;
                mails($email,'OTP',$otp);
                header("location:otp.php");
            }
        }
        else
        {
            $msg="Invalid Email";
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
        <?php include("assets/style.php")?>
    </style>
</head>
<body>
    <div class="container">
        <div class="row d-flex justify-content-center ">
            <div class="col-lg-6 mt-5 p-5">
               <h3>Reset Password</h3>
               <form method="post" class="">
                <div class="form-group my-3">
                    <label for="">Email</label>
                    <input type="email" name="email" class="form-control">
                </div>
                <div class="form-group my-3">
                    <input type="submit" name="submit" value="submit" class="btn btn-light btn-outline-info">
                    <p><?php if(isset($msg)) echo $msg ?></p>
                </div>
               </form>
            </div>
            <div class="col-lg-6 right">   
            </div>
        </div>
    </div>
</body>
</html>