<?php
    include("connection.php");
    include("mail-api/mail.php");
    if(isset($_POST['submit']))
    {
        $name=$_POST['name'];
        $email=$_POST['email'];
        $contact=$_POST['contact'];
        $password=$_POST['password'];
        $gender=$_POST['gender'];
        $address=$_POST['address'];
        $path="assets/".$_FILES['img']['name'];
        $tem=$_FILES['img']['tmp_name'];
        if(move_uploaded_file($tem,$path))
        {
            $sql="insert into register(name,email,contact,password,user_type,gender,address,image)values('$name','$email','$contact','$password','user','$gender','$address','$path')";
            $res=mysqli_query($con,$sql);
            if($res)
            {
                mails($email,'register','Your account is created successfully');
                header("location:login.php");
            }
            
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
        <div class="row d-flex justify-content-center">
            <div class="col-lg-6 p-5">
                <form method="post" class="" enctype="multipart/form-data" >
                   <h3>Register Form</h3>
                   <div class="form-group my-3">
                       <label for="">Name</label>
                       <input type="text" name="name" class="form-control mb-3">
                   </div>
                   <div class="form-group my-3">
                       <label for="">Email</label>
                       <input type="email" name="email" class="form-control">
                   </div>
                   <div class="form-group my-3">
                       <label for="">Contact</label>
                       <input type="text" name="contact" class="form-control">
                   </div>
                   <div class="form-group my-3">
                       <label for="">Password</label>
                       <input type="password" name="password" class="form-control">
                   </div>
                  
                   <div class="form-group my-3">
                        <label for="">Gender</label>
                        male<input type="radio" name="gender" value="male">
                        female<input type="radio" name="gender" value="female">
                    </div>
                    <div class="form-group my-3">
                       <label for="">Address</label>
                       <textarea name="address" class="form-control"></textarea>
                   </div>
                   <div class="form-group my-3">
                        <label for="">Upload Picture</label>
                        <input type="file" name="img"  id="" class="form-control">
                   </div>
                   <div class="form-group my3">
                      <input type="submit" name="submit" value="Register" class="btn btn-light">
                   </div>
                </form>
            </div>
            <div class="col-lg-6 p-5">
                <img src="assets/1.jpg" alt="" class="d-block w-100">
            </div>
        </div>
    </div>
    <?php include("footer.php") ?>

</body>
</html>