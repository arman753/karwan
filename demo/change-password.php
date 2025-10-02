<?php
    include("connection.php");
    include("mail-api/mail.php");
    session_start();
    $email=$_SESSION['email'];
    if(isset($_POST['submit']))
    {
        $password=$_POST['password'];
        $sql="update register set password='$password' where email='$email'";
        $res=mysqli_query($con,$sql);
        if($res)
        {
            mails($email,'Password change confirmation','Password changed successfully');
            header("location:login.php");
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
        <?php include("assets/style.css")?>
    </style>
</head>
<body>
<div class="container">
        <div class="row d-flex justify-content-center">
            <div class="col-lg-6 mt-5 p-5">
               <h3>Change Password</h3>
               <form method="post">
                <div class="form-group my-3">
                    <label for="">Pssword</label>
                    <input type="password" name="password" class="form-control">
                </div>
                <div class="form-group my-3">
                    <input type="submit" name="submit" value="change" class="btn btn-light btn-outline-info">
                </div>
               </form>
            </div>
            <div class="col-lg-6"></div>
        </div>
    </div>
</body>
</html>