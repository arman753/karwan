<?php
include("../connection.php");
session_start();
if(!isset($_SESSION['email']))
{
    header("location:../login.php");
}
if(isset($_POST['sub']))
    {
        $em=$_POST['email'];
        $path="../assets/".$_FILES['image']['name'];
        $path1="assets/".$_FILES['image']['name'];
        $tem=$_FILES['image']['tmp_name'];
        if(move_uploaded_file($tem,$path))
        {
            $sql="update register set image='$path1' WHERE email='$em'";
            $res=mysqli_query($con,$sql);
            if($res)
            {
                echo "<script>alert('Profile updated successfully!')</script>";
                header("location:profile.php");
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
    <?php include("../cdn.php") ?>
    <style>
        <?php
        include("../assets/style.css")
        ?>
        
        .container {
            display: flex;
            justify-content: center;
            padding: 20px;
        }

        .profile-container {
            display: flex;
            justify-content: space-between;
            background-color: #fff;
            padding: 20px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.6);
            border-radius: 8px;
            width: 70%;
        }

        .profile-image {
            text-align: center;
            margin-right: 20px;
        }

        .profile-image img {
            width: 150px;
            height: 150px;
            border-radius: 50%;
            border: 2px solid blue;
        }

        .profile-details {
            flex-grow: 1;
        }

        .profile-details table {
            width: 100%;
        }

        .profile-details td {
            padding: 10px;
        }

        .profile-details th {
            text-align: left;
            padding: 10px;
            background-color: #f0f0f0;
        }

        .update-profile-btn {
            background-color: orange;
            color: white;
            padding: 10px 20px;
            border: none;
            cursor: pointer;
            border-radius: 5px;
        }

        .update-profile-btn:hover {
            background-color: #1ed2d8;
        }

        .update-form input[type="file"] {
            padding: 10px;
            margin-top: 10px;
        }
    </style>
</head>
<body>
    <?php include("header.php") ?>
<?php
if(!isset($_SESSION['email']))
{
   
    header("location:../login.php");
}
else
{
    $email=$_SESSION['email'];
   
    $sql="select * from register where email='$email'";
    $res=mysqli_query($con,$sql);
    $r=mysqli_fetch_assoc($res);
     echo '<div class="container">
             <div class="profile-container">
                    <div class="profile-image">
                           <img src="../'.$r['image'].'" alt="Profile Picture" class="">';?>
                           <form method="post" enctype="multipart/form-data" class="update-form">
                            <input type="hidden" name="email" value="<?php if(isset($email)) echo $email ?>"/>
                           <input type="file" name="image" class="form-control">
                           <br>
                           <input type="submit" value="Update Profile" name="sub" class="update-profile-btn">
                           </form>
                           <?php
                           echo '
                    </div>
                    <div class="profile-details">
                            <table>
                                <tr>
                                    <th>Name</th>
                                    <td>'.$r['name'].'</td>
                                </tr>
                                <tr>
                                    <th>Email</th>
                                    <td>'.$r['email'].'</td>
                                </tr>
                                <tr>
                                    <th>Contact</th>
                                    <td>'.$r['contact'].'</td>
                                </tr>
                                <tr>
                                    <th>Address</th>
                                    <td>'.$r['address'].'</td>
                                </tr>
                                <tr>
                                    <th>Logout</th>
                                    <td><a href="logout.php" class="text-warning"><i class="fa fa-power-off" style="font-size:30px;color:orange"></i></a></td>
                                </tr>
                            </table>
                    </div>
             </div>
           </div>';
}
?>
    <?php include("../footer.php") ?>
</body>
</html>