<!-- add-category.php -->
<?php
    include("../connection.php");
    session_start();
    if(!isset($_SESSION['email']))
    {
        header("location:../login.php");
    }
    if(isset($_POST['sub']))
    {
        $cat=$_POST['cat'];
        $sub_cat=$_POST['scat'];
        $sql="insert into category(category_name,sub_category_name)values('$cat','$sub_cat')";
        $res=mysqli_query($con,$sql);
        if($res)
        {
            $msg="Category Added";
        }
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <?php include("../cdn.php")?>
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
                <a href="#" class="list-group-item list-group-item-action bg-dark text-white">Logout</a>
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
            <div class="cntainer m-5 p-5">
                <div class="row">
                    <div class="col-lg-8">
                        <form  method="post">
                           <h4>Add Category</h4>
                           <div class="form-group my-4">
                           <input type="text" name="cat"  id="" placeholder="category" class="form-control">
                           </div>
                           <div class="form-group my-4">
                           <input type="text" name="scat"  id="" placeholder="sub_category" class="form-control">
                           </div>
                           <input type="submit" value="Add" name="sub" class="btn btn-light btn-outline-info">
                        </form>
                        <p><?php  if(isset($msg)) echo $msg ?></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>