<?php 
    include("connection.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <?php include("cdn.php"); ?>
</head>
<body>
    <div class="container">
    <div class="row">
            <div class="col-12 d-flex justify-content-end">
                <a href="product.php?pcat=mobile" class="btn btn-light">View More</a>
            </div>
        </div>
        <div class="row">
            <?php
                $sql="select * from product where pcategory='mobile' limit 4";
                $res=mysqli_query($con,$sql);
                if(mysqli_num_rows($res)>0)
                {
                    while($r=mysqli_fetch_assoc($res))
                    {
                        echo'
                            <div class="col-lg-3 col-md-6 col-sm-12">
                                <div class="card">
                                    <div class="card-header">
                                        <img src="'.$r['ppicture'].'" class="img d-block w-100"/>                                    
                                    </div>
                                    <div class="card-body">
                                        <h4>'.$r['pname'].'</h4>
                                        <p>'.$r['pprice'].'</p>
                                    </div>
                                    <div class="card-footer">
                                        <a href="">Buy</a>
                                    </div>
                                
                                </div>
                            
                            </div>
                        ';

                    }
                }

            ?>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-12 d-flex justify-content-end">
                <a href="product.php?pcat=electronic">View More</a>
            </div>
        </div>
        <div class="row">
            <?php

                $sql="select * from product where pcategory='electronic' limit 4";
                $res=mysqli_query($con,$sql);
                if(mysqli_num_rows($res)>0)
                {
                    while($r=mysqli_fetch_assoc($res))
                    {
                        echo'
                            <div class="col-lg-3 col-md-6 col-sm-12">
                                <div class="card">
                                    <div class="card-header">
                                        <img src="'.$r['ppicture'].'" class="img d-block w-100"/>                                    
                                    </div>
                                    <div class="card-body">
                                        <h4>'.$r['pname'].'</h4>
                                        <p>'.$r['pprice'].'</p>
                                    </div>
                                    <div class="card-footer">
                                        <a href="">Buy</a>
                                    </div>
                                
                                </div>
                            
                            </div>
                        ';

                    }
                }

            ?>
        </div>
    </div>
</body>
</html>