<?php
include("../connection.php");
session_start();
if(!isset($_SESSION['email']))
{
    header("location:../login.php");
}
if(isset($_POST['sub']))
    {
        $path="../assets/".$_FILES['image']['name'];
        $path1="assets/".$_FILES['image']['name'];
        $tem=$_FILES['image']['tmp_name'];
        if(move_uploaded_file($tem,$path))
        {
            $sql="update register set image='$path1' WHERE user_type='admin'";
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
    <style>
        #wrapper {
            display: flex;
            min-height: 100vh;
            transition: all 0.3s ease;
        }

        #sidebar-wrapper {
            width: 250px;
            background-color: #343a40;
            position: fixed;
            top: 0;
            left: 0;
            height: 100vh;
            transform: translateX(-250px);
            transition: transform 0.3s ease;
        }

        #page-content-wrapper {
            margin-left: 0;
            padding-left: 20px;
            width: 100%;
            transition: margin-left 0.3s ease;
        }

        /* Checkbox and Label Styles */
        #menu-toggle {
            display: none;
        }

        #menu-toggle:checked+#wrapper #sidebar-wrapper {
            transform: translateX(0);
        }

        #menu-toggle:checked+#wrapper #page-content-wrapper {
            margin-left: 250px;
        }

        /* Styling for the Toggle Button */
        .toggle-btn {
            display: inline-block;
            background-color: #007bff;
            color: white;
            padding: 10px 15px;
            border-radius: 4px;
            cursor: pointer;
        }
        /*.img{
            height: 50px;
            width: 50px;
        }*/
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f7f7f7;
        }

       

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
    <?php include("../cdn.php") ?>
</head>
<body>
<input type="checkbox" id="menu-toggle">
    <div id="wrapper">
        <div id="sidebar-wrapper">
            <div class="sidebar-heading text-white p-3">Admin Dashboard</div>
            <div class="list-group list-group-flush">
                <a href="add-product.php" class="list-group-item list-group-item-action bg-dark text-white">Add Product</a>
                <a href="view-product.php" class="list-group-item list-group-item-action bg-dark text-white">View product</a>
                <a href="add-category.php" class="list-group-item list-group-item-action bg-dark text-white">Add category</a>
                <a href="show-category.php" class="list-group-item list-group-item-action bg-dark text-white">Show category</a>
                <a href="show-users.php" class="list-group-item list-group-item-action bg-dark text-white">Show users</a>
                <a href="#" class="list-group-item list-group-item-action bg-dark text-white">Settings</a>
                <a href="logout.php" class="list-group-item list-group-item-action bg-dark text-white">Logout</a>
            </div>
        </div>
        <div id="page-content-wrapper">
            <nav class="navbar navbar-expand-lg navbar-light bg-light border-bottom">
                <label for="menu-toggle" class="toggle-btn">Toggle Menu</label>
                <div class="collapse navbar-collapse">
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item">
                            <a href="#" class="nav-link">Notification</a>
                        </li>
                    </ul>
                </div>
            </nav>  
            <div class="container">
    <div class="profile-container">
        <div class="profile-image">
            <?php
            $sql = "SELECT * FROM register WHERE user_type='admin'";
            $res = mysqli_query($con, $sql);
            if (mysqli_num_rows($res) > 0) {
                while ($r = mysqli_fetch_array($res)) {
                    echo '<img src="../'.$r['image'].'" alt="Profile Picture" class="">';
                    echo '<form action="" method="post" enctype="multipart/form-data" class="update-form">';
                    echo '<input type="file" name="image" class="form-control">';
                    echo '<br>';
                    echo '<input type="submit" value="Update Profile" name="sub" class="update-profile-btn">';
                    echo '</form>';
                }
            }
            ?>
        </div>

        <div class="profile-details">
            <table>
                <tr>
                    <th>Name</th>
                    <td><?php
                    $sql = "SELECT * FROM register WHERE user_type='admin'";
                    $res = mysqli_query($con, $sql);
                    if (mysqli_num_rows($res) > 0) {
                        while ($r = mysqli_fetch_array($res)) {
                            echo $r['name'];
                        }
                    }
                    ?></td>
                </tr>
                <tr>
                    <th>Email</th>
                    <td><?php
                    $sql = "SELECT * FROM register WHERE user_type='admin'";
                    $res = mysqli_query($con, $sql);
                    if (mysqli_num_rows($res) > 0) {
                        while ($r = mysqli_fetch_array($res)) {
                            echo $r['email'];
                        }
                    }
                    ?></td>
                </tr>
                <tr>
                    <th>Contact</th>
                    <td><?php
                    $sql = "SELECT * FROM register WHERE user_type='admin'";
                    $res = mysqli_query($con, $sql);
                    if (mysqli_num_rows($res) > 0) {
                        while ($r = mysqli_fetch_array($res)) {
                            echo $r['contact'];
                        }
                    }
                    ?></td>
                </tr>
                <tr>
                    <th>Address</th>
                    <td><?php
                    $sql = "SELECT * FROM register WHERE user_type='admin'";
                    $res = mysqli_query($con, $sql);
                    if (mysqli_num_rows($res) > 0) {
                        while ($r = mysqli_fetch_array($res)) {
                            echo $r['address'];
                        }
                    }
                    ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>


        </div>
    </div>
</body>
</html>
