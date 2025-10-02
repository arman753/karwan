<?php
include("../connection.php");
session_start();
if(!isset($_SESSION['email']))
{
    header("location:../login.php");
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
        .img{
            height: 100px;
            width: 50px;
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
            <div class="container-fluid p-0">
                        <table class="table table-bordered table-striped table-hover table-primary">
                            <thead>
                                <th>Sr no.</th>
                                <th>Product Name</th>
                                <th>Product Category</th>
                                <th>Product Sub_Category</th>
                                <th>Product Quantity</th>
                                <th>Product Picture</th>
                                <th>Product Price</th>
                                <th>Action</th>
                            </thead>
                            <tbody class="img">
                                <?php
                                    include("../connection.php");
                                    $sql="select * from product";
                                    $res=mysqli_query($con,$sql);
                                    $sql1="select count(*) from category";
                                    $row=mysqli_query($con,$sql1);
                                    if(mysqli_num_rows($res)>0)
                                    {
                                        $i=1;
                                        while($r=mysqli_fetch_assoc($res))
                                        {
                                            echo"
                                                <tr align='center'>
                                                    <td>".$i."</td>
                                                    <td>".$r['pname']."</td>
                                                    <td>".$r['pcategory']."</td>
                                                    <td>".$r['psubcategory']."</td>
                                                    <td>".$r['pquantity']."</td>
                                                    <td><img src='../".$r['ppicture']."'class='img d-block w-50'/></td>
                                                    <td>".$r['pprice']."</td>
                                                    <td>
                                                        <a href='delete-product.php?id=".$r['pid']."'>
                                                            <i class='fa fa-trash-o' style='font-size:30px;color:red'></i>
                                                        </a>
                                                    </td>
                                                </tr>";
                                                $i++;
                                        }
                                    }
                                ?>
                            </tbody>
                        </table>
            </div>
        </div>
    </div>
</body>
</html>