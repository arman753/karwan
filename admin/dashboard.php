<?php
session_start();
include("../connection.php");
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
    $msg=$r['name'];
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
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
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f7f7f7;
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
            display: flex;
            flex-direction: column;
            margin-right: 50px;
            color: red;
            font-weight: bold;
            font-size: 20px;
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
            background-color: #f0f0f0;
        }

        .profile-details th {
            text-align: left;
            padding: 10px;
            background-color: #f0f0f0;
            
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
                        <li class="nav-item">
                            <a href="profile.php" class="nav-link">Profile</a>
                        </li>
                    </ul>
                </div>
            </nav>
            <div class="container-fluid p-4">
                <h1 class="mt-4 ">Welcome, <span class="text-danger"> <?php if(isset($msg))echo $msg ?></span></h1>
                <p>Welcome to admin dashboard. Here you can manage product and category</p>
                <div class="row">
                    <div class="col-lg-3 col-md-6">
                        <div class="card bg-primary text-white mb-4">
                            <div class="card-body">Total Users</div>
                            <div class="card-footer d-flex justify-content-between">
                                <span>
                                    <?php
                                    include("../connection.php");
                                    $sql="select count(*) as total from register where user_type='user'";
                                    $res=mysqli_query($con,$sql);
                                    if(mysqli_num_rows($res)>0)
                                    {
                                        $row=mysqli_fetch_assoc($res);
                                        echo $row['total'];
                                    }
                                    ?>
                                </span>
                                <a href="show-users.php" class="btn btn-light">View details</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="card bg-warning text-white mb-4">
                            <div class="card-body">New Orders</div>
                            <div class="card-footer d-flex justify-content-between">
                                <span>45</span>
                                <a href="show-order.php" class="btn btn-light">View details</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="card bg-success text-white mb-4">
                            <div class="card-body">confirm orders</div>
                            <div class="card-footer d-flex justify-content-between">
                                <span>18</span>
                                <a href="show-users.php" class="btn btn-light">View details</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="card bg-danger text-white mb-4">
                            <div class="card-body">Return orders</div>
                            <div class="card-footer d-flex justify-content-between">
                                <span>8</span>
                                <a href="show-users.php" class="btn btn-light">View details</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container">
    <div class="profile-container">
        <div class="profile-image">
            <?php
            $sql = "SELECT * FROM register WHERE user_type='admin'";
            $res = mysqli_query($con, $sql);
            if (mysqli_num_rows($res) > 0) {
                while ($r = mysqli_fetch_array($res)) {
                    echo '<img src="../'.$r['image'].'" alt="Profile Picture" class="">';
                    echo "Admin";
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