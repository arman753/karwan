<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <?php include("cdn.php") ?>
    <style>
         <?php include("assets/style.css")?>
    </style>
</head>
<body>
    <?php include("header.php") ?>
    <div class="carousel slide" data-bs-ride="carousel" data-bs-interval="3000">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="assets/tata namak.png" alt="image" height=500px width=100%>
            </div>
            <div class="carousel-item">
                <img src="assets/electronic.webp" alt="Electronic" height=500px width=100%>
            </div>
            <div class="carousel-item">
                <img src="assets/mobial.webp" alt="mobial" height=500px width=100%>
            </div>
            <div class="carousel-item">
                <img src="assets/cloth.jpg" alt="" height=500px width=100%>
            </div>
            <div class="carousel-item">
                <img src="assets/home.jpg" alt="" height=500px width=100%>
            </div>  
            <div class="carousel-item">
                <img src="assets/buty.avif" alt="" height=500px width=100%>
            </div>
            <div class="carousel-item">
                <img src="assets/toy.avif" alt="" height=500px width=100%>
            </div>
            <div class="carousel-item">
                <img src="assets/sports.jpg" alt="" height=500px width=100%>
            </div>
        </div>  
    </div>
    <div class="container-fluid my-4">
        <h1><center>Sports</center></h1>
        <div class="row my-3">
            <div class="col-lg-3">
                <div class="card">
                    <div class="card-header d-flex justify-content-center">
                     <img src="assets/sport1.jpg" alt="" height=200px>
                    </div>
                    <div class="card-body">
                        <h5><center>Tennis Racquet</center></h5>
                    </div>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="card">
                    <div class="card-header d-flex justify-content-center">
                        <img src="assets/sport2.jpg"
                            alt="image" height=200px />
                    </div>
                    <div class="card-body">
                        <h5><center>Cricket Bat</center></h5>
                    </div>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="card">
                    <div class="card-header d-flex justify-content-center">
                        <img src="assets/sport3.jpg"
                            alt="image" height=200px />
                    </div>
                    <div class="card-body">
                        <h5><center>Volleyball</center></h5>
                    </div>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="card">
                    <div class="card-header d-flex justify-content-center">
                        <img src="assets/sport4.webp"
                            alt="image" height=200px />
                    </div>
                    <div class="card-body">
                        <h5><center>Badminton</center></h5>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid product">
        <div class="row">
            <center><h3>Grocery</h3></center>
            <?php
                include("connection.php");
                $sql="select * from product where pcategory='grocery' order by pid desc limit 4";
                $res=mysqli_query($con,$sql);
                if(mysqli_num_rows($res)>0)
                {
                    while($r=mysqli_fetch_assoc($res))
                    {
                        echo'
                            <div class="col-lg-3 col-md-6 col-sm-12">
                                <div class="card">
                                    <div class="card-header d-flex justify-content-center">
                                     <a href="description.php?pid='.$r['pid'].'">
                                        <img src="'.$r['ppicture'].'" class="img d-block w-100 h-100px"/>
                                    </a>                                    
                                    </div>
                                    <div class="card-body">
                                        <h4>'.$r['pname'].'</h4>
                                        <p>'.$r['pprice'].'</p>
                                    </div>
                                    <div class="card-footer">
                                        <div class="row">
                                            <div class="col-lg-6"><a href="login.php" class="btn btn-secondary">Buy</a></div>
                                            <div class="col-lg-6 d-flex justify-content-end">
                                                    <button class="btn">
                                                        <i class="fa fa-cart-plus" style="font-size:40px;color:#1ed2d8"></i>
                                                    </button>
                                            </div>
                                        </div>
                                    </div>
                                
                                </div>
                            </div>
                        ';

                    }
                }

            ?>
        </div>
        <div class="row">
            <div class="col-12 d-flex justify-content-end">
                <a href="product.php?pcategory=Grocery">View More</a>
            </div>
        </div>
    </div>
    <div class="container-fluid product">
        <div class="row">
            <center><h3>Electronics</h3></center>
            <?php
                include("connection.php");
                $sql="select * from product where pcategory='electronics' order by pid desc limit 4";
                $res=mysqli_query($con,$sql);
                if(mysqli_num_rows($res)>0)
                {
                    while($r=mysqli_fetch_assoc($res))
                    {
                        echo'
                            <div class="col-lg-3 col-md-6 col-sm-12">
                                <div class="card">
                                    <div class="card-header">
                                        <a href="description.php?pid='.$r['pid'].'">
                                        <img src="'.$r['ppicture'].'" class="img d-block w-100 h-100px"/>
                                    </a>                                     
                                    </div>
                                    <div class="card-body">
                                        <h4>'.$r['pname'].'</h4>
                                        <p>'.$r['pprice'].'</p>
                                    </div>
                                    <div class="card-footer">
                                        <div class="row">
                                            <div class="col-lg-6"><a href="login.php" class="btn btn-secondary">Buy</a></div>
                                            <div class="col-lg-6 d-flex justify-content-end">
                                                   <button class="btn">
                                                        <i class="fa fa-cart-plus" style="font-size:40px;color:#1ed2d8"></i>
                                                    </button>
                                            </div>
                                        </div>
                                    </div>
                                
                                </div>
                            </div>
                        ';

                    }
                }

            ?>
        </div>
        <div class="row">
            <div class="col-12 d-flex justify-content-end">
                <a href="product.php?pcategory=Electronics">View More</a>
            </div>
        </div>
    </div>
    <div class="container-fluid product">
        <div class="row">
            <center><h3>Mobiles</h3></center>
            <?php
                include("connection.php");
                $sql="select * from product where pcategory='mobile' order by pid desc limit 4";
                $res=mysqli_query($con,$sql);
                if(mysqli_num_rows($res)>0)
                {
                    while($r=mysqli_fetch_assoc($res))
                    {
                        echo'
                            <div class="col-lg-3 col-md-6 col-sm-12">
                                <div class="card">
                                    <div class="card-header">
                                        <a href="description.php?pid='.$r['pid'].'">
                                        <img src="'.$r['ppicture'].'" class="img d-block w-100 h-100px"/>
                                    </a>                                     
                                    </div>
                                    <div class="card-body">
                                        <h4>'.$r['pname'].'</h4>
                                        <p>'.$r['pprice'].'</p>
                                    </div>
                                    <div class="card-footer">
                                        <div class="row">
                                            <div class="col-lg-6"><a href="login.php" class="btn btn-secondary">Buy</a></div>
                                            <div class="col-lg-6 d-flex justify-content-end">
                                                     <button class="btn">
                                                        <i class="fa fa-cart-plus" style="font-size:40px;color:#1ed2d8"></i>
                                                    </button>
                                            </div>
                                        </div>
                                    </div>
                                
                                </div>
                            </div>
                        ';

                    }
                }

            ?>
        </div>
        <div class="row">
            <div class="col-12 d-flex justify-content-end">
                <a href="product.php?pcategory=Mobile">View More</a>
            </div>
        </div>
    </div>
    <div class="container-fluid product">
        <div class="row">
            <center><h3>Clothes</h3></center>
            <?php
                include("connection.php");
                $sql="select * from product where pcategory='clothes' order by pid desc limit 4";
                $res=mysqli_query($con,$sql);
                if(mysqli_num_rows($res)>0)
                {
                    while($r=mysqli_fetch_assoc($res))
                    {
                        echo'
                            <div class="col-lg-3 col-md-6 col-sm-12">
                                <div class="card">
                                    <div class="card-header">
                                        <a href="description.php?pid='.$r['pid'].'">
                                        <img src="'.$r['ppicture'].'" class="img d-block w-100 h-100px"/>
                                    </a>                                     
                                    </div>
                                    <div class="card-body">
                                        <h4>'.$r['pname'].'</h4>
                                        <p>'.$r['pprice'].'</p>
                                    </div>
                                    <div class="card-footer">
                                        <div class="row">
                                            <div class="col-lg-6"><a href="login.php" class="btn btn-secondary">Buy</a></div>
                                            <div class="col-lg-6 d-flex justify-content-end">
                                                      <button class="btn">
                                                        <i class="fa fa-cart-plus" style="font-size:40px;color:#1ed2d8"></i>
                                                    </button>
                                            </div>
                                        </div>
                                    </div>
                                
                                </div>
                            </div>
                        ';

                    }
                }

            ?>
        </div>
        <div class="row">
            <div class="col-12 d-flex justify-content-end">
                <a href="product.php?pcategory=Clothes">View More</a>
            </div>
        </div>
    </div>
    <div class="container-fluid product">
        <div class="row">
            <center><h3>Furniture</h3></center>
            <?php
                include("connection.php");
                $sql="select * from product where pcategory='furniture' order by pid desc limit 4";
                $res=mysqli_query($con,$sql);
                if(mysqli_num_rows($res)>0)
                {
                    while($r=mysqli_fetch_assoc($res))
                    {
                        echo'
                            <div class="col-lg-3 col-md-6 col-sm-12">
                                <div class="card">
                                    <div class="card-header">
                                        <a href="description.php?pid='.$r['pid'].'">
                                        <img src="'.$r['ppicture'].'" class="img d-block w-100 h-100px"/>
                                    </a>                                     
                                    </div>
                                    <div class="card-body">
                                        <h4>'.$r['pname'].'</h4>
                                        <p>'.$r['pprice'].'</p>
                                    </div>
                                    <div class="card-footer">
                                        <div class="row">
                                            <div class="col-lg-6"><a href="login.php" class="btn btn-secondary">Buy</a></div>
                                            <div class="col-lg-6 d-flex justify-content-end">
                                                     <button class="btn">
                                                        <i class="fa fa-cart-plus" style="font-size:40px;color:#1ed2d8"></i>
                                                    </button>
                                            </div>
                                        </div>
                                    </div>
                                
                                </div>
                            </div>
                        ';

                    }
                }

            ?>
        </div>
        <div class="row">
            <div class="col-12 d-flex justify-content-end">
                <a href="product.php?pcategory=Furniture">View More</a>
            </div>
        </div>
    </div>
    <div class="container-fluid product">
        <div class="row">
            <center><h3>Beauty</h3></center>
            <?php
                include("connection.php");
                $sql="select * from product where pcategory='beauty' order by pid desc limit 4";
                $res=mysqli_query($con,$sql);
                if(mysqli_num_rows($res)>0)
                {
                    while($r=mysqli_fetch_assoc($res))
                    {
                        echo'
                            <div class="col-lg-3 col-md-6 col-sm-12">
                                <div class="card">
                                    <div class="card-header">
                                        <a href="description.php?pid='.$r['pid'].'">
                                        <img src="'.$r['ppicture'].'" class="img d-block w-100 h-100px"/>
                                    </a>                                    
                                    </div>
                                    <div class="card-body">
                                        <h4>'.$r['pname'].'</h4>
                                        <p>'.$r['pprice'].'</p>
                                    </div>
                                    <div class="card-footer">
                                        <div class="row">
                                            <div class="col-lg-6"><a href="login.php" class="btn btn-secondary">Buy</a></div>
                                            <div class="col-lg-6 d-flex justify-content-end">
                                                   <button class="btn">
                                                        <i class="fa fa-cart-plus" style="font-size:40px;color:#1ed2d8"></i>
                                                    </button>
                                            </div>
                                        </div>
                                    </div>
                                
                                </div>
                            </div>
                        ';

                    }
                }

            ?>
        </div>
        <div class="row">
            <div class="col-12 d-flex justify-content-end">
                <a href="product.php?pcategory=Beauty">View More</a>
            </div>
        </div>
    </div>
    <div class="container-fluid product">
        <div class="row">
            <center><h3>Toys</h3></center>
            <?php
                include("connection.php");
                $sql="select * from product where pcategory='toys' order by pid desc limit 4";
                $res=mysqli_query($con,$sql);
                if(mysqli_num_rows($res)>0)
                {
                    while($r=mysqli_fetch_assoc($res))
                    {
                        echo'
                            <div class="col-lg-3 col-md-6 col-sm-12">
                                <div class="card">
                                    <div class="card-header">
                                        <a href="description.php?pid='.$r['pid'].'">
                                        <img src="'.$r['ppicture'].'" class="img d-block w-100 h-100px"/>
                                    </a>                                     
                                    </div>
                                    <div class="card-body">
                                        <h4>'.$r['pname'].'</h4>
                                        <p>'.$r['pprice'].'</p>
                                    </div>
                                    <div class="card-footer">
                                        <div class="row">
                                            <div class="col-lg-6"><a href="login.php" class="btn btn-secondary">Buy</a></div>
                                            <div class="col-lg-6 d-flex justify-content-end">
                                                      <button class="btn">
                                                        <i class="fa fa-cart-plus" style="font-size:40px;color:#1ed2d8"></i>
                                                    </button>
                                            </div>
                                        </div>
                                    </div>
                                
                                </div>
                            </div>
                        ';

                    }
                }

            ?>
        </div>
        <div class="row">
            <div class="col-12 d-flex justify-content-end">
                <a href="product.php?pcategory=Toys">View More</a>
            </div>
        </div>
    </div>
    <div class="container-fluid product">
        <div class="row">
            <center><h3>Sports</h3></center>
            <?php
                include("connection.php");
                $sql="select * from product where pcategory='sports' order by pid desc limit 4";
                $res=mysqli_query($con,$sql);
                if(mysqli_num_rows($res)>0)
                {
                    while($r=mysqli_fetch_assoc($res))
                    {
                        echo'
                            <div class="col-lg-3 col-md-6 col-sm-12">
                                <div class="card">
                                    <div class="card-header">
                                        <a href="description.php?pid='.$r['pid'].'">
                                        <img src="'.$r['ppicture'].'" class="img d-block w-100 h-100px"/>
                                    </a>                                      
                                    </div>
                                    <div class="card-body">
                                        <h4>'.$r['pname'].'</h4>
                                        <p>'.$r['pprice'].'</p>
                                    </div>
                                    <div class="card-footer">
                                        <div class="row">
                                            <div class="col-lg-6"><a href="login.php" class="btn btn-secondary">Buy</a></div>
                                            <div class="col-lg-6 d-flex justify-content-end">
                                                     <button class="btn">
                                                        <i class="fa fa-cart-plus" style="font-size:40px;color:#1ed2d8"></i>
                                                    </button>
                                            </div>
                                        </div>
                                    </div>
                                
                                </div>
                            </div>
                        ';

                    }
                }

            ?>
        </div>
        <div class="row">
            <div class="col-12 d-flex justify-content-end">
                <a href="product.php?pcategory=Sports">View More</a>
            </div>
        </div>
    </div>
    <?php include("footer.php") ?>
</body>
</html>

