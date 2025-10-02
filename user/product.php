<?php
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
    <?php
     include("../cdn.php");
    ?>
    <style>
        <?php include("../assets/style.css")?>
        .img{
            height: 300px;
        }
        .product{
            margin-top: 30px;
            margin-bottom: 30px;
        }
    </style>
</head>
<body>
    <?php include("header.php") ?>
    <div class="container-fluid product">
        <div class="row">
            <?php
                include("../connection.php");
                $cat=$_GET['pcategory'];
                $sql="select * from product where pcategory='$cat' or pname like '%$cat%' limit 4";
                $res=mysqli_query($con,$sql);
                if(mysqli_num_rows($res)>0)
                {
                    while($r=mysqli_fetch_assoc($res))
                    {
                        echo'
                            <div class="col-lg-3 col-md-6 col-sm-12">
                                <div class="card">
                                    <form action="cart.php" method="post">
                                        <input type="hidden" name="pname" value="'.$r['pname'].'">
                                        <input type="hidden" name="pcat" value="'.$cat.'"/>
                                        <input type="hidden" name="pimage" value="'.$r['ppicture'].'">
                                        <input type="hidden" name="pprice" value="'.$r['pprice'].'">
                                        <input type="hidden" name="pquantity" value="1">
                                        <div class="card-header">
                                            <a href="description.php?pid='.$r['pid'].'">
                                                <img src="../'.$r['ppicture'].'" class="img1 d-block w-100 h-100px"/>
                                            </a>                                   
                                        </div>
                                        <div class="card-body">
                                            <h4>'.$r['pname'].'</h4>
                                            <p>'.$r['pprice'].'</p>
                                        </div>
                                        <div class="card-footer">
                                            <div class="row">
                                                <div class="col-lg-6"><a href="checkout.php" class="btn btn-secondary">Buy</a></div>
                                                <div class="col-lg-6 d-flex justify-content-end">
                                                    <button class="btn">
                                                        <i class="fa fa-cart-plus" style="font-size:40px;color:#1ed2d8"></i>
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            
                            </div>
                        ';

                    }
                }

            ?>
        </div>
    </div>
    <?php include("../footer.php") ?>
</body>
</html>