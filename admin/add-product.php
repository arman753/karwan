<!-- add-product.php -->
<?php
    include("../connection.php");
    session_start();
    if(!isset($_SESSION['email']))
    {
        header("location:../login.php");
    }
    if(isset($_POST['sub']))
    {
        $pname=$_POST['pname'];
        $pcat=$_POST['pcate'];
        $pscat=$_POST['pscate'];
        $pquant=$_POST['pquant'];
        $pdes=$_POST['pdes'];
        $price=$_POST['price'];
        $path="assets/".$_FILES['pimg']['name'];
        $path1="../assets/".$_FILES['pimg']['name'];
        $tem=$_FILES['pimg']['tmp_name'];
        if(move_uploaded_file($tem,$path1))
        {
            $sql="insert into product(pname,pcategory,psubcategory,pquantity,pdiscription,ppicture,pprice)values('$pname','$pcat','$pscat','$pquant','$pdes','$path','$price')";
            $res=mysqli_query($con,$sql);
            if($res)
            {
                echo "<script>alert('Product Added Successfully')</script>";
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
          #wrapper {
            display: flex;
            min-height: 100vh;
            transition: all 0.3s ease;
        }
        .card .img{
            height: 200px;
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
            <div class="container m-3 p-5">
                <h3 class="ml-5">Add Product</h3>
                <div class="row">
                <div class="col-12">
                    <div class="card m-2">
                        <div class="card-body">
                           <form method="post" class="form" enctype="multipart/form-data">
                               <h4>Add Product Detail</h4>
                                <div class="form-group my-3">
                                    <label for="">Product Name</label>
                                    <input type="text" name="pname" placeholder="Enter Product Name" id="" class="form-control">
                                </div>
                                <div class="form-group my-3">
                                    <label for="">Product Category</label><br>
                                    <select name="pcate" class="form-control">
                                         <option value="">Select</option>
                                         <?php
                                             $sql="select category_name from category";
                                             $res=mysqli_query($con,$sql);
                                             if(mysqli_num_rows($res)>0)
                                             {
                                                 while($r=mysqli_fetch_assoc($res))
                                                 {
                                                     echo" <option value='".$r['category_name']."'>".$r['category_name']."</option> ";
                                                 }
                                             }
                                         ?>
                                    </select>
                                </div>
                                <div class="form-group my-3">
                                    <label for="">Product Sub_Category</label><br>
                                    <select name="pscate" class="form-control">
                                         <option value="">Select</option>
                                         <?php
                                             $sql="select sub_category_name from category";
                                             $res=mysqli_query($con,$sql);
                                             if(mysqli_num_rows($res)>0)
                                             {
                                                 while($r=mysqli_fetch_assoc($res))
                                                 {
                                                     echo" <option value='".$r['sub_category_name']."'>".$r['sub_category_name']."</option> ";
                                                 }
                                             }
                                         ?>
                                    </select>
                                </div>
                                <div class="form-group my-3">
                                    <label for="">Product Quantity</label>
                                    <input type="text" name="pquant" placeholder="Enter Product Quantity" id="" class="form-control">
                                </div>
                                <div class="form-group my-3">
                                    <label for="">Product Description</label>
                                    <textarea name="pdes" placeholder="enter description" class="form-control"></textarea>
                                </div>
                                <div class="form-group my-3">
                                    <label for="">Price</label>
                                    <input type="text" name="price" placeholder="Enter Price" id="" class="form-control">
                                </div>
                                <div class="form-group my-3">
                                    <label for="">Product Image</label>
                                    <input type="file" name="pimg"  id="" class="form-control">
                                </div>
                                <div class="form-group">
                                    <input type="submit" value="Add" name="sub" class="btn btn-info">
                                </div>
                            </form>
                        </div>
                   </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
